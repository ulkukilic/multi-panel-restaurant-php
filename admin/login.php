<?php 
session_start();
include("../config/config.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    .form {
      width: 30%;
      padding: 2%;
      margin: 5% auto;
      background-color: whitesmoke;
      border-radius: 5px;
      font-size: 1.1rem;
      text-align: left;
    }
    .form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 1rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .btn-primary {
      background-color: #73476cff;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="form">
    <h2>Login</h2>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <button type="submit" name="submit" class="btn-primary">Login</button>
        </form>

    <?php
      
      if (isset($_POST['submit'])) {  // form submit edildiyse 
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $password = $_POST['password'];

          // Kullanıcıyı çek
          $sql  = "SELECT * FROM tbl_admin WHERE username='$username'";
          $res  = mysqli_query($conn, $sql) or die(mysqli_error($conn));

          if (mysqli_num_rows($res)==1) {
              $row        = mysqli_fetch_assoc($res);
              $hashed_pw  = $row['password'];

              // Şifre kontrolü
              if (password_verify($password, $hashed_pw)) {
                  $_SESSION['login']    = true;
                  $_SESSION['user']     = $username;
                  header('Location: manage-admin.php');
                  exit;
              } else {
                  echo "<p style='color:purple;'>Şifre yanlış.</p>";
              }
          } else {
              echo "<p style='color:purple;'>Kullanıcı bulunamadı.</p>";
          }
      }
    ?>
    <p><a href="register.php">Register</a></p>
  </div>

</body>
</html>
