<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $date = $_POST['date'];
    $start = $_POST['start'];

    $sql = "DELETE FROM scalp_status WHERE date ='$date' || start = '$start'";

    $data = mysqli_query($connection,$sql);

    if ($data) {
        echo "Record deleted successfully";
        echo"$data";
    } else {
        echo "Error deleting record: " ;
    }
    header("Location:./Aluminum.php");
    $connection->close();

} else {
}
?>

