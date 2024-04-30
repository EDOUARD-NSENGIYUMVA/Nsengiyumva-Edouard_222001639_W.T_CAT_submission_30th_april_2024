<?php
session_start();
//Nsengiyumva Edouard 2222001639 on 18th april 2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $employee_name = $_POST['employee_name'];
    $department_id = $_POST['department_id'];
    $manager_id = $_POST['manager_id'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $date_of_hire = $_POST['date_of_hire'];

    $sql = "INSERT INTO employee ( employee_name, department_id, manager_id, position, salary, date_of_hire) VALUES ('$employee_name', '$department_id', '$manager_id', '$position', '$salary','$date_of_hire')";
if($connection->query($sql)==TRUE){
        echo "Record added successfully.";
  }else{
    echo "Error: ".$sql."<br>" .$connection->error;
  }
}$connection->close();
?>