<?php require_once ('link.php');
include ('assets/confs/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
</head>
<body>
	<div class="container" id="add-cat">
		<h1>NEW Author</h1>
		<small class="text-muted"> Special character do not allow</small>
		<form action="author-new.php" method="post">
			<div class="form-group">
				<input type="hidden" name="id"></div>
				<div class="form-group">
					<label>Author Name</label>
					<input type="text" name="name" class="form-control"></div>	
						<input type="submit" value="Submit" class="btn btn-primary">
						<a href="author-list.php" class="btn btn-dark">Back</a>
					</form>
				</div>
			</body>
			</html>