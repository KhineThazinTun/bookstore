<?php session_start(); require_once ('link.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Tea&Book</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- login form -->
<div class="loginform container">
<form action="login.php" method="post">
<h1>Login to Book Store Administration</h1>
<!-- Login error -->
<?php if (isset($_SESSION['error'])) { $error=$_SESSION['error']; ?>
<div class="alert alert-warning"><?php echo $error; ?></div>	
	<?php unset($_SESSION['error']); } ?>
<!-- register success -->
<?php if (isset($_SESSION['pass'])) { $pass=$_SESSION['pass']; ?>
<div class="alert alert-warning"><?php echo $pass; ?></div>	
	<?php unset($_SESSION['pass']); } ?>
<!-- end of login error -->
	<div class="form-group">
	<label class="col-form-label">Username</label>
		<input type="text" name="username" class="form-control" required>
	</div>
	<div class="form-group">
	<label class="col-form-label">Password</label>
		<input type="password" name="password" class="form-control" required>
	</div>
	<div class="form-group text-center">
	<input type="submit" value="Login" class="btn btn-primary">
	<a href="reg.php" class="btn btn-link">Register</a>
	</div>
</form>
</div>
</body>
</html>

