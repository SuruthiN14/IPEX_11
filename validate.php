<?php

include "db.php";

$sql = "SELECT * FROM orders ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
</head>

<body>

<div class="container">

    <h2>All Orders</h2>

    <table>

        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Order Date</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";

                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["customer_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["product"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>";
                echo "<td>₹" . number_format($row["price"], 2) . "</td>";
                echo "<td>₹" . number_format($row["total"], 2) . "</td>";
                echo "<td>" . htmlspecialchars($row["order_date"]) . "</td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='7'>No orders found.</td>";
            echo "</tr>";
        }

        ?>

    </table>

    <a class="back" href="index.php">Place New Order</a>

</div>

</body>
</html>

<?php
$conn->close();
?>