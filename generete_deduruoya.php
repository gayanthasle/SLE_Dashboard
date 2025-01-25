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
                <td>Unit</td>

            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM deduruoya WHERE date = '$date'";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td><td>" . $row['unit'] . ".kWh</td><tr>";
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