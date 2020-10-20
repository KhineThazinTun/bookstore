<?php require_once ('link.php');
include ('assets/confs/auth.php');
include ('assets/confs/config.php');
$sql="SELECT * FROM categories";
$query=mysqli_query($conn,$sql);
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
<?php require_once ('header.php'); ?>
<div class="container" id="cats-list">
	<h1>Category List</h1>
	<a href="cats-add.php" class="btn btn-link">New Category</a>
<?php while($res=mysqli_fetch_assoc($query)): ?>
	<ul class="list-group">
		<li class="d-flex justify-content-between align-items-center list-group-item list-group-item-action list-group-item-light">
		<?php echo $res['name']; ?>
		<div class="action">
		<a href="cats-edit.php?id=<?php echo $res['id'];?>" class="edit">
		<i class="far fa-edit"></i></a>
		<a href="cats-del.php?id=<?php echo $res['id'];?>" class="del">
		<i class="fa fa-trash" aria-hidden="true"></i></a></div>
		</li>
	</ul>
<?php endwhile ?>
</div>
</body>

</html>
