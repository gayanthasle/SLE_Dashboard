<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $add_name = $_POST["name"];
    $number = $_POST['number'];
 
    $sql = "insert into shift_biomed(date, name,number) values(?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sss", $date, $add_name, $number);


    $statment->execute();

    header("Location:./biomed.php");
} else {
}
?>
