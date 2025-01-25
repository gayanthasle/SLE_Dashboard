<?php
include("./header.php");
include 'config.php';

$place = $_POST['place'];
$date = $_POST['date'];
echo''.$date.'';

if ($place == '1') {
    $place = 'memp';
    $place_name = "memp";
} 
elseif ($place == '2') {
    $place = 'aluminum';
    $place_name = "Aluminum";
} 

elseif ($place == '3') {
    $place = 'deduruoya';
    $place_name = "deduruoya";
} 
elseif ($place == '4') {
    $place = 'kumbalgamuwa';
    $place_name = "Kumbalgamuwa";
} 
elseif ($place == '5') {
    $place = 'biomed';
    $place_name = "Biomed";
} 
elseif ($place == '6') {
    $place = 'sithawaka_i';
    $place_name = "Algoda";
} 
elseif ($place == '7') {
    $place = 'sithawaka_ii';
    $place_name = "Dikella";
} 
?>


<div class="content">
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>PLACE</td>
                <td>date</td>
                <td>Revenve</td>

            </tr>
        </thead>
        <tbody>
            <tr>
                
                <?php
                echo "<td>$place_name</td>";
                require_once 'config.php';
                $query = "SELECT * FROM $place WHERE date = '$date'";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $tariff = $row['unit'] * $row['tariff'];
                        echo "<td>" . $row['date'] . "</td><td>Rs." . $tariff . ".00</td><tr>";
                    }
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <?php
    include("./footer.php");
    ?>