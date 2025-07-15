<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Food</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
  <?php include('../layouts/menu.php'); ?>

  <?php
    if (isset($_GET['id'])) { 
        $id = $_GET['id']; 

        // delete query
        $sql = "DELETE FROM tbl_food WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        header('Location: manage-food.php');
    } else {
        header('Location: manage-food.php');
    }
  ?>

  <?php include('../layouts/footer.php'); ?>
</body>
</html>
