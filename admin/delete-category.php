<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Category</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  <?php include('../layouts/menu.php'); ?>
  <?php
    if (isset($_GET['id'])) { 
        $id  = $_GET['id']; 

      
        $sql = "DELETE FROM tbl_category WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        header('Location: manage-category.php');
    } else {
        header('Location: manage-category.php');
    }
  ?>
  <?php include('../layouts/footer.php'); ?>
</body>
</html>
