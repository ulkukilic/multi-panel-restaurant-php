<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Food</title>
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
      <h1><mark> Add New Food </mark></h1><br><br>

      <form action="" method="POST" class="form">
        
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Food Title" required>

        <label for="description">Description:</label>
        <textarea name="description" placeholder="Description" rows="3"></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" placeholder="e.g. 9.99">


        <label for="category_id">Category ID:</label>
        <input type="number" name="category_id" placeholder="Category ID">

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

        $title       = $_POST['title'];
        $description = !empty($_POST['description']) ? $_POST['description'] : NULL;
        $price       = !empty($_POST['price'])       ? $_POST['price']       : NULL;
        $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : NULL;
        $featured    = $_POST['featured'];
        $active      = $_POST['active'];

        // yemek ekleme sorgusu
        $sql = "INSERT INTO tbl_food SET
          title       = '$title',
          description = " . ($description!==NULL ? "'$description'" : "NULL") . ",
          price       = " . ($price!==NULL       ?  $price        : "NULL") . ",
          category_id = " . ($category_id!==NULL ?  $category_id  : "NULL") . ",
          featured    = '$featured',
          active      = '$active'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
          echo "Food added successfully.";
        } else {
          echo "Failed to add food.";
        }
    } else {
      echo "Please fill out the form to add a food item.";
    }
  ?>
</body>
</html>
