<?php
session_start();
//nsengiyumva  222001639 on 4th april 2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $manager_name = $_POST['manager_name'];
    $department_id = $_POST['department_id'];
    $salary = $_POST['salary'];
    $date_of_hire = $_POST['date_of_hire'];

    $sql = "INSERT INTO manager ( manager_name, department_id ,salary, date_of_hire) VALUES ('$manager_name', '$department_id', '$salary', '$date_of_hire')";
  
if($connection->query($sql)==TRUE){
        echo "Record added successfully.";
  }else{
    echo "Error: ".$sql."<br>" .$connection->error;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['manager_id'];
    $newmanager_name = $_POST['newmanager_name'];
    $newdepartment_id  = $_POST['newdepartment_id'];
    $newsalary = $_POST['newsalary'];
    $newdate_of_hire = $_POST['newdate_of_hire'];

    $sql = "UPDATE manager SET manager_name='$newmanager_name',  department_id ='$newdepartment_id',salary='$newsalary', date_of_hire='$newdate_of_hire' WHERE manager_id='$id'";
   $stmt = $connection->prepare($sql);
    //$stmt->bind_param("ssssssi", $newname, $newcity, $newleague, $newstadium_name, $newleague_id,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['manager_id'];

    $sql = "DELETE FROM manager WHERE manager_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains manager_id
    $id = $_POST['manager_id'];

    // Select manager's information from the database
    $sql = "SELECT * FROM manager WHERE manager_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // working and managing information
        $row = $result->fetch_assoc();
        echo "manager_id: " . $row["manager_id"] . "<br>";
        echo "First Name: " . $row["manager_name"] . "<br>";
        echo "department_id : " . $row["department_id"] . "<br>";
        echo "salary: " . $row["salary"] . "<br>";
        echo "manager ID: " . $row["date_of_hire"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}
?>
