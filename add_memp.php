<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $add_name = $_SESSION["name"];
    $date = $_POST['date'];
    $dispatch = $_POST['dispatch'];
    $manufactured = $_POST['manufactured'];
    $good_covers = $_POST['good_covers'];
    $good_bases = $_POST['good_bases'];
    $good_shutters = $_POST['good_shutters'];
    $defect_covers = $_POST['defect_covers'];
    $defect_bases = $_POST['defect_bases'];
    $defect_shutters = $_POST['defect_shutters'];
    $tariff= 3702;
    $revenue = $tariff * $dispatch;

    $sql = "insert into memp(user,date, dispatch,manufactured,tariff,Revenue,good_covers,good_bases,good_shutters,defect_covers,defect_bases,defect_shutters) values(?,?,?,?,?,?,?,?,?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssssssssssss",$add_name, $date, $dispatch,$manufactured,$tariff, $revenue,$good_covers,$good_bases,$good_shutters,$defect_covers,$defect_bases,$defect_shutters);

    $statment->execute();

    header("Location:./memp.php");
} else {
}
?>
?>