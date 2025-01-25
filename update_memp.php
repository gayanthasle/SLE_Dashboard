<?php
session_start();

if (isset($_SESSION["name"])) {
    include 'config.php';

    $add_name = $_SESSION["name"];
    $id = $_POST['id']; // Get the ID of the record to update
    $ceb = $_POST['ceb'];
    $leco = $_POST['leco'];
    $ceb_covers = $_POST['ceb_covers'];
    $leco_covers = $_POST['leco_covers'];
    $base = $_POST['base'];
    $shutters = $_POST['shutters'];
    $pc_kg = $_POST['pc_kg'];
    $mb_kg = $_POST['mb_kg'];
    $cover_beading = $_POST['cover_beading'];
    $shutter_beading = $_POST['shutter_beading'];
    $springs = $_POST['springs'];
    $corrugated = $_POST['corrugated'];

    // Prepare the SQL query to update the record
    $sql = "UPDATE memp_production SET ceb=?, leco=?, ceb_covers=?, leco_covers=?, base=?, shutters=?, pc_kg=?, mb_kg=?, cover_beading=?, shutter_beading=?, springs=?, corrugated_boxes=? WHERE id=?";
    
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssssssssssi", $ceb, $leco, $ceb_covers, $leco_covers, $base, $shutters, $pc_kg, $mb_kg, $cover_beading, $shutter_beading, $springs, $corrugated, $id);
    $statement->execute();

    header("Location: ./memp.php");
} else {
    // Handle the case where the user is not logged in
}
?>
