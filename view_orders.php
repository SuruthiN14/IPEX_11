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

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

echo "<h2>ALL ORDERS</h2>";

if ($result->num_rows > 0) {

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Product</th>";
    echo "<th>Quantity</th>";
    echo "<th>Price</th>";
    echo "<th>Email</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "No orders found.";
}

echo "<br><br>";
echo "<a href='index.html'>Place Another Order</a>";

$conn->close();

?>