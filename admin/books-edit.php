<?php require_once ('link.php');
include ('assets/confs/auth.php');
include ('assets/confs/config.php');
$id=$_GET['id'];
$query=mysqli_query($conn,"SELECT * FROM books WHERE id=$id");
$cat=mysqli_query($conn,"SELECT * FROM categories");
$res=mysqli_fetch_assoc($query);
$author=mysqli_query($conn,"SELECT * FROM authors");

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
	<div class="container" id="manage-style">
		<h1>Edit Book</h1>
		<form action="books-update.php" method="post" enctype="multipart/form-data">   
		<small class="text-muted"> Special character do not allow</small>
			<div class="form-group">
		<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
			<label>Title</label>
		<input type="text" name="title" class="form-control" value="<?php echo $res['title'] ?>" required></div>
		<div class="form-group">
		<label>Author</label>
		<select name="author" class="form-control-sm">
			<?php while($authors=mysqli_fetch_assoc($author)): ?>
				<option value="<?php echo $authors['id'] ?>"
				<?php if($authors['id']==$res['author_id'] ) echo "selected"?>
				><?php echo $authors['name']; ?></option>
			<?php endwhile ?>
		</select>
		</div>
		<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control" value="<?php echo $res['price'] ?>" required></div>
		<div class="form-group">
		<label>Summary</label>
		<textarea name="summary" class="form-control"><?php echo $res['summary'] ?>
		</textarea></div>
		<div class="form-group"><?php if(!is_dir("assets/covers/{$res['cover']}") and (file_exists("assets/covers/{$res['cover']}"))): ?>
<img src="assets/covers/<?php echo $res['cover'] ?>" alt="" class="cover img-fluid">
<?php else: ?>
	<img src="assets/covers/no-cover.gif" alt="" class="cover img-fluid">
<?php endif ?></div>
		<div class="form-group">
		<label>Cover image</label>
		<input type="file" name="cover" class="form-control-file">
		</div>
		<div class="form-group">
		<label>Category</label><br>
		<select name="category_id" class="form-control-sm">
		<?php while ($result=mysqli_fetch_assoc($cat)) :?>
			<option value="<?php echo $result['id'] ?>" <?php if($result['id']==$res['category_id'] ) echo "selected"?>>
			<?php echo $result['name'];?></option>
		<?php endwhile ?>
		</select></div>
		<div class="form-group">
		<label>In Stock Books</label>
		<input type="number" name="in_stock" class="form-control-sm" value="<?php echo $res['in_stock']; ?>">
		</div>
		<input type="submit" value="Submit" class="btn btn-primary">		
		<a href="books-list.php" class="btn btn-light">Cancle</a>
		</form>
	</div>
	</body>
</html>