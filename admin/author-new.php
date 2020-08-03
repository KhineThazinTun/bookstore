<?php 
include ('assets/confs/config.php');
$name=$remark='';
$name= mysqli_real_escape_string($conn,$_POST['name']);
$sql="INSERT INTO authors (name,created_date,modified_date)
 VALUES ('$name',now(),now())";
 $query=mysqli_query($conn,$sql);
 header("location: author-list.php");
 ?>