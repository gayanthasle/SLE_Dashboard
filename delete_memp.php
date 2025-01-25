<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];

    $sql = "DELETE FROM memp WHERE date ='$date'";

    $data = mysqli_query($connection,$sql);

    if ($data) {
        echo "Record deleted successfully";
        echo"$data";
    } else {
        echo "Error deleting record: " ;
    }
    header("Location:./memp.php");
    $connection->close();

} else {
}
?>
?>
