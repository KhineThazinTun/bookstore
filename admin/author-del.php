<?php 
include ('assets/confs/config.php');
$id=$_GET['id'];
$sql="DELETE FROM authors WHERE id=$id";
 $query=mysqli_query($conn,$sql);
 // mysqli_error($conn);exit;
 header("location: author-list.php");
 ?>