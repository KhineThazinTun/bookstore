<?php
session_start();
if(!isset($_SESSION['cart'])) {
  header("location: index.php");
  exit();
}
include("admin/assets/confs/config.php");
require_once ('link.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>View Cart</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h1>View Cart</h1>
        <div class="sidebar">
          <ul class="cats list-unstyled">
            <li><a href="index.php" class="text-primary">&laquo; Continue Shopping</a></li>
            <li><a href="clear-cart.php" class="del text-danger">&times; Clear Cart</a></li>
          </ul>
        </div>
      </div>
      <div class="main col-md-9">
        <div class="row">
          <div class="col-md-12">
           <table class="table table-bordered">
           <thead>
             <tr>
              <th>Book Title</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Price</th>
            </tr>
           </thead>
            
            <?php
            $total = 0;
            foreach($_SESSION['cart'] as $id => $qty):
              $result = mysqli_query($conn, "SELECT title, price FROM books WHERE id=$id");
            $row = mysqli_fetch_assoc($result);
            $total += $row['price'] * $qty;
            ?>
            <tr>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $qty ?></td>
              <td>$<?php echo $row['price'] ?></td>
              <td>$<?php echo $row['price'] * $qty ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="3" align="right" class="text-uppercase"><b>Total:</b></td>
            <td class="text-info">$<?php echo $total; ?></td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
       <div class="order-form">
        <h2>Order Now</h2>
        <form action="submit-order.php" method="post">
          <div class="form-group">
            <label for="name" class="form-control-label">Your Name</label>
            <input type="text" name="name" class="form-control" required >
          </div>

          <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input type="text" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="phone" class="form-control-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="address" class="form-control-label">Address</label>
            <textarea name="address" class="form-control mb-2" required></textarea>
          </div>

          <input type="submit" value="Submit Order" class="btn btn-primary">
          <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
        </form>
      </div> 
    </div>
  </div>
</div>
</div>
<div class="footer">
  &copy; <?php echo date("Y") ?>. All right reserved.
</div>
</div>
</body>
</html>
