<?php require_once ('link.php');
include ('assets/confs/auth.php');
include ('assets/confs/config.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tea&Book</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php require_once ('header.php'); ?>
<!-- pagination -->
<?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM authors";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM authors LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
?>
            <!-- here goes the data -->
<div class="container" id="authors">
	<h1>Author List</h1>
	<a href="author-add.php" class="btn btn-link">New Author</a>
  <?php while($row = mysqli_fetch_array($res_data)):?>
	<ul class="list-group">
		<li class="d-flex justify-content-between align-items-center list-group-item list-group-item-action list-group-item-light">
		<?php echo $row['name']; ?>
		<div class="action">
		<a href="author-edit.php?id=<?php echo $row['id'];?>" class="edit">
		<i class="far fa-edit"></i></a>
		<a href="author-del.php?id=<?php echo $row['id'];?>" class="del">
		<i class="fa fa-trash" aria-hidden="true"></i></a></div>
		</li>
	</ul>
<?php endwhile ?>
</div>
<!-- pagination html -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>
</nav>
<!-- ------------ -->

</body>

</html>
