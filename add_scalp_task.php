<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $name = $_POST['name'];
    $date = $_POST['date'];
    $task = $_POST['task'];
    

    $sql = "insert into scalp_task(name, date,task) values(?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sss", $name, $date, $task);

    $statment->execute();

    header("Location:./Aluminum.php");
} else {
}
?>
?>