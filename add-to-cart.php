<?php 
session_start();
require_once ('link.php');
$cart=0;
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $_SESSION['cart'][$id]++;
  header('location:view-cart.php');
}
?>