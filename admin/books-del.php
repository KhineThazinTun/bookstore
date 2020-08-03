<?php 
include ('assets/confs/auth.php');
include ('assets/confs/config.php');
$id=$_GET['id'];
$query="DELETE FROM books WHERE id=$id";
mysqli_query($conn,$query);
header('location: books-list.php'); ?>