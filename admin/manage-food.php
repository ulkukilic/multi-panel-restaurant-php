<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Food</title>
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
      
      <h1><mark>Manage Food</mark></h1>
      <div style="margin: 20px 0;">
        <a href="add-food.php" class="btn-primary"><mark>Add Food</mark></a>
      </div>

      <?php
        //Query to Get all Food
        $sql   = "SELECT * FROM tbl_food";
        //Execute the Query
        $res   = mysqli_query($conn, $sql);
        //Count Rows
        $count = mysqli_num_rows($res);
      ?>

      <table class="tbl-full">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category ID</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($count > 0) {
              $sn = 1;
              while($row = mysqli_fetch_assoc($res)) {  // food verilerini cek
                $id          = $row['id'];  // Food ID
                $title       = $row['title']; 
                $description = $row['description'];
                $price       = $row['price'];
                $image_name  = $row['image_name'];
                $category_id = $row['category_id'];
                $featured    = $row['featured'];
                $active      = $row['active'];
          ?>
          <tr>
            <td><?php echo $sn++; ?></td>   <!-- serial number -->
            <td><?php echo $title; ?></td>
            <td><?php echo $description; ?></td>
            <td><?php echo number_format($price, 2); ?> ₺</td>  
            <td>
              <?php if($image_name != ""): ?>       <!-- Image kontrol -->
                <!-- Resim varsa göster -->
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" alt="<?php echo $title; ?>">
              <?php else: ?>
                <span>No Image</span>
              <?php endif; ?>
            </td>
            <td><?php echo $category_id; ?></td>       
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <a href="update-food.php?id=<?php echo $id; ?>" class="btn-success">Update Food</a>
              <a href="delete-food.php?id=<?php echo $id; ?>" class="btn-danger">Delete Food</a>
            </td>
          </tr>
          <?php
              }
            } else {
          ?>
          <tr>
            <td colspan="9">No Food Added.</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>
</body>
</html>
