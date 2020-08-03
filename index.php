<?php 
include ('link.php'); 
include ('header.php');
include ('nav-query.php');
 include("search.lib.php");

 
// books for homeshow
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
         $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM books";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
if (isset($_GET['cat'])) {
    $cat_id=$_GET['cat'];
    $sql ="SELECT books.*,categories.name as cat_name,authors.name as auth_name FROM books LEFT JOIN categories ON 
books.category_id=categories.id JOIN authors ON books.author_id=authors.id WHERE books.category_id =$cat_id ORDER BY created_date
        DESC LIMIT $offset, $no_of_records_per_page";
}
elseif (isset($_GET['author'])) {
	$author_id=$_GET['author'];
    $sql ="SELECT books.*,authors.name as auth_name FROM books LEFT JOIN authors ON books.author_id=authors.id WHERE authors.id=$author_id ORDER BY created_date DESC LIMIT $offset, $no_of_records_per_page";
}
else{
$sql = "SELECT books.*,categories.name as cat_name,authors.name as auth_name FROM books LEFT JOIN categories ON 
books.category_id=categories.id JOIN authors ON books.author_id=authors.id ORDER BY books.created_date DESC LIMIT $offset, $no_of_records_per_page";
}
//search 

        $books = mysqli_query($conn,$sql); 
 if(isset($_GET['q'])) {
  	$books = search_perform($_GET['q'], "books", "title");
  }
// books for latest
$query="SELECT * FROM books ORDER BY created_date DESC LIMIT 6";
$latest=mysqli_query($conn,$query);
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
<a href="index.php"  class="text-decoration-none">All Genre</a></li>
<?php while($cate=mysqli_fetch_assoc($run)): ?>
  <li class="list-group-item">
<a href="index.php?cat=<?php echo $cate['id'] ?>" class="text-decoration-none"><?php echo 
$cate['name'] ?></a>
  </li>
<?php endwhile ?>	
</ul>
	<h3 class="menu-title-two">Shop By Authors</h3>
		<ul class="list-group list-group-flush menu-list-two">
  <li class="list-group-item">
<a href="index.php"  class="text-decoration-none">All Authors</a></li>
<?php while($author=mysqli_fetch_assoc($auth)): ?>
  <li class="list-group-item">
<a href="index.php?author=<?php echo $author['id'] ?>" class="text-decoration-none"><?php echo 
$author['name'] ?></a>
  </li>
<?php endwhile ?>	
</ul>				
		</div>
<!-- Main -->
<!-- latest -->
<div class="col-md-8">
<h4>Latest Books</h4><hr>
<div class="row mb-5">
<?php while ($late=mysqli_fetch_assoc($latest)):?>
<div class="col-md-2">
	<div class="card mb-2 border-0">
		<a href="book-detail.php?detail=<?php echo $late['id'] ?>"><img src="admin/assets/covers/<?php echo $late['cover'] ?>" alt="" class="cover card-img"></a>
		<div class="title card-text"><?php echo $late['title'] ?></div>
		<div class="price">price: $<?php echo $late['price'] ?></div>
	</div>
</div>
<?php endwhile ?>	
</div>
<!-- booklist -->
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

				<!-- endof main -->
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
</body>
</html>