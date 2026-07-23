<?php
include 'config.php';

if(isset($_POST['register'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(fullname,email,password)
            VALUES('$fullname','$email','$password')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Registration Successful!');</script>";
    }else{
        echo "<script>alert('Registration Failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2 style="text-align:center;margin-top:30px;">User Registration</h2>

<form method="POST" style="width:400px;margin:30px auto;">
    <input type="text" name="fullname" placeholder="Full Name" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit" name="register">Register</button>
</form>

</body>
</html>