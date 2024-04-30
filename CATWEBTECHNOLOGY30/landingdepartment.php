<?php
session_start();

// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Assuming $connection is your database connection

    // Sanitize input data
    $department_name = htmlspecialchars($_POST['department_name']);
    $location = htmlspecialchars($_POST['location']);
    $budget = htmlspecialchars($_POST['budget']);

    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO department (department_name, location, budget) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);

    // Bind parameters to statement
    $stmt->bind_param("sss", $department_name, $location, $budget);

    // Execute statement
    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}//Nsengiyumva Edouard 222001639 on 10th april 2024

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Validate input data
    $id = $_POST['department_id'];
    $newdepartment_name = $_POST['newdepartment_name'];
    $newlocation = $_POST['newlocation'];
    $newbudgets = $_POST['newbudget'];

    // Assuming $connection is your database connection object

    // Prepare SQL statement with placeholders
    $sql = "UPDATE department SET department_id=?, department_name=?, location=?, budget=? WHERE  department_id=?";
    $stmt = $connection->prepare($sql);

    // Bind parameters to statement
    $stmt->bind_param("sssi", $newdepartment_name, $newnewlocation, $newbudget, $id);

    // Execute statement
    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['department_id'];

    $sql = "DELETE FROM department WHERE department_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains department_id
    $id = $_POST['department_id'];

    // Select department's information from the database
    $sql = "SELECT * FROM department WHERE department_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // working and managing department information
        $row = $result->fetch_assoc();
        echo "department_id: " . $row["department_id"] . "<br>";
        echo "department_name: " . $row["department_name"] . "<br>";
        echo "location: " . $row["location"] . "<br>";
        echo "budget: " . $row["budget"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}
?>
