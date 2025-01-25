<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $to_be_received = $_POST['to_be_received'];
    $collection = $_POST['collection'];
    $payment = $_POST['payment'];
   

    $sql = "insert into finance_status(date,to_be_received,collection,payment) values(?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssss", $date, $to_be_received,$collection, $payment);

    $statment->execute();

    header("Location:./finance.php");
} else {
}
?>