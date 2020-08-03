<?php
include ('assets/confs/auth.php');
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

        $sql = "SELECT books.*,categories.name as cat_name,authors.name as auth_name FROM books LEFT JOIN categories ON 
books.category_id=categories.id JOIN authors ON books.author_id=authors.id ORDER BY books.created_date DESC LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
require_once ('header.php');
require_once ('link.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Books List</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body> 
	<!-- books -->
	<div class="container">
		<h1>Managing Books
		<a class="btn btn-link" href="books-new.php">New Book</a></h1>	
		<?php if (isset($_SESSION['add'])) {?>
		<div class="alert alert-success"><?php echo $_SESSION['add']; unset($_SESSION['add']); ?></div>
		<?php } ?>
		<?php	while ($result=mysqli_fetch_assoc($res_data)) : ?>
			<div class="row" id="books">
				<div class="col-md-2 col-12">
					<img src="assets/covers/<?php echo $result['cover'];?>" alt="" class="covers mt-3">
				</div>
				<div class="col-md-10 col-12 py-2">	
					<ul class="list-group mb-3">
						<li class="d-flex justify-content-between align-items-center">
							<span class="title"><b>Basic Detail</b></span>
							<div class="action">
							<a href="books-edit.php?id=<?php echo $result['id'];?>" class="edit">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a>
							<a href="books-del.php?id=<?php echo $result['id']; ?>" class="del">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
							</div>
						</li>
						</ul>
					<table class="table">
					<tbody>
					<tr>
						<td>Title</td>
						<td><?php echo $result['title']; ?></td>
					</tr>
					<tr>
					<td>Author :</td>
					<td><?php echo $result['auth_name']; ?></td>
					</tr>
					<tr>
					<td>Category :</td> <td>(<?php echo $result['cat_name']; ?>)</td>	
					</tr>	
					<tr>
					<td>Price :</td>
					<td>$<?php echo $result['price'] ?></td>
					</tr>
					<tr>
					<td>In Stock Books</td>
				 <td><?php echo $result['in_stock'] ?></td>	
					</tr>
					
					</tbody>
					</table>
					<b>Description</b><p><?php echo $result['summary']; ?></p>

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