<?php
if (isset($_GET["id"])) {
    include 'config.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id ='$id'";
    $data = mysqli_query($connection,$sql);

    if ($data) {
        echo "Record deleted successfully";
        echo"$data";
    } else {
        echo "Error deleting record: " ;
    }
    header("Location:./employee.php");
    $connection->close();
} else {
    echo"";
}
