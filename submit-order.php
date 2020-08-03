<?php
  session_start();
  require_once ('link.php');
  include("admin/assets/confs/config.php");

  $name =mysqli_real_escape_string($conn, $_POST['name']);
  $email =mysqli_real_escape_string($conn, $_POST['email']);
  $phone =mysqli_real_escape_string($conn, $_POST['phone']);
  $address =mysqli_real_escape_string($conn, $_POST['address']);
  mysqli_query($conn, "INSERT INTO orders (name, email, phone, address, status, created_date, modified_date) VALUES ('$name','$email','$phone','$address', 0, now(), now())");
  $order_id = mysqli_insert_id($conn);

  foreach($_SESSION['cart'] as $id => $qty) {
    mysqli_query($conn, "INSERT INTO order_items (order_id, book_id, qty) VALUES ($order_id,$id,$qty)");
  }

  unset($_SESSION['cart']);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Order Submitted</title>
</head>
<body>
<div class="container">
<h1>Order Submitted</h1>

  <div class="msg">
    Your order has been submitted. We'll deliver the items soon.
    <a href="index.php" class="done">Book Store Home</a>
  </div>  
</div>
  

  <div class="footer">
    &copy; <?php echo date("Y") ?>. All right reserved.
  </div>
</body>