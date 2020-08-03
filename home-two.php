<?php 
include ('link.php'); 
include ('header.php');
include ('nav-query.php'); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tea&Book</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="book-show container-fluid mt-5">
		<div class="row">
		<div class="col-md-3">
		<h3 class="menu-title-one">Shop By Category</h3>
		<ul class="list-group list-group-flush menu-list-one">
  <li class="list-group-item">
<a href="home-two.php"  class="text-decoration-none">All Genre</a></li>
<?php while($cate=mysqli_fetch_assoc($run)): ?>
  <li class="list-group-item">
<a href="home-two.php?cat=<?php echo $cate['id'] ?>" class="text-decoration-none"><?php echo 
$cate['name'] ?></a>
  </li>
<?php endwhile ?>	
</ul>
	<h3 class="menu-title-two">Shop By Authors</h3>
		<ul class="list-group list-group-flush menu-list-two">
  <li class="list-group-item">
<a href="home-two.php"  class="text-decoration-none">All Authors</a></li>
<?php while($author=mysqli_fetch_assoc($auth)): ?>
  <li class="list-group-item">
<a href="home-two.php?author=<?php echo $author['id'] ?>" class="text-decoration-none"><?php echo 
$author['name'] ?></a>
  </li>
<?php endwhile ?>	
</ul>				
		</div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md">
					<h3>Books List</h3>
				</div>
			</div><hr>
				<div class="row">
						<?php while($book=mysqli_fetch_assoc($books)): ?>
					<div class="col-md-2 mb-4">
							<img src="admin/assets/covers/<?php echo $book['cover'] ?>" 
							alt="" class="cover img-fluid">
							<div class="title"><?php echo $book['title'] ?></div>
							<div class="price">price: $<?php echo $book['price'] ?></div>
							<div class="action">
							<a href="add-to-cart.php?id=<?php echo $book['id']; ?>"><i class="fas fa-shopping-basket"></i></a>
							<a href="book-detail.php?detail=<?php echo $book['id'] ?>"><i class="far fa-eye"></i></a>
					</div>
					</div>
						<?php endwhile ?>
				</div>
			</div>
				</div>
		<!-- pagination -->
	<nav aria-label="Page navigation example" class="mt-4">
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
	</div>
	
	
</body>
</html>