<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM cart");
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1 style="text-align:center; margin-top:30px;">🛒 My Shopping Cart</h1>

<table border="1" cellspacing="0" cellpadding="12" style="width:80%; margin:auto; text-align:center;">

<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Action</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)){ 

$item_total = $row['price'] * $row['quantity'];
$total += $item_total;
?>

<tr>
    <td><?php echo $row['product_name']; ?></td>
    <td>Rs. <?php echo $row['price']; ?></td>
    <tr>
    <td><?php echo $row['product_name']; ?></td>

    <td>Rs. <?php echo $row['price']; ?></td>

    <td>

        <a href="update_cart.php?id=<?php echo $row['id']; ?>&quantity=<?php echo $row['quantity']-1; ?>">
            <button>-</button>
        </a>

        <?php echo $row['quantity']; ?>

        <a href="update_cart.php?id=<?php echo $row['id']; ?>&quantity=<?php echo $row['quantity']+1; ?>">
            <button>+</button>
        </a>

    </td>

    <td>Rs. <?php echo $item_total; ?></td>

    <td>
        <a href="remove_from_cart.php?id=<?php echo $row['id']; ?>">
            <button>Remove</button>
        </a>
    </td>

</tr>
    <td>Rs. <?php echo $item_total; ?></td>
</tr>
<td>
<a href="remove_from_cart.php?id=<?php echo $row['id']; ?>">
<button>Remove</button>
</a>
</td>
</tr>
<?php } ?>

<tr>
    <th colspan="3">Grand Total</th>
    <th>Rs. <?php echo $total; ?></th>
</tr>

</table>

<div style="text-align:center; margin-top:30px;">
    <a href="checkout.php">
        <button style="padding:15px 35px; font-size:18px;">
            Proceed to Checkout
        </button>
    </a>
</div>

</body>
</html>