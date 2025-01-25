<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $sql = "insert into users(name, email,password) values(?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sss", $name, $email, $password);

    $statment->execute();

    header("Location:./employee.php");
} else {
}
?>
?>