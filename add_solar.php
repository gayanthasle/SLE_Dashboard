<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $on_hand = $_POST['on_hand'];
    $new_additions = $_POST['new_additions'];


    $sql = "insert into solar_application(date, on_hand,new_additions) values(?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sss",$date, $on_hand, $new_additions);

    $statment->execute();

    header("Location:./solar.php");
} else {
}
?>
?>