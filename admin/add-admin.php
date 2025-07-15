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
      <h1><mark> Add New Admin </mark></h1>
      <br><br>
      <form action="" method="POST" class="form">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" placeholder="Full Name" required><br>
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="submit" class="btn-primary"> Add </button>
      </form>
    </div>
  </div>
  <?php include('../layouts/footer.php'); ?>

  <?php
    // check wheter the submit button is clicked or not and process the value form and save it in database
    if (isset($_POST['submit'])) {  // check if the submit button is clicked 
      
        // var_dump($_POST); // for debugging purpose

        $full_name = $_POST['full_name']; 
        $username  = $_POST['username']; 

        // password key gerçekten var mı?
        if (!empty($_POST['password'])) {
            // şifreyi güvenli hash’le
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            die('Lütfen bir şifre girin.');
        }
       
        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username  = '$username',
        password  = '$password'";

         // echo $sql; // for debugging purpose

        
        $conn = mysqli_connect('localhost', 'root', '','restaurant');
        if (!$conn) {
            die('DB bağlantı hatası: ' . mysqli_connect_error());
        }
     
        // execute the query and save in database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    } else {  // if the submit button is not clicked then show the error message and send the first page
      echo "Failed to add admin. Please try again.";
    }
  ?>
</body>
</html>
