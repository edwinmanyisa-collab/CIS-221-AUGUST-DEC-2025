<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_name = $_POST["item_name"];
  $price = $_POST["price"];
  $quantity_bought = $_POST["quantity_bought"];

  $sql = "INSERT INTO inventory (item_name, price, quantity_bought) 
          VALUES ('$item_name', '$price', '$quantity_bought')";

  if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green; text-align:center;'>✅ Item added successfully!</p>";
  } else {
    echo "<p style='color:red; text-align:center;'>Error: " . $conn->error . "</p>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Item | Fashion Store</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <h1>Add New Product</h1>
  </nav>

  <section class="contact">
    <form method="POST" style="text-align:center;">
      <label>Item Name:</label><br>
      <input type="text" name="item_name" required><br><br>

      <label>Price (KSh):</label><br>
      <input type="number" step="0.01" name="price" required><br><br>

      <label>Quantity Bought:</label><br>
      <input type="number" name="quantity_bought" required><br><br>

      <button type="submit">Add Item</button>
    </form>
  </section>
</body>
</html>