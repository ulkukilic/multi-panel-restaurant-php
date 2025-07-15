<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Admin</title>
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
    input[type="password"] {
      font-size: 1rem;
      padding: 10px 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
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
      text-align: right;
    }
  </style>
</head>
<body>
  <?php include('../layouts/menu.php'); ?>
  <div class="main-content">
    <div class="wrapper">
      <h1><mark> Update Admin Page </mark></h1>
      <br><br>
      <form action="" method="POST" class="form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="<?php echo $full_name; ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required><br>

        <button type="submit" name="submit" class="btn-primary">Update Admin</button>
      </form>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>

  <?php
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $id        = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username  = $_POST['username'];

        // update query
        $sql = "UPDATE tbl_admin SET
                  full_name = '$full_name',
                  username  = '$username'
                WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
            header('Location: manage-admin.php');
        } else {
            echo 'Failed to update admin.';
        }
    }
  ?>
</body>
</html>
