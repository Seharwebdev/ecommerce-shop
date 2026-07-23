<?php
include 'config.php';

$total = 0;

$result = mysqli_query($conn, "SELECT * FROM cart");

while($row = mysqli_fetch_assoc($result)){
    $total += $row['price'] * $row['quantity'];
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1 style="text-align:center;">Checkout</h1>


<form method="POST" action="place_order.php" style="width:400px;margin:auto;">

<input type="text" name="name" placeholder="Full Name" required><br><br>

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="text" name="phone" placeholder="Phone Number" required><br><br>

<textarea name="address" placeholder="Address" required></textarea><br><br>


<h3>Total Amount: Rs. <?php echo $total; ?></h3>


<button type="submit">
Place Order
</button>


</form>


</body>
</html>