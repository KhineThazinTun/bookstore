<?php 
include ('assets/confs/config.php');
$id=$_GET['id'];
$sql="DELETE FROM categories WHERE id=$id";
 $query=mysqli_query($conn,$sql);
 // mysqli_error($conn);exit;
 header("location: cats-list.php");
 ?>