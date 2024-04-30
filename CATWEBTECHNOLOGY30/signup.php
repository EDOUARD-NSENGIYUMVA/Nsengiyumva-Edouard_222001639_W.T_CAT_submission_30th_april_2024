<?php
// Start session
session_start();
 require_once "databaseconnection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
   

    // Prepare and execute SQL query to insert user data into the database
    $sql = "INSERT INTO admin (email, username, password, contact) VALUES ('$email', '$username', '$password', '$contact')";
  if($connection->query($sql)==TRUE){
    echo "Registration successiful!";
      header("Location:login.html");
      exit();
  }else{
    echo "Error: ".$sql."<br>" .$connection->error;
  }
}$connection->close();
 ?>
