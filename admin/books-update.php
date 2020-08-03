<?php 
include ('assets/confs/config.php');
$id=$_POST['id'];
$title =  mysqli_real_escape_string ($conn,$_POST['title']);
  $author =  mysqli_real_escape_string ($conn,$_POST['author']);
  $summary =  mysqli_real_escape_string ($conn,$_POST['summary']);
  $price =  mysqli_real_escape_string ($conn,$_POST['price']);
  $category_id =  mysqli_real_escape_string ($conn,$_POST['category_id']);
  $cover =mysqli_real_escape_string($conn,$_FILES['cover']['name']);
  $tmp =$_FILES['cover']['tmp_name'];

  if($cover) {
    move_uploaded_file($tmp, "assets/covers/$cover");
    $sql = "UPDATE books SET title='$title', author_id='$author',
      summary='$summary', price='$price', category_id='$category_id',
      cover='$cover', modified_date=now() WHERE id = $id";
  } else {
    $sql = "UPDATE books SET title='$title', author_id='$author',
      summary='$summary', price='$price', category_id='$category_id',
      modified_date=now() WHERE id = $id";
  }
    mysqli_query($conn,$sql);
    header("location: books-list.php");
 ?>