<?php
include("./header.php");
include 'config.php';

$date = $_POST['date'];

 ?>

<div class="content">
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
            <td>Date</td>
            <td>Skilled Labour</td>
            <td>Semi Skilled Labour</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM scalp_attendance WHERE date = '$date'";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td><td>" . $row['skilled_labour'] . "</td><td>" . $row['semi_skilled_labour'] . "</td><tr>";
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