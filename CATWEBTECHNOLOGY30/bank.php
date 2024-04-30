
<?php
require_once "databaseconnection.php";
//Nsengiyumva Edouard 222001639 on 18th april 2024
$sql = "SELECT * FROM bank ";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information of Bank</title>";
    echo "<h1>The Information of Bank </h1>";
    echo "<table border='1'>
            <tr>
                <th>Bank_id</th>
                <th>Bank_name</th>
                <th>account_number</th>
                <th>Branch_name</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["bank_id"] . "</td>";
        echo "<td>" . $row["bank_name"] . "</td>";
        echo "<td>" . $row["account_number"] . "</td>";
        echo "<td>" . $row["branch_name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$connection->close();
?>
