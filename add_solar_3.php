<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $to_be_started = $_POST['to_be_started'];
    $in_progress = $_POST['in_progress'];
    $handed_over = $_POST['handed_over'];


    $sql = "insert into solar_installations(date, to_be_started,in_progress,handed_over) values(?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssss",$date, $to_be_started, $in_progress,$handed_over);

    $statment->execute();

    header("Location:./solar.php");
} else {
}
?>
?>