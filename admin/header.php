<?php require_once ('link.php'); 
include ('assets/confs/config.php');
$id=$_SESSION['id'];
$uname='';
$userquery=mysqli_query($conn,"SELECT username FROM users WHERE id='$id'");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">
			<?php if(mysqli_num_rows($userquery)>0): ?>
				<?php while($uname=mysqli_fetch_assoc($userquery)): ?>
					Welcome,<b><?php echo $uname['username']; ?></b>
				<?php endwhile ?>
			<?php endif ?>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
			<a class="nav-item nav-link active" href="books-list.php">Manage Booklist<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link" href="orders.php">Manage Orders</a>
				<a class="nav-item nav-link" href="cats-list.php">Manage Category</a>
				<a class="nav-item nav-link" href="author-list.php">Manage Author</a>
				<a class="nav-item nav-link" href="logout.php">Logout</a>
			</div>
			
		</div>
<a href="delivered.php" class="text-info">View Delivered Orders</a>
	</nav>
</body>
</html>