<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Category</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    .form {
      width: 100%;               /* Form genişliği %100 */
      padding: 4%;               /* İç boşluk */
      margin: 1% auto;           /* Üst ve alt boşluk, ortalar */
      background-color: whitesmoke; /* Arka plan rengi */
      border-radius: 5px;        /* Köşe yuvarlama */
      font-size: 25px;
      text-align: left;
    }
    /* Başlık ve buton solda */
    .main-content h1,
    .main-content .btn-primary {
      text-align: left;
      display: inline-block;
    }
    /* Input alanlarını büyüt */
    input[type="text"],
    select {
      font-size: 1rem;
      padding: 10px 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 1rem;
    }
    .btn-primary {
      background-color: #4CAF50; /* Yeşil */
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      font-weight: bold;
      transition: background 0.2s;
    }
  </style>
</head>
<body>
  <?php include('../layouts/menu.php'); ?>
  <div class="main-content">
    <div class="wrapper">
      <h1><mark> Update Category Page </mark></h1>
      <br><br>

      <?php
        // id kontrolü eklendi eğer id varsa düzenleme formu gösterilecek
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_category WHERE id = $id";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) == 1) {
                $row        = mysqli_fetch_assoc($res);
                $title      = $row['title'];
                $image_name = $row['image_name'];
                $featured   = $row['featured'];
                $active     = $row['active'];
            } else {
                header('Location: manage-category.php');
                exit;
            }
        } else {
            header('Location: manage-category.php');
            exit;
        }
      ?>

      <form action="" method="POST" class="form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="title">Category Name:</label>
        <input type="text" name="title" value="<?php echo $title; ?>" required>

        <label for="image_name">Image Name:</label>
        <input type="text" name="image_name" value="<?php echo $image_name; ?>">

        <label for="featured">Featured:</label>
        <select name="featured" required>
          <option <?php echo ($featured=="Yes")?"selected":""; ?> value="Yes">Yes</option>
          <option <?php echo ($featured=="No")?"selected":""; ?> value="No">No</option>
        </select>

        <label for="active">Active:</label>
        <select name="active" required>
          <option <?php echo ($active=="Yes")?"selected":""; ?> value="Yes">Yes</option>
          <option <?php echo ($active=="No")?"selected":""; ?> value="No">No</option>
        </select>

        <button type="submit" name="submit" class="btn-primary">Update Category</button>
      </form>
    </div>
  </div>
  <?php include('../layouts/footer.php'); ?>

  <?php
     // eger form submit edildiyse , düzenleme işlemi yapılacak
    if (isset($_POST['submit'])) {
        $id         = $_POST['id'];
        $title      = $_POST['title'];
        $image_name = $_POST['image_name'];
        $featured   = $_POST['featured'];
        $active     = $_POST['active'];

        // update query
        $sql = "UPDATE tbl_category SET
                  title      = '$title',
                  image_name = " . ($image_name!="" ? "'$image_name'" : "NULL") . ",
                  featured   = '$featured',
                  active     = '$active'
                WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
            header('Location: manage-category.php');
        } else {
            echo 'Failed to update category.';
        }
    }
  ?>
</body>
</html>
