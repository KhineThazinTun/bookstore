<?php require_once ('link.php');
include ('assets/confs/auth.php');
include ('assets/confs/config.php');
$cat=mysqli_query($conn,"SELECT * FROM categories");
$author=mysqli_query($conn,"SELECT * FROM authors");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Book Store</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
	<div class="container" id="manage-style">
		<h1>Add New Book</h1>
		<form action="books-add.php" method="post" enctype="multipart/form-data">
		<small class="text-muted"> Special character do not allow</small>
			<div class="form-group">
			<label>Title</label>
		<input type="text" name="title" class="form-control" required></div>
		<div class="form-group">
		<label>Author</label>
		<select name="author" class="form-control-sm">
			<?php while($authors=mysqli_fetch_assoc($author)): ?>
				<option value="<?php echo $authors['id'] ?>">
				<?php echo $authors['name']; ?>
				</option>
			<?php endwhile ?>
		</select>
		</div>
		<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control" required></div>
		
		<div class="form-group">
		<label>Category</label><br>
		<select name="category_id" class="form-control-sm" required></div>
		<?php while ($result=mysqli_fetch_assoc($cat)) :?>
			<option value="<?php echo $result['id'] ?>"><?php echo $result['name'];?></option>
		<?php endwhile ?>
		</select>
		<div class="form-group">
		<label>Summary</label>
		<textarea name="summary" class="form-control"></textarea>
		</div>
		<div class="form-group">
		<label>Cover image</label>
		<input type="file" name="cover" class="form-control-file"></div>
		<div class="form-group">
		<label>In Stock Books</label>
		<input type="number" name="in_stock" class="form-control-sm">
		</div>
		<input type="submit" value="Submit" class="btn btn-primary">		
		<a href="books-list.php" class="btn btn-light">Cancle</a>
		</form>
	</div>
	</body>
</html>