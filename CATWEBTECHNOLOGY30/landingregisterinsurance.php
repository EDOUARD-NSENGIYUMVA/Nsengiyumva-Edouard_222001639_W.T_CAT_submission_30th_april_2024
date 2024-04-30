<?php
session_start();

// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['create'])) {
        $insurance_name = $_POST['insurance_name'];
        $insurance_type = $_POST['insurance_type'];
        $coverage_amount = $_POST['coverage_amount'];

        $sql = "INSERT INTO registerinsurance (insurance_name, insurance_type, coverage_amount) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $insurance_name, $insurance_type, $coverage_amount);

        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error adding record: " . $stmt->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['insurance_id'];
        $newinsurance_name = $_POST['newinsurance_name'];
        $newinsurance_type = $_POST['newinsurance_type'];
        $newcoverage_amount = $_POST['newcoverage_amount'];

        $sql = "UPDATE registerinsurance SET insurance_name=?, insurance_type=?, coverage_amount=? WHERE insurance_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $newinsurance_name, $newinsurance_type, $newcoverage_amount, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['insurance_id'];

        $sql = "DELETE FROM registerinsurance WHERE insurance_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    } elseif (isset($_POST['read'])) {
        $id = $_POST['insurance_id'];

        $sql = "SELECT * FROM registerinsurance WHERE insurance_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "insurance_id: " . $row["insurance_id"] . "<br>";
            echo "Insurance Name: " . $row["insurance_name"] . "<br>";
            echo "Insurance Type: " . $row["insurance_type"] . "<br>";
            echo "Coverage Amount: " . $row["coverage_amount"] . "<br>";
        } else {
            echo "No registerinsurance found with the provided ID.";
        }
    }
}

// Close the database connection
$connection->close();
?>
