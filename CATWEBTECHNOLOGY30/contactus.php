<?php
session_start();

// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $sql = "INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $phone, $message);
        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error adding record: " . $stmt->error;
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['contacts_id'];
        $newname = $_POST['newname'];
        $newemail = $_POST['newemail'];
        $newphone = $_POST['newphone'];
        $newmessage = $_POST['newmessage'];
        $sql = "UPDATE contacts SET name=?, email=?, phone=?, message=? WHERE contacts_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $newname, $newemail, $newphone, $newmessage, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['contacts_id'];
        $sql = "DELETE FROM contacts WHERE contacts_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    } elseif (isset($_POST['read'])) {
        // Assuming the session contains contacts_id
        $id = $_POST['contacts_id'];
        // Select contacts's information from the database
        $sql = "SELECT * FROM contacts WHERE contacts_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch and display contacts information
            $row = $result->fetch_assoc();
            echo "contacts_id: " . $row["contacts_id"] . "<br>";
            echo "First Name: " . $row["name"] . "<br>";
            echo "email: " . $row["email"] . "<br>";
            echo "contacts : " . $row["phone"] . "<br>";
            echo "Message : " . $row["message"] . "<br>";
        } else {
            echo "No user found with the provided ID.";
        }
    }
}
?>
