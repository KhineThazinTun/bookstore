<?php 
include ('assets/confs/config.php');
$name=$remark='';
$name= mysqli_real_escape_string($conn,$_POST['name']);
$remark= mysqli_real_escape_string($conn,$_POST['remark']);
$sql="INSERT INTO categories (name,remark,created_date,modified_date)
 VALUES ('$name','$remark',now(),now())";
 $query=mysqli_query($conn,$sql);
 header("location: cats-list.php");
 ?>