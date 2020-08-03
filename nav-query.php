<?php 
include ('admin/assets/confs/config.php'); 
// category navgation

$cat_sql="SELECT * FROM categories";
$run=mysqli_query($conn,$cat_sql);
// author navgation
$author="SELECT * FROM authors";
$auth=mysqli_query($conn,$author);

?>
