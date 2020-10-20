<?php require_once ('link.php');
include ('assets/confs/config.php');
$id=$_GET['id'];
$sql="SELECT * FROM categories WHERE $id=id";
$row=mysqli_query($conn,$sql);
$query=mysqli_fetch_assoc($row);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
</head>
<body>
	<div class="container" id="edit-cat">
		<h1>EDIT CATEGORY</h1>
		<small class="text-muted"> Special character do not allow</small>
		<form action="cats-update.php" method="post">
			<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $query['id']; ?>"></div>
			<div class="form-group">
			<label>Category Name</label>
			<input type="text" name="name"  class="form-control" value="<?php echo $query['name'] ?>"></div>
			<div class="form-group">
<label>Remark</label>
			<textarea name="remark" class="form-control" ><?php echo $query['remark'] ?></textarea></div>
			<input type="submit" class="btn btn-success" value="Submit">
			<a href="cats-list.php" class="btn btn-dark">Back</a>
		</form>
	</div>
</body>
</html>
