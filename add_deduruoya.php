<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $add_name = $_SESSION["name"];
    $date = $_POST['date'];
    $unit = $_POST['unit'];
    $tariff= 18.16;
    $revenue = $tariff * $unit;

    $sql = "insert into deduruoya(user,date, unit,tariff,Revenue) values(?,?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sssss",$add_name, $date, $unit,$tariff, $revenue);

    $statment->execute();

    header("Location:./deduruoya.php");
} else {
}
?>
?>