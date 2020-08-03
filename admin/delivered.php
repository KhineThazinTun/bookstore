<?php 
session_start();
require_once ('link.php');
require_once ('header.php');
include ('assets/confs/config.php');
$delivered=mysqli_query($conn,"SELECT * FROM orders WHERE status=1");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
		<h1>Order Confimred and Delivered</h1>

		<?php while($deli=mysqli_fetch_assoc($delivered)): ?>
	<div class="row border-bottom ">
	<div class="col-md-6 border-right p-2">
	<h4>Customer Detail</h4>
		<p><b>Name : </b>
		&emsp;&emsp;<?php echo $deli['name'] ?></p>
		<p><b>Email : </b>
		&emsp;&nbsp;&emsp;<?php echo $deli['email'] ?></p>
		
		<p><b>Phone : </b>
		&emsp;&ensp;&nbsp;<?php echo $deli['phone'] ?></p>

		
		<p><b>Address : </b>
		&emsp;<?php echo $deli['address'] ?></p>	
	
<a href="order-status.php?id=<?php echo $deli['id'] ?>&status=0"> Not Delivered</a>
	</div>
	<div class="col-md-6 p-2">
	<!-- order items -->
<?php $orders_id=$deli['id'];
$order_items="SELECT order_items.*,books.title,books.price
 FROM order_items LEFT JOIN books ON 
 books.id=order_items.book_id WHERE order_id=$orders_id";
$order_item=mysqli_query($conn,$order_items) or die(mysqli_error());?>
		<h5>Order Details</h5>
	<table class="table table-responsive">
<thead>
	<tr>
	<th>Order Book</th>
	<th>Quantity</th>
	<th>Book Price</th>
	</tr>
</thead>
<?php while($book_items=mysqli_fetch_assoc($order_item)): ?>
<tbody>
	<tr>
	<td rowspan="3"><a href="../book-detail.php?detail=<?php echo $book_items['book_id'] ?>"><?php echo $book_items['title'] ?></a></td>
	<td><?php echo $book_items['qty'] ?></td>
	<td>$ <?php echo $book_items['price'] ?></td>
	</tr>
</tbody>
<?php endwhile ?>
</table>
	</div>
<?php endwhile ?>		
	</div>	
</div>	
<!-- ---------------------------------------- -->	
</body>
</html>