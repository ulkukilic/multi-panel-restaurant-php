<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Order</title>
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
    input[type="email"],
    select,
    textarea {
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
      border-radius: 5px;
      display: inline-block;
      font-weight: bold;
      transition: background 0.2s;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <?php include('../layouts/menu.php'); ?>

  <div class="main-content">
    <div class="wrapper">
      <h1><mark> Add New Order </mark></h1><br><br>
      <form action="" method="POST" class="form">
        <label for="food">Food:</label>
        <input type="text" name="food" placeholder="Food Name" required>

        <label for="price">Price:</label>
        <input type="text" name="price" placeholder="Price" required>

        <label for="qty">Quantity:</label>
        <input type="number" name="qty" step="0.01" placeholder="e.g. 1.00" required>

        <label for="status">Status:</label>  <!--  Dropdown for order status -->
        <select name="status" required>   
          <option value="Ordered">Ordered</option>
          <option value="On Delivery">On Delivery</option>
          <option value="Delivered">Delivered</option>
          <option value="Cancelled">Cancelled</option>
        </select>

        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" placeholder="Customer Name" required>

        <label for="customer_contact">Customer Contact:</label>
        <input type="text" name="customer_contact" placeholder="Phone Number" required>

        <label for="customer_email">Customer Email:</label>
        <input type="email" name="customer_email" placeholder="Email Address" required>

        <label for="customer_address">Customer Address:</label>
        <textarea name="customer_address" placeholder="Address" rows="3" required></textarea>

        <button type="submit" name="submit" class="btn-primary"> Add </button>
      </form>
    </div>
  </div>

  <?php include('../layouts/footer.php'); ?>

  <?php
    // check whether the submit button is clicked or not and process the form values
    if (isset($_POST['submit'])) {

        $food             = $_POST['food'];
        $price            = $_POST['price'];
        $qty              = $_POST['qty'];
        $total            = $price * $qty;               // toplam fiyat
        $order_date       = time();                      // Date and time of order
        $status           = $_POST['status'];            // order status Ordered, On Delivery, Delivered, Cancelled
        $customer_name    = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email   = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];

        // siparişi database'e kaydet
        $sql = "INSERT INTO tbl_order SET
          food             = '$food',
          price            = '$price',
          qty              = $qty,
          total            = '$total',
          order_date       = $order_date,
          status           = '$status',
          customer_name    = '$customer_name',
          customer_contact = '$customer_contact',
          customer_email   = '$customer_email',
          customer_address = '$customer_address'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res) {
          echo "Order added successfully.";
        } else {
          echo "Failed to add order.";
        }
    } else {
      echo "Please fill out the form to add an order.";
    }
  ?>
</body>
</html>
