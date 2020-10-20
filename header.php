<?php 
include ('link.php');
session_start();
 $cart = 0;
  if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $qty) {
      $cart += $qty;
    }
  }
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Book-store</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Book-store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <form class="form-inline my-2 my-lg-0 mx-2" action="index.php" method="get">
      <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
    </form>
<button type="button" class="btn btn-secondary mx-2">
 <a href="view-cart.php"> Add To Cart <span class="badge badge-light"><?php echo $cart ?></span></a>
  <span class="sr-only">unread messages</span>
</button>
    </ul>
  </div>
</nav>
	</header>
</html>
