<?php
// Include the database connection file
require_once "databaseconnection.php";

// Perform SELECT query to retrieve data
$sql = "SELECT * FROM employee";
$result = $connection->query($sql);
//Nsengiyumva Edouard  222001639 on 18th april 2024
// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<h2>Employee Information</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Employee ID</th>
    <th>Employee Name</th>
    <th>Department_id</th>
    <th>Manager_id</th>
    <th>Position</th>
    <th>Salary</th>
    <th>Date_of_hire</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["employee_id"] . "</td>";
        echo "<td>" . $row["employee_name"] . "</td>";
        echo "<td>" . $row["department_id"] . "</td>";
        echo "<td>" . $row["manager_id"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
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
