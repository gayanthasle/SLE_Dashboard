<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $revenue = $_POST['revenue'];
    $cost = $_POST['cost'];


    $sql = "insert into solar_revanue(revenue,cost) values(?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ss", $revenue, $cost);

    $statment->execute();

    header("Location:./solar.php");
} else {
}
?>
?>