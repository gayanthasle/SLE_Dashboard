<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $visited = $_POST['visited'];
    $completed = $_POST['completed'];
    $inform_to_cus = $_POST['inform_to_cus'];


    $sql = "insert into solar_estimates(date, visited,completed,inform_to_cus) values(?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssss",$date, $visited, $completed,$inform_to_cus);

    $statment->execute();

    header("Location:./solar.php");
} else {
}
?>
?>