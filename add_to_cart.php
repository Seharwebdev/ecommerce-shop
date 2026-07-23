<?php
include 'config.php';

if(isset($_GET['id'])){

    $product_id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($result);

    $name = $product['name'];
    $price = $product['price'];

    mysqli_query($conn, "INSERT INTO cart(product_id, product_name, price, quantity)
    VALUES('$product_id','$name','$price','1')");

    header("Location: index.php");
    exit();

}

?>