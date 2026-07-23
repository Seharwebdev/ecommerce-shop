<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'config.php';

$username = "Guest";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $username = $user['fullname'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MyShop - E-Commerce</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar">

    <div class="logo">MyShop</div>

    <div class="search-box">
        <input type="text" id="search" placeholder="Search products...">
        <button id="search-btn">Search</button>
    </div>

    <ul class="menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <div class="icons">
        <span>🔍</span>
        <span id="cart-icon">🛒 (0)</span>
        <span>👤 <?php echo $username; ?></span>
    </div>

</nav>

<section class="hero">
    <h1>Welcome to MyShop</h1>
    <p>Discover the latest fashion, electronics, and accessories at the best prices.</p>
    <button>Shop Now</button>
</section>

<section class="categories">
<h2>Shop by Category</h2>

<div class="category-box">

<div class="category">
<img src="images/fashion.jpg">
<h3>Fashion</h3>
</div>

<div class="category">
<img src="images/electronics.jpg">
<h3>Electronics</h3>
</div>

<div class="category">
<img src="images/shoes.jpg">
<h3>Shoes</h3>
</div>

<div class="category">
<img src="images/watch.jpg">
<h3>Watches</h3>
</div>

</div>
</section>

<section class="products">
<h2>Featured Products</h2>

<div class="product-container">

<div class="card">
<img src="images/shoes.jpg">
<h3>Sports Shoes</h3>
<p>Rs. 3,999</p>
<button>Add to Cart</button>
</div>

<div class="card">
<img src="images/watch.jpg">
<h3>Smart Watch</h3>
<p>Rs. 6,999</p>
<button>Add to Cart</button>
</div>

<div class="card">
<img src="images/headphone.jpg">
<h3>Headphones</h3>
<p>Rs. 2,499</p>
<button>Add to Cart</button>
</div>

</div>
</section>

<section class="sale-banner">
<h2>🔥 Mega Sale - Up to 50% OFF 🔥</h2>
<p>Limited Time Offer! Shop your favourite products now.</p>
<button>Shop Now</button>
</section>

<section class="products">
<h2>Latest Products</h2>

<div class="product-container">

<?php
$result = mysqli_query($conn,"SELECT * FROM products");

while($row=mysqli_fetch_assoc($result)){
?>

<div class="card">
<img src="images/<?php echo $row['image']; ?>">
<h3><?php echo $row['name']; ?></h3>
<p>Rs. <?php echo $row['price']; ?></p>
<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">
    <button>Add to Cart</button>
</a>
</div>

<?php } ?>

</div>
</section>

<footer>
<h3>MyShop</h3>
<p>© 2026 MyShop. All Rights Reserved.</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>