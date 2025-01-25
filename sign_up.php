<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $role = $_POST['role'];
    $Repet_Password = $_POST['Repet_Password'];

    require_once 'config.php';
    require_once 'function.php';

    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMathch($pwd, $Repet_Password);

    if ($invalidEmail == !false) {
        header('Location:./employee.php?error=invalid-email');
        exit();
    }
    if ($pwdMatch == !false) {
        header('Location:./employee.php?error=password-not-match');
        exit();
    }
    else{
        createUser($connection, $name, $email, $pwd, $role);
    }
    
    
} else {
    header("Location:./employee.php");
}
