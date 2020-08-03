<?php 
session_start();
include ('assets/confs/config.php');
$uname=$pwd='';
$uname=$_POST['username'];
$pwd=$_POST['password'];	
$query=mysqli_query($conn,"SELECT * FROM users WHERE username='$uname' AND password='$pwd'");

$result=mysqli_fetch_assoc($query);
if ($result) {
		$_SESSION['auth']=true;
		$id=$result['id'];
		header("location: books-list.php");
		$_SESSION['id']=$id;
}
else{
	header("location: index.php");
	$error="Try Again!Invalid data";
	$_SESSION['error']=$error;
}
?>
