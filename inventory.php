<?php
include 'db_connect.php';

// Retrieve inventory data
$sql = "SELECT *, 
       (quantity_bought - quantity_sold) AS stock_remaining,
       (quantity_sold * price) AS revenue 
       FROM inventory";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Tracker | Fashion Store</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table {
      margin: 2rem auto;
      width: 90%;
      border-collapse: collapse;
      text-align: center;
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }
    th, td {
      padding: 1rem;
      border: 1px solid #ccc;
    }
    th {
      background-color: #ff6a00;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <nav>
    <h1>Fashion Store Inventory</h1>
  </nav>

  <section class="sales">
    <h2>📦 Inventory Overview</h2>

    <table>
      <tr>
        <th>Item Name</th>
        <th>Price (KSh)</th>
        <th>Quantity Bought</th>
        <th>Quantity Sold</th>
        <th>Stock Remaining</th>
        <th>Revenue (KSh)</th>
      </tr>

      <?php
      $totalRevenue = 0;
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $totalRevenue += $row["revenue"];
          echo "
          <tr>
            <td>{$row['item_name']}</td>
            <td>{$row['price']}</td>
            <td>{$row['quantity_bought']}</td>
            <td>{$row['quantity_sold']}</td>
            <td>{$row['stock_remaining']}</td>
            <td>{$row['revenue']}</td>
          </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
      }
      ?>
    </table>

    <h3 style="margin-top:20px; color:white;">💰 Total Revenue: KSh <?php echo number_format($totalRevenue, 2); ?></h3>
  </section>
</body>
</html>

<?php
$conn->close();
?>