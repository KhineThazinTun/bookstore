<?php 
session_start();
include('assets/confs/config.php');
$title = mysqli_real_escape_string ($conn,$_POST['title']);
  $author = mysqli_real_escape_string ($conn,$_POST['author']);
  $summary = mysqli_real_escape_string ($conn,$_POST['summary']);
  $price = mysqli_real_escape_string ($conn,$_POST['price']);
  $in_stock = mysqli_real_escape_string ($conn,$_POST['in_stock']);
  $category_id = mysqli_real_escape_string ($conn,$_POST['category_id']);

  $cover =mysqli_real_escape_string($conn,$_FILES['cover']['name']);
  $tmp =$_FILES['cover']['tmp_name'];

  if($cover) {
    move_uploaded_file($tmp, "assets/covers/$cover");
  }
  $sql = "INSERT INTO books (
    title,summary, price,category_id,author_id, 
    cover,in_stock,created_date, modified_date
  ) VALUES (
    '$title','$summary', '$price',
    '$category_id','$author','$cover','$in_stock' ,now(), now()
  )";

mysqli_query($conn,$sql);
header("location: books-list.php");
$_SESSION['add']="Successfully Added";
 ?>
