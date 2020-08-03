<?php require_once ('link.php');
include ('assets/confs/config.php');
$id=$_GET['id'];
$sql="SELECT * FROM authors WHERE $id=id";
$row=mysqli_query($conn,$sql);
$query=mysqli_fetch_assoc($row);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tea&Book</title>
</head>
<body>
	<div class="container" id="authors">
		<h1>EDIT Author</h1>
		<small class="text-muted"> Special character do not allow</small>
		<form action="author-update.php" method="post">
			<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $query['id']; ?>"></div>
			<div class="form-group">
			<label>Category Name</label>
			<input type="text" name="name"  class="form-control" value="<?php echo $query['name'] ?>"></div>
			<input type="submit" value="Submit" class="btn btn-primary">
			<a href="author-list.php" class="btn btn-dark">Back</a>
		</form>
	</div>
</body>
</html>