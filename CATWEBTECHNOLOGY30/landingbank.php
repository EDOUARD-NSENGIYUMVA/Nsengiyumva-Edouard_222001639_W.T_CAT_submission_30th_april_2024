<?php
session_start();

// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['create'])) {
        $bank_name = $_POST['bank_name'];
        $account_number = $_POST['account_number'];
        $branch_name = $_POST['branch_name'];

        $sql = "INSERT INTO bank (bank_name, account_number, branch_name) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $bank_name, $account_number, $branch_name);

        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error adding record: " . $stmt->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['bank_id'];
        $newbank_name = $_POST['newbank_name'];
        $newaccount_number = $_POST['newaccount_number'];
        $newbranch_name = $_POST['newbranch_name'];

        $sql = "UPDATE bank SET bank_name=?, account_number=?, branch_name=? WHERE bank_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $newbank_name, $newaccount_number, $newbranch_name, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['bank_id'];

        $sql = "DELETE FROM bank WHERE bank_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    } elseif (isset($_POST['read'])) {
        $id = $_POST['bank_id'];

        $sql = "SELECT * FROM bank WHERE bank_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "bank_id: " . $row["bank_id"] . "<br>";
            echo "Bank Name: " . $row["bank_name"] . "<br>";
            echo "Account Number: " . $row["account_number"] . "<br>";
            echo "Branch Name: " . $row["branch_name"] . "<br>";
        } else {
            echo "No bank found with the provided ID.";
        }
    }
}

// Close the database connection
$connection->close();
?>
