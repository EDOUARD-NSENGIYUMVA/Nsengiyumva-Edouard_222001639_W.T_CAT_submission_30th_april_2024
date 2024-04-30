<?php
// Include the database connection file
require_once "databaseconnection.php";

// Perform SELECT query to retrieve data
$sql = "SELECT * FROM department";
$result = $connection->query($sql);
//Nsengiyumva Edouard 222001639 on 18th april 2024
// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<h2>Department Information</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Department_id</th>
    <th>Department_name</th>
    <th>Location</th>
    <th>Budget</th>
   </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["department_id"] . "</td>";
        echo "<td>" . $row["department_name"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["budget"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$connection->close();
?>
