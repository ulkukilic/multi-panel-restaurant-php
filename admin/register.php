<?php 

include("../config/config.php");
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
    <h2>Register</h2>
    <form action="" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" required>
        
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <button type="submit" name="submit" class="btn-primary">Register</button>
    </form>

    <?php
      
      if (isset($_POST['submit'])) { // 
          $full_name = mysqli_real_escape_string($conn, $_POST['full_name']); // kullanici adini string olarak temizle
          $username  = mysqli_real_escape_string($conn, $_POST['username']);  // mysqli_real_escape_string  SQL  de  kollanilan bir fonksiyondur. Bu fonksiyon, SQL sorgularında kullanıcının girdiği verileri temizler ve SQL enjeksiyon( bilgisayarın sakladığı bilgileri çalmaya veya bozup karıştırmamasi iin) saldırılarına karşı koruma sağlar.
          $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

         // daha once kullanici adi var mi kontrol et
          $check = "SELECT * FROM tbl_admin WHERE username='$username'";
          $r     = mysqli_query($conn, $check) or die(mysqli_error($conn));

          if (mysqli_num_rows($r) > 0) {  // eğer bu kullanıcı adı zaten varsa
              echo "<p style='color:purple;'>Bu kullanıcı adı zaten alınmış.</p>";
          } else {
              // Yeni admin ekle
              $sql = "INSERT INTO tbl_admin SET
                        full_name = '$full_name',
                        username  = '$username',
                        password  = '$password'";
              $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); // sorguyu çalıştır ve hata varsa göster

              if ($res) {
                  header('Location: login.php');
                  exit;
              } else {
                  echo "<p style='color:purple;'>Kayıt başarısız.</p>";
              }
          }
      }
    ?>
    <p><a href="login.php">Login</a></p>
  </div>

</body>
</html>
