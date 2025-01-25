<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];


    require_once 'config.php';
    require_once 'function.php';

    loginUser($connection ,$name, $pwd);
    
    
} else {
    header('location:./sign_up.html');
}
