<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Orders </title>
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
      <!-- Başlık ve buton solda -->
      <h1><mark>Manage Orders</mark></h1>
      <div style="margin: 20px 0;">
        <a href="add-order.php" class="btn-primary"><mark>Add Orders</mark></a>
      </div>

      <!-- Ortalanmış tablo -->
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
          <tr>
            <td>1</td>
            <td>Hamburger</td>
            <td>elgulds</td>
            <td>
              <a href="update-order.php" class="btn-success">Update in Order</a>
              <a href="delete-order.php" class="btn-danger">Delete in Order</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Yaglama</td>
            <td>u.kic</td>
            <td>
              <a href="update-order.php" class="btn-success">Update in Order</a>
              <a href="delete-order.php" class="btn-danger">Delete in Order</a>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>Pizza</td>
            <td>street</td>
            <td>
              <a href="update-order.php" class="btn-success">Update in Order</a>
              <a href="delete-order.php" class="btn-danger">Delete in Order</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>
</body>
</html>