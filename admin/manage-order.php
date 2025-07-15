<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Orders</title>
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
    
      <h1><mark>Manage Orders</mark></h1>
      <div style="margin: 20px 0;">
        <a href="add-order.php" class="btn-primary"><mark>Add Orders</mark></a>
      </div>

      <?php
        //Query to Get all Orders
        $sql   = "SELECT * FROM tbl_order";
        //Execute the Query
        $res   = mysqli_query($conn, $sql);
       
        $count = mysqli_num_rows($res);
      ?>

     
      <table class="tbl-full">
        <thead>
          <tr>
            <th>#</th>
            <th>Orders</th>
            <th>User</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($count > 0) {  //orders varsa id ve user bilgilerini çek
              $sn = 1;
              while($row = mysqli_fetch_assoc($res)) {
                $id            = $row['id'];
                $food          = $row['food'];
                $customer_name = $row['customer_name'];
          ?>
          <tr>
            <td><?php echo $sn++; ?></td>  
            <td><?php echo $food; ?></td>
            <td><?php echo $customer_name; ?></td>
            <td>
              <a href="update-order.php?id=<?php echo $id; ?>" class="btn-success">Update in Order</a>
              <a href="delete-order.php?id=<?php echo $id; ?>" class="btn-danger">Delete in Order</a>
            </td>
          </tr>
          <?php
              }
            } else {
          ?>
          <tr>
            <td colspan="4">No Orders Found.</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>
</body>
</html>
