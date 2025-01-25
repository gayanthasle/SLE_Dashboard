<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $status = $_POST['status'];
    

    $sql = "insert into scalp_status( date,start,end, status) values(?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssss", $date, $start, $end, $status);

    $statment->execute();

    header("Location:./Aluminum.php");
} else {
}
?>
