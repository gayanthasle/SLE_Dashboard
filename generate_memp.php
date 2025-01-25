<?php
include("./header.php");
include 'config.php';

$date = $_POST['date'];

 ?>

<div class="content">
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
            <td>DATE</td>
            <td>DISPATCH</td>
            <td>MANUFACTURED</td>
            <td>Good Covers</td>
            <td>Good Bases</td>
            <td>Good Shutters</td>
            <td>Defect Covers</td>
            <td>Defect Bases</td>
            <td>Defect Shutters</td> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM memp WHERE date = '$date'";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td>
                        <td>" . $row['dispatch'] ."</td>
                        <td>". $row['manufactured']. " </td>
                        <td>" . $row['good_covers'] . "</td>
                        <td>" . $row['good_bases'] . "</td>
                        <td>" . $row['good_shutters'] . "</td>
                        <td>" . $row['defect_covers'] . "</td>
                        <td>" . $row['defect_bases'] . "</td>
                        <td>" . $row['defect_shutters'] . "</td>
                        <tr>";
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