<?php
// Include the database connection file
require_once "databaseconnection.php";
//Nsengiyumva Edouard222001639 on 15th april 2024
// Perform SELECT query to retrieve data
$sql = "SELECT * FROM manager";
$result = $connection->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<h2>Manager Information</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Manager ID</th>
    <th>Manager_name</th>
    <th>Department_id</th>
   <th>Salary</th>
    <th>Date_of_hire</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["manager_id"] . "</td>";
        echo "<td>" . $row["manager_name"] . "</td>";
       echo "<td>" . $row["department_id"] . "</td>";
        echo "<td>" . $row["salary"] . "</td>";
        echo "<td>" . $row["date_of_hire"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$connection->close();
?>
