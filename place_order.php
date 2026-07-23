<?php
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$total = 0;

$result = mysqli_query($conn, "SELECT * FROM cart");

while($row = mysqli_fetch_assoc($result)){
    $total += $row['price'] * $row['quantity'];
}


$query = mysqli_query($conn, 
"INSERT INTO orders(customer_name, email, phone, address, total_amount)
VALUES('$name','$email','$phone','$address','$total')"
);


if($query){

    mysqli_query($conn, "DELETE FROM cart");

    echo "<h2>Order Placed Successfully 🎉</h2>";
    echo "<a href='index.php'>Back to Home</a>";

}
else{

    echo "Error: " . mysqli_error($conn);

}

?>