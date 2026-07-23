<?php
include 'config.php';

$id = $_GET['id'];
$quantity = $_GET['quantity'];

mysqli_query($conn, "UPDATE cart SET quantity='$quantity' WHERE id='$id'");

header("Location: cart.php");
exit();

?>