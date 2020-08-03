<?php 
require_once('link.php'); 
include ('header.php');
include ('admin/assets/confs/config.php');
if (!isset($_GET['detail'])) {
  header('location:index.php');
  exit();
}
else{
  $id = $_GET['detail'];
  $books = mysqli_query($conn, "SELECT books.*,categories.name as cat_name,authors.name as auth_name FROM books LEFT JOIN categories ON 
    books.category_id=categories.id JOIN authors ON books.author_id=authors.id WHERE books.id=$id");
  $row = mysqli_fetch_assoc($books);  
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Book Detail</title>
</head>
<body>
  <div class="container">
    <div class="detail row mt-4 ">
      <div class="col-md-2">  
        <img src="admin/assets/covers/<?php echo $row['cover'] ?>" class="cover img-fluid img-thumbnail">
      </div>
      <div class="col-md-10">
        <table class="table">
          <thead>
            <tr>  <h1>Book Detail</h1> </tr>
          </thead>
          <tbody>
            <tr>
            <td>Title</td>
              <td> 
                <?php echo $row['title'] ?>
              </td>
            </tr>
            <tr>
            <td>Author</td>
              <td>
                <i><?php echo $row['auth_name'] ?></i>
              </td>
            </tr>
            <tr>
              <td>Price</td>
              <td>
              $ <?php echo $row['price'] ?>
              </td>
            </tr>
          </tbody>
        </table>
<h3>Book Description</h3>
        <p><?php echo $row['summary'] ?></p>

        <a href="add-to-cart.php?id=<?php echo $id ?>" class="add-to-cart">
          Add to Cart
          <a href="index.php" class="back btn btn-link">&laquo; Go Back</a>
        </a>
      </div>

    </div> 
  </div>


  <div class="footer">
    &copy; <?php echo date("Y") ?>. All right reserved.
  </div>
</body>
</html>