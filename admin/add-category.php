<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Category</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    .form {
      width: 100%;
      padding: 4%;
      margin: 1% auto;
      background-color: whitesmoke;
      border-radius: 5px;
      font-size: 25px;
      text-align: left;
    }
    .main-content h1,
    .main-content .btn-primary {
      text-align: left;
      display: inline-block;
    }
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
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background 0.2s;
      cursor: pointer;
    }
  </style>
</head>
<body>
 
  <?php include('../layouts/menu.php'); ?>

  <div class="main-content">
    <div class="wrapper">
      <h1><mark> Add New Category </mark></h1><br><br>
      <form action="" method="POST" class="form">
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Category Title" required>

        <label for="image_name">Image Name:</label>
        <input type="text" name="image_name" placeholder="Image Filename (optional)">

        <label for="featured">Featured:</label> 
        <select name="featured" required>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>

        <label for="active">Active:</label> 
        <select name="active" required>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>

        <button type="submit" name="submit" class="btn-primary"> Add </button>
      </form>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>

  <?php
  
    if (isset($_POST['submit'])) {

        $title      = $_POST['title'];
        $image_name = !empty($_POST['image_name']) ? $_POST['image_name'] : NULL;
        $featured   = $_POST['featured'];
        $active     = $_POST['active'];

        
        $sql = "INSERT INTO tbl_category SET
          title      = '$title',
          image_name = " . ($image_name!==NULL ? "'$image_name'" : "NULL") . ",
          featured   = '$featured',
          active     = '$active'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
          echo "Category added successfully.";
        } else {
          echo "Failed to add category.";
        }
    } else {
      echo "Please fill out the form to add a category.";
    }
  ?>
</body>
</html>
