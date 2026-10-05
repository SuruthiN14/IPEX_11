<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "shopping1";
$port = 3307;

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname,
    $port
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$email = $_POST['email'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO orders
        (username, product, quantity, price, email)
        VALUES
        ('$user', '$product', '$quantity', '$price', '$email')";

if ($conn->query($sql) === TRUE) {

    echo "<h2>Order Placed Successfully!</h2>";
    echo "Name: " . $user . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Product: " . $product . "<br>";
    echo "Quantity: " . $quantity . "<br>";
    echo "Price: ₹" . $price . "<br><br>";

    echo "<a href='index.html'>Place Another Order</a><br>";
    echo "<a href='view_orders.php'>View All Orders</a>";

} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>