<?php 
session_start();
include ('assets/confs/config.php');
$username=$password='';
$username=testdata($_POST['username']);
$password=testdata($_POST['password']);
function testdata($val)
{
	$val=trim($val);
	$val=htmlspecialchars($val);
	$val=stripcslashes($val);
	return $val;
}
$query="SELECT username , password FROM users WHERE username='$username'";
$same=mysqli_query($conn,$query);
if (mysqli_num_rows($same)>0)
{
	$adsame="Username already exit";
	$_SESSION['adsame']=$adsame;
	header("location: reg.php");
} 
else 
{
	$sql="INSERT INTO users(username,password,created_date) VALUES ('$username','$password',now())";
	mysqli_query($conn,$sql);
	$pass="Successfully register";
	$_SESSION['pass']=$pass;
	header("location: index.php");
	
}

?>