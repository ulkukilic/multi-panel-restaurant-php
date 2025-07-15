<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Food</title>
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
    input[type="number"],
    textarea,
    select {
      font-size: 1rem;
      padding: 10px 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 1rem;
    }
    textarea { resize: vertical; }
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
      <h1><mark> Update Food Page </mark></h1>
      <br><br>

      <?php
       
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_food WHERE id = $id";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) == 1) {
                $row         = mysqli_fetch_assoc($res);
                $title       = $row['title'];
                $description = $row['description'];
                $price       = $row['price'];
                $image_name  = $row['image_name'];
                $category_id = $row['category_id'];
                $featured    = $row['featured'];
                $active      = $row['active'];
            } else {
                header('Location: manage-food.php');
                exit;
            }
        } else {
            header('Location: manage-food.php');
            exit;
        }
      ?>

      <form action="" method="POST" class="form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="3"><?php echo $description; ?></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" value="<?php echo $price; ?>">

        <label for="image_name">Image Name:</label>
        <input type="text" name="image_name" value="<?php echo $image_name; ?>">

        <label for="category_id">Category ID:</label>
        <input type="number" name="category_id" value="<?php echo $category_id; ?>">

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

        <button type="submit" name="submit" class="btn-primary">Update Food</button>
      </form>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>

  <?php
    
    if (isset($_POST['submit'])) {
        $id          = $_POST['id'];
        $title       = $_POST['title'];
        $description = $_POST['description'];
        $price       = $_POST['price'];
        $image_name  = $_POST['image_name'];
        $category_id = $_POST['category_id'];
        $featured    = $_POST['featured'];
        $active      = $_POST['active'];

        // update query
        $sql = "UPDATE tbl_food SET
                  title       = '$title',
                  description = '$description',
                  price       = $price,
                  image_name  = " . ($image_name!="" ? "'$image_name'" : "NULL") . ",
                  category_id = $category_id,
                  featured    = '$featured',
                  active      = '$active'
                WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
            header('Location: manage-food.php');
        } else {
            echo 'Failed to update food.';
        }
    }
  ?>
</body>
</html>
