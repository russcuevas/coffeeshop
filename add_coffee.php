<?php 
include 'config/connection.php';

if (isset($_POST['submit'])){
  $coffee_name = $_POST['coffee_name'];
  $coffee_expired = $_POST['coffee_expired'];
  $coffee_date = date('Y-m-d', strtotime($coffee_expired));
  $coffee_price = $_POST['coffee_price'];

  $stmt = $conn->prepare("INSERT INTO coffee(coffee_name, coffee_expired, coffee_price) VALUES(?, ?, ?)");
  $stmt->execute([$coffee_name, $coffee_date, $coffee_price]);
  header('location: shop.php');
}
?>
