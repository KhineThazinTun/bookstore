<?php 
include ('assets/confs/config.php');
$name=$id='';
$id= mysqli_real_escape_string($conn,$_POST['id']);
$name= mysqli_real_escape_string($conn,$_POST['name']);
$sql="UPDATE authors SET name='$name',modified_date=now() WHERE id=$id";
 $query=mysqli_query($conn,$sql);
 // mysqli_error($conn);exit;
 header("location:author-list.php");
 ?>