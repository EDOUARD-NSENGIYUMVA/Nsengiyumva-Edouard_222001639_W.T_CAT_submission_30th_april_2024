<?php
require_once "databaseconnection.php";
//222003223 Nsengiyumva edouard  
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $bank_id = $_POST['bank_id'];
  $bank_name = $_POST['bank_name'];
  $account_number = $_POST['account_number'];
  $branch_name = $_POST['branch_name'];
  $sql ="INSERT INTO bank (bank_id,bank_name,account_number,branch_name) VALUES ('$bank_id','$bank_name','$account_number','$branch_name')";
  if($connection->query($sql)==TRUE){
    echo "Registration successiful!";
      header("bank_name:loginbank.html");
      exit();
  }else{
    echo "Error: ".$sql."<br>" .$connection->error;
  }
}$connection->close();
 ?>
