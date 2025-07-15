<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Category</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    /* Tablo genişlik ve hizalama */
    .tbl-full {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    /* Hücre iç boşluk ve ortalama */
    .tbl-full th,
    .tbl-full td {
      text-align: center;
      padding: 12px 20px;
    }
    /* Başlık ve buton solda */
    .main-content h1,
    .main-content .btn-primary {
      text-align: left;
      display: inline-block;
    }
    /* Update (sarı) ve Delete (kırmızı) butonları yuvarlak yap */
    .btn-success {
      background-color: #f1c40f; /* Sarı */
      color: #000;
      padding: 8px 12px;
      border-radius: 20px;
      text-decoration: none;
      display: inline-block;
      font-weight: bold;
      transition: background 0.2s;
    }
    .btn-success:hover {
      background-color: #d4ac0d;
      color: #000;
    }
    .btn-danger {
      background-color: #f08080; /* Kırmızı */
      color: white;
      padding: 8px 12px;
      border-radius: 20px;
      text-decoration: none;
      display: inline-block;
      font-weight: bold;
      transition: background 0.2s;
    }
    .btn-danger:hover {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>
  <?php include('../layouts/menu.php'); ?>

  <div class="main-content">
    <div class="wrapper">
      <h1><mark>Manage Category</mark></h1>
      <div style="margin: 20px 0;">
        <a href="add-category.php" class="btn-primary"><mark>Add Category</mark></a>
      </div>

      <?php
        //Query to Get all Category
        $sql   = "SELECT * FROM tbl_category";
        //Execute the Query
        $res   = mysqli_query($conn, $sql);
        //Count Rows
        $count = mysqli_num_rows($res);
      ?>

      <table class="tbl-full">
        <thead>
          <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($count > 0) {  // If categories are available
              $sn = 1;  // Serial number for categories
              while($row = mysqli_fetch_assoc($res)) {  // Fetch each category
                $id    = $row['id'];  // Category ID
                $title = $row['title']; // Category title
          ?>
          <tr>
            <td><?php echo $sn++; ?></td>   <!-- Increment serial number -->
            <td><?php echo $title; ?></td> <!-- Display category title -->
            <td>
              <a href="update-category.php?id=<?php echo $id; ?>" class="btn-success">Update category</a>
              <a href="delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Delete category</a>
            </td>
          </tr>
          <?php
              }
            } else {
          ?>
          <tr>
            <td colspan="3">No Category Added.</td>     <!-- Message if no categories are found -->
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>
</body>
</html>
