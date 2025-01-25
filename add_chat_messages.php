<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $username = $_SESSION["name"];
    $message = $_POST['message'];
    $plant_name = $_POST['plant_name'];
    $created_at = date('Y-m-d H:i:s');

    $sql = "insert into chat_messages(username, message, plant_name, created_at) values(?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssss",$username, $message, $plant_name, $created_at);

    $statment->execute();

    // Redirect back to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();

} else {
    
}
