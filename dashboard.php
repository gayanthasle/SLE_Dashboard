<?php
include("./header.php");
include 'config.php';
$currentDate = new DateTime();  // Get the current date and time
$currentDate->modify('-1 day'); // Subtract one day
$d = $currentDate->format('Y-m-d');


$sql_deduruoya = "SELECT Revenue,unit FROM deduruoya WHERE date = '" . $d . "'";
$sql_kumbalgamuwa = "SELECT Revenue,unit FROM kumbalgamuwa WHERE date = '" . $d . "'";
$sql_biomed = "SELECT Revenue,unit FROM biomed WHERE date = '" . $d . "'";
$sql_memp = "SELECT Revenue,dispatch FROM memp WHERE date = '" . $d . "'";

$result_deduruoya = mysqli_query($connection, $sql_deduruoya);
$result_kumbalgamuwa = mysqli_query($connection, $sql_kumbalgamuwa);
$result_biomed = mysqli_query($connection, $sql_biomed);
$result_memp = mysqli_query($connection, $sql_memp);

$row1 = $result_deduruoya->fetch_assoc();
$row2 = $result_kumbalgamuwa->fetch_assoc();
$row3 = $result_biomed->fetch_assoc();
$row4 = $result_memp->fetch_assoc();

$data = array();
$data2 = array();

// Add the header to the array
$data[] = ['place', 'Generate value'];
$data2[] = ['place', 'Generate production'];

// Fetch and add each row to the array
$data[] = ['deduruoya', (int) ($row1['Revenue'] ?? 0)];
$data[] = ['kubalgama', (int) ($row2['Revenue'] ?? 0)];
$data[] = ['biomed', (int) ($row3['Revenue'] ?? 0)];
$data[] = ['memp', (int) ($row4['Revenue'] ?? 0)];

// Fetch and add each row to the array
$data2[] = ['deduruoya', (int) ($row1['unit'] ?? 0)];
$data2[] = ['kubalgama', (int) ($row2['unit'] ?? 0)];
$data2[] = ['biomed', (int) ($row3['unit'] ?? 0)];

// Convert the PHP array to a JSON string
$json_data = json_encode($data);
$json_data2 = json_encode($data2);



$connection->close();
?>

<div class="content">
  <h1>Dashboard</h1>

<!-- card start -->

  <div class="card">
  <?php

        ?>
    <div class="cot">
      <div class="img">
        <a href="./memp.php"><img src="./img/MEMP.png" alt=""></a>
        
      </div>
      <div class="text">
        <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='1' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Meter Manufacturing</a>"
        ?>
        
      </div>
    </div>

    <div class="cot">
      <div class="img">
      <a href="./deduruoya.php"><img  src="./img/DeduruOya.jpg" alt=""></a>
      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='2' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Deduruoya</a>"
        ?>
      </div>
    </div>

    <div class="cot">
      <div class="img">
      <a href="./kumbalagama.php"><img   src="./img/Kubalgama.png" alt=""></a>
      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='3' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Kumbalgamuwa</a>"
        ?>
      </div>
    </div>

    <div class="cot">
      <div class="img">
      <a href="./Aluminum.php"><img   src="./img/Galigamuwa.png" alt=""></a>

      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='4' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Aluminum Recycling</a>"
        ?>
      </div>
    </div>

    <div class="cot">
      <div class="img">
        <a href="./biomed.php"><img   src="./img/Biomed_6.jpeg" alt=""></a>
      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='5' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Biomed plant</a>"
        ?>
      </div>
    </div>

    <div class="cot">
      <div class="img">
      <a href="./algoda.php"><img   src="./img/sithawakai.png" alt=""></a>
      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='6' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Algoda plant</a>"
        ?>
      </div>
    </div>

    <div class="cot">
      <div class="img">
      <a href="./dikella.php"><img   src="./img/sithawakaii.png" alt=""></a>
      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='7' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Dik Ella Plant</a>"
        ?>
      </div>
    </div>

    <div class="cot">
      <div class="img">
      <a href="./solar.php"><img   src="./img/Solar.png" alt=""></a>
      </div>
      <div class="text">
                <?php
          include 'config.php';
          $sql = "SELECT * FROM status WHERE id='8' ";
          $result = mysqli_query($connection, $sql);
          $color = $result->fetch_assoc();
          $connection->close();
        echo "<a href='update_status.php?id=$color[id]'><i style= 'color:".$color['color'].";' class='fa-solid fa-circle'></i>Solar Department</a>"
        ?>
      </div>
    </div>

  </div>

<!-- card End -->
  


  <div class="pie-header" style="flex-direction: column;">
    <p>DAILY PRODUCTION</p>
  </div>

  <div class="pie-div">


    <div id="donutchart"></div>

    <div class="pie_table">
      <table style="height: 100%; width: 100%; ">
        <tbody>
          <tr>
            <td><i style="color: black ; margin-right: 5px;" class="fa-solid fa-circle"></i>Date</td>
            <?php echo "<td style='font-weight: bold; '>" . $d . "</td>"; ?>
          </tr>
          <tr>
            <td><i style="color: #3366CC ; margin-right: 5px;" class="fa-solid fa-circle"></i>Deduruoya</td>
            <?php echo "<td style='font-weight: bold; '>" . ($row1['unit'] ?? '0') . "kWh</td>"; ?>
          </tr>
          <tr>
            <td><i style="color: #DC3912 ; margin-right: 5px; " class="fa-solid fa-circle"></i>Kubalgama</td>
            <?php echo "<td style='font-weight: bold; '>" . ($row2['unit'] ?? '0') . "kWh</td>"; ?>
          </tr>
          <tr>
            <td><i style="color: #FF9900 ; margin-right: 5px; " class="fa-solid fa-circle"></i>Biomed</td>
            <?php echo "<td style='font-weight: bold; '>" . ($row3['unit'] ?? '0') . "kWh</td>"; ?>
          </tr>
        </tbody>
      </table>


    </div>
  </div>


  <div class="pie-header" style="margin-top:50px;">
    <p>DAILY REVENUE</p>
  </div>
  <div class="pie-div">

    <div id="piechart"></div>

    <div class="pie_table">

      <table style="height: 100%; width: 100%; ">
      <tbody>
          <tr>
            <td><i style="color: black ; margin-right: 5px;" class="fa-solid fa-circle"></i>Date</td>
            <?php echo "<td style='font-weight: bold; '>" . $d . "</td>"; ?>
          </tr>
          <tr>
            <td><i style="color: #3366CC ; margin-right: 5px;" class="fa-solid fa-circle"></i>Deduruoya</td>
            <?php
            echo "<td style='font-weight: bold;'>Rs " . number_format(($row1['Revenue'] ?? 0), 2) . "</td>";
            ?>
          </tr>
          <tr>
            <td><i style="color: #DC3912; margin-right: 5px;" class="fa-solid fa-circle"></i>Kubalgama</td>
            <?php echo "<td style='font-weight: bold;'>Rs " . number_format(($row2['Revenue'] ?? 0), 2) . "</td>"; ?>
          </tr>
          <tr>
            <td><i style="color: #FF9900; margin-right: 5px;" class="fa-solid fa-circle"></i>Biomed</td>
            <?php echo "<td style='font-weight: bold;'>Rs " . number_format(($row3['Revenue'] ?? 0), 2) . "</td>"; ?>
          </tr>
          <tr>
            <td><i style="color: #109618; margin-right: 5px;" class="fa-solid fa-circle"></i>MEMP</td>
            <?php echo "<td style='font-weight: bold;'>Rs " . number_format(($row4['Revenue'] ?? 0), 2) . "</td>"; ?>
          </tr>
        </tbody>
      </table>

    </div>


  </div>
</div>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var d2 = <?php echo $json_data2; ?>

    var data = google.visualization.arrayToDataTable(d2);

    var options = {
      is3D: true,
      legend: 'none',
      backgroundColor: { fill: "transparent" },
      chartArea: { left: 0, top: 0, width: '100%', height: '100%' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  google.charts.load('current', { 'packages': ['corechart'] });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var d1 = <?php echo $json_data; ?>

    var data = google.visualization.arrayToDataTable(d1);

    var options = {
      is3D: true,
      title: 'REVENUE',
      legend: 'none',
      backgroundColor: { fill: "transparent" },
      chartArea: { left: 0, top: 0, width: '100%', height: '100%' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>
<!-- Card script Start -->

<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const textBox = this.querySelector('input[type="text"]');
            const selectedColor = prompt('Choose a color (e.g., red, blue, green):');
            textBox.style.backgroundColor = selectedColor;
            // Store selected color in local storage
            localStorage.setItem(textBox.id, selectedColor);
        });

        // Retrieve and apply stored color on page load
        const textBox = form.querySelector('input[type="text"]');
        const storedColor = localStorage.getItem(textBox.id);
        if (storedColor) {
            textBox.style.backgroundColor = storedColor;
        }
    });
</script>

<!-- Card script End -->

<?php
include("./footer.php");
?>