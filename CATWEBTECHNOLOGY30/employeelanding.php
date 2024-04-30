<?php
session_start();
//Nsengiyumva Edouard 222001639 on 18th april 2024
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
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['employee_id'];
    $newemployee_name = $_POST['newemployee_name'];
    $newdepartment_id = $_POST['newdepartment_id'];
    $newmanager_id = $_POST['newmanager_id'];
    $newposition = $_POST['newposition'];
    $newsalary = $_POST['newsalary'];
    $newdate_of_hire = $_POST['newdate_of_hire'];

    $sql = "UPDATE employee SET  employee_name=?, department_id=?, manager_id=?, position=?, salary=?, date_of_hire=? WHERE employee_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssi",  $newemployee_name, $newdepartment_id, $newmanager_id, $newposition, $newsalary, $newdate_of_hire, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['employee_id'];

    $sql = "DELETE FROM employee WHERE employee_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains employee_id
    $id = $_POST['employee_id'];

    // Select playee's information from the database
    $sql = "SELECT * FROM employee WHERE employee_id=?";
    $stmt = $connection->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $connection->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Error executing statement: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        // work and display manager information
        $row = $result->fetch_assoc();
        echo "Employee_id: " . $row["employee_id"] . "<br>";
        echo "First Name: " . $row["employee_name"] . "<br>";
        echo "Last Name: " . $row["employee_id"] . "<br>";
        echo "department_id: " . $row["department_id"] . "<br>";
        echo "manager_id: " . $row["manager_id"] . "<br>";
        echo "position: " . $row["position"] . "<br>";
        echo "salary: " . $row["salary"] . "<br>";
        echo "date_of_hire: " . $row["date_of_hire"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}
$connection->close();
?>