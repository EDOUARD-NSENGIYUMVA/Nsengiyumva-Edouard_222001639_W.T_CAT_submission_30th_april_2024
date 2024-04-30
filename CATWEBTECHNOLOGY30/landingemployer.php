<?php
session_start();
//nsengiyumva edouard 222001639on 16th april 2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    
    $employer_name = $_POST['employer_name'];
    $bank_id = $_POST['bank_id'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    $sql = "INSERT INTO employer (employer_name, bank_id, contact_number,address) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $employer_name, $bank_id,$contact_number,$address);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['employer_id'];
    $newemployer_name = $_POST['newemployer_name'];
    $newbank_id = $_POST['newbank_id'];
    $newcontact_number = $_POST['newcontact_number'];
     $newaddress = $_POST['newaddress'];
   $sql = "UPDATE employer SET  employer_name='$newemployer_name', bank_id='$newbank_id', contact_number='$newcontact_number', address='$newaddress' WHERE employer_id='$id'";
 $stmt = $connection->prepare($sql);
   if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['employer_id'];

    $sql = "DELETE FROM employer WHERE employer_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains employer_id
    $id = $_POST['employer_id'];

    // Select department's information from the database
    $sql = "SELECT * FROM employer WHERE employer_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display department information
        $row = $result->fetch_assoc();
        echo "employer_id: " . $row["employer_id"] . "<br>";
        echo "employer_name: " . $row["employer_name"] . "<br>";
        echo "bank_id: " . $row["bank_id"] . "<br>";
        echo "contact_number: " . $row["contact_number"] . "<br>";
        echo "address: " . $row["address"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}


