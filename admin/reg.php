<?php session_start(); 
require_once ('link.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Treasure</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="regform container">
		<form method="post" action="reg-data.php">
	<h1 class="mb-3">Register to Book Store Administration</h1>
			<div class="form-group">
	<label class="col-form-label">Username</label>
		<input type="text" name="username" class="form-control" required>
	</div>
			<div class="form-group">
				<label class="col-form-label">Password</label>
					<input type="password" class="form-control" name="password" pattern="[A-Za-z0-9]+{3}" title="Three or more characters and number" required>
			</div>
			<div class="form-group text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="index.php" class="btn btn-secondary ">Cancle</a>
			</div>
		</form>
		<?php if(isset($_SESSION['adsame'])){$same=$_SESSION['adsame'];?>
		<div class="alert alert-warning "><?php echo $same; ?></div>
		<?php unset($_SESSION['adsame']);} ?>
	</div>
	<!-- ----------------------- -->
</body>
</html>