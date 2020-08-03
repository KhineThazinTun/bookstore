<?php 
$db_host="localhost";
$db_name="book_store";
$db_user="root";
$db_pwd="";
$conn=mysqli_connect($db_host,$db_user,$db_pwd);
mysqli_select_db($conn,$db_name);
 ?>