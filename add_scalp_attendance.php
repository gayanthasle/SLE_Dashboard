<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $skilled_labour = $_POST['skilled_labour'];
    $semi_skilled_labour = $_POST['semi_skilled_labour'];
    
    $sql = "insert into scalp_attendance(date, skilled_labour,semi_skilled_labour) values(?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sss", $date,  $skilled_labour, $semi_skilled_labour);

    $statment->execute();

    header("Location:./Aluminum.php");
} else {
}
?>
?>