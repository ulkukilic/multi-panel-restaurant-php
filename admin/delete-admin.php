<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Admin</title>
  <link rel="stylesheet" href="../css/admin.css">
  </head>
<body>
  <?php include('../layouts/menu.php'); ?>
<?php
  
  if (isset($_GET['id'])) { // id kontrolü eklendi eğer id varsa silme işlemi yapılacak
      $id = $_GET['id']; // id değeri alındı

      // delete query
      $sql = "DELETE FROM tbl_admin WHERE id = $id";
      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      
      header('Location: manage-admin.php');
  } else {
     
      header('Location: manage-admin.php');
  }
?>
  <?php include('../layouts/footer.php'); ?>
  </body>
</html>