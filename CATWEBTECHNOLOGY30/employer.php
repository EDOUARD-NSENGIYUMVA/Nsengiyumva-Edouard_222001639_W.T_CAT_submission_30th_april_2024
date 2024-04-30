<?php
// Include the database connection file
require_once "databaseconnection.php";

// Perform SELECT query to retrieve data
$sql = "SELECT * FROM employer";
$result = $connection->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data in a table format
    echo "<h2>Employer Information</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Employer ID</th>
    <th>Employer_name</th>
    <th>Bank_id</th>
    <th>Contact_number</th>
    <th>Address</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["employer_id"] . "</td>";
        echo "<td>" . $row["employer_name"] . "</td>";
        echo "<td>" . $row["bank_id"] . "</td>";
        echo "<td>" . $row["contact_number"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$connection->close();
?>
