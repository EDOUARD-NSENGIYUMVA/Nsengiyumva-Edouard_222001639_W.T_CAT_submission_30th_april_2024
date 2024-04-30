
<?php
require_once "databaseconnection.php";
//nsengiyumva edouard 222001639 on 1th april 2024
$sql = "SELECT * FROM registerinsurance";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information of insurance</title>";
    echo "<h1>The Information of registerinsurance</h1>";
    echo "<table border='1'>
            <tr>
                <th>insurance_id</th>
                <th>insurance_name</th>
                <th>insurance_type</th>
                <th>coverage_amount</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["insurance_id"] . "</td>";
        echo "<td>" . $row["insurance_name"] . "</td>";
        echo "<td>" . $row["insurance_type"] . "</td>";
        echo "<td>" . $row["coverage_amount"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$connection->close();
?>
