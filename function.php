<?php

function invalidEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function pwdMathch($pwd, $Repet_Password)
{
    if ($pwd !== $Repet_Password) {
        echo " Passwords do not match ";
        return true;
    } else {
        //echo " Passwords match ";
        return false;
    }
}

function Exists($connection, $name)
{

    $checkuser = "SELECT * FROM users WHERE name = ?";

    // Use prepared statement
    $statement = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($statement, $checkuser)) {
        mysqli_stmt_bind_param($statement, "s", $name);
        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);

        // Get the number of rows
        $count = mysqli_num_rows($result);

        // Echo or log the count
        //echo $count;

        if ($count > 0) {
            echo "Username already exists!";
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            mysqli_stmt_close($statement);
            return false;
        }
    } else {
        // Handle statement preparation error
        echo "Error preparing statement.";
        return false;
    }
}

function createUser($connection, $name, $email, $pwd,$role)
{
    $sql = "INSERT INTO users (name, email,password,role) VALUES (?, ?, ?, ?)";
    $statement = $connection->prepare($sql);

    // Hash the password before storing it in the database
    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    $statement->bind_param("ssss", $name, $email, $hashed_password,$role);

    $statement->execute();

    header("Location:./employee.php");
    //echo "Done";
    $statement->close();
    $connection->close();
}


function loginUser($connection, $name, $pwd)
{
    $unameEx = Exists($connection, $name);
    if ($unameEx === false) {
        header('location:./sign_up.html');
        exit();
    }
    $pwdHashed = $unameEx['password'];
    $checkpwd = password_verify($pwd, $pwdHashed);

    if ($checkpwd === false) {
        header('location:./sign_up.html?error=wrongpwd');
        exit();
    } elseif ($checkpwd === true) {
        session_start();
        $_SESSION['name'] = $unameEx['name'];
        $_SESSION['role'] = $unameEx['role'];
        header('Location:./dashboard.php');
        exit();
    }
}
