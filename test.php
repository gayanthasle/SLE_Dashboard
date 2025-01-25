<?php
include("./header.php");
include 'config.php';


?>

<div class="content">
  <table id="deduruoya_table" class="plant_table">
    <thead>
      <tr>
        <td>Date</td>
        <td>deduruoya_revenue</td>
        <td>kumbalgamuwa_revenue</td>
        <td>biomed_revenue</td>
        <td>memp_revenue</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        require_once 'config.php';
        $d = "2024-02-21";

        $sql_deduruoya = "SELECT Revenue FROM deduruoya WHERE date = '" . $d . "'";
        $sql_kumbalgamuwa = "SELECT Revenue FROM kumbalgamuwa WHERE date = '" . $d . "'";
        $sql_biomed = "SELECT Revenue FROM biomed WHERE date = '" . $d . "'";
        $sql_memp = "SELECT Revenue FROM memp WHERE date = '" . $d . "'";

        $result_deduruoya = mysqli_query($connection, $sql_deduruoya);
        $result_kumbalgamuwa = mysqli_query($connection, $sql_kumbalgamuwa);
        $result_biomed = mysqli_query($connection, $sql_biomed);
        $result_memp = mysqli_query($connection, $sql_memp);

        $row1 = $result_deduruoya->fetch_assoc() ;
        $row2 = $result_kumbalgamuwa->fetch_assoc() ;
        $row3 = $result_biomed->fetch_assoc() ;
        $row4 = $result_memp->fetch_assoc() ;

        echo "<td>" . $d . "</td><td>" . $row1['Revenue'] . "</td><td>" . $row2['Revenue'] . "</td><td>" . $row3['Revenue'] . "</td><td>" . $row4['Revenue'] . "</td><tr>";
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