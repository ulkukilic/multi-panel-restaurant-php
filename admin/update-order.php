<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Order</title>
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
      background-color: #4CAF50; /* Yeşil */
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      font-weight: bold;
      transition: background 0.2s;
    }
  </style>
</head>
<body>
  <?php include('../layouts/menu.php'); ?>

  <div class="main-content">
    <div class="wrapper">
      <h1><mark> Update Order Page </mark></h1>
      <br><br>

      <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_order WHERE id = $id";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) == 1) {
                $row             = mysqli_fetch_assoc($res);
                $food            = $row['food'];
                $price           = $row['price'];
                $qty             = $row['qty'];
                $status          = $row['status'];
                $customer_name   = $row['customer_name'];
                $customer_contact= $row['customer_contact'];
                $customer_email  = $row['customer_email'];
                $customer_address= $row['customer_address'];
            } else {
                header('Location: manage-order.php');
                exit;
            }
        } else {
            header('Location: manage-order.php');
            exit;
        }
      ?>

      <form action="" method="POST" class="form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="food">Food:</label>
        <input type="text" name="food" value="<?php echo $food; ?>" required>

        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" value="<?php echo $price; ?>">

        <label for="qty">Quantity:</label>
        <input type="number" name="qty" step="0.01" value="<?php echo $qty; ?>">

        <label for="status">Status:</label>
        <select name="status" required>
          <option <?php echo ($status=="Ordered")?"selected":""; ?> value="Ordered">Ordered</option>
          <option <?php echo ($status=="On Delivery")?"selected":""; ?> value="On Delivery">On Delivery</option>
          <option <?php echo ($status=="Delivered")?"selected":""; ?> value="Delivered">Delivered</option>
          <option <?php echo ($status=="Cancelled")?"selected":""; ?> value="Cancelled">Cancelled</option>
        </select>

        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>" required>

        <label for="customer_contact">Customer Contact:</label>
        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>" required>

        <label for="customer_email">Customer Email:</label>
        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>" required>

        <label for="customer_address">Customer Address:</label>
        <textarea name="customer_address" rows="3" required><?php echo $customer_address; ?></textarea>

        <button type="submit" name="submit" class="btn-primary">Update Order</button>
      </form>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>

  <?php
    if (isset($_POST['submit'])) {
        $id             = $_POST['id'];
        $food           = $_POST['food'];
        $price          = $_POST['price'];
        $qty            = $_POST['qty'];
        $total          = $price * $qty;
        $status         = $_POST['status'];
        $customer_name   = $_POST['customer_name'];
        $customer_contact= $_POST['customer_contact'];
        $customer_email  = $_POST['customer_email'];
        $customer_address= $_POST['customer_address'];

        $sql = "UPDATE tbl_order SET
                  food             = '$food',
                  price            = $price,
                  qty              = $qty,
                  total            = '$total',
                  status           = '$status',
                  customer_name    = '$customer_name',
                  customer_contact = '$customer_contact',
                  customer_email   = '$customer_email',
                  customer_address = '$customer_address'
                WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
            header('Location: manage-order.php');
        } else {
            echo 'Failed to update order.';
        }
    }
  ?>
</body>
</html>
