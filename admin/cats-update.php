<?php 
include ('assets/confs/config.php');
$name=$remark=$id='';
$id= mysqli_real_escape_string($conn,$_POST['id']);
$name= mysqli_real_escape_string($conn,$_POST['name']);
$remark= mysqli_real_escape_string($conn,$_POST['remark']);
$sql="UPDATE categories SET name='$name',remark='$remark',modified_date=now() WHERE id=$id";
 $query=mysqli_query($conn,$sql);
 // mysqli_error($conn);exit;
 header("location: cats-list.php");
 ?>