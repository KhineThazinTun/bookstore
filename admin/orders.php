<?php 
session_start();
require_once ('link.php');
require_once ('header.php');
include ('assets/confs/config.php');
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM books";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
$orders="SELECT * FROM orders WHERE status=0 LIMIT $offset, $no_of_records_per_page";
$order=mysqli_query($conn,$orders);
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
			<?php while($row=mysqli_fetch_assoc($order)):?>
	<div class="row border border-dark">
	<div class="col-md-6 border-right p-2">
	<h4>Customer Detail</h4>

		<p><b>Name : </b>
		&emsp;&emsp;<?php echo $row['name'] ?></p>
		<p><b>Email : </b>
		&emsp;&nbsp;&emsp;<?php echo $row['email'] ?></p>
		
		<p><b>Phone : </b>
		&emsp;&ensp;&nbsp;<?php echo $row['phone'] ?></p>

		
		<p><b>Address : </b>
		&emsp;<?php echo $row['address'] ?></p>	
<a href="order-status.php?id=<?php echo $row['id'] ?>&status=1" class="text-uppercase text-success">Click for deliver</a>
	
	</div>
	<div class="col-md-6 p-2">
	<!-- order items -->
<?php $orders_id=$row['id'];
$order_items="SELECT order_items.*,books.id,books.title,books.price FROM
 order_items LEFT JOIN books ON 
 books.id=order_items.book_id WHERE order_id=$orders_id";
$order_item=mysqli_query($conn,$order_items) or die(mysqli_error());?>	
<!-- table -->
<h5 class="text-center">Items Details</h5>
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
</tbody><?php endwhile ?>
</table>
	</div>
	</div>	
<?php endwhile ?>		
</div>			
<!-- pagination html -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
</nav>
</body>
</html>