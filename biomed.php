<?php
include("./header.php");

?>

<div class="content">
    <h1>BIOMED Hydro Power Plant</h1>
    <button class="btn" onclick="openImageForm()" style="margin-bottom: 10px;">Add Image</button>

    <div class="card">
        <div class="cot">
            <div class="img">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM plant_image WHERE plant = 'biomed' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_1'])) {
                    echo '<a href="uploads/biomed/' . htmlspecialchars($image_name['image_1']) . '" target="_blank">
                            <img src="uploads/biomed/' . htmlspecialchars($image_name['image_1']) . '" alt="">
                          </a>';
                }
                ?>
            </div>
            <?php if (!empty($image_name['image_1'])): ?>
                <div class="text">

                    <p style="padding-left: 80px; padding-top: 15px;"><?php echo htmlspecialchars($image_name['date']); ?></>
                </div>
            <?php endif; ?>
        </div>

        <div class="cot">
            <div class="img">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM plant_image WHERE plant = 'biomed' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_2'])) {
                    echo '<a href="uploads/biomed/' . htmlspecialchars($image_name['image_2']) . '" target="_blank">
                            <img src="uploads/biomed/' . htmlspecialchars($image_name['image_2']) . '" alt="">
                          </a>';
                }
                ?>
            </div>
            <?php if (!empty($image_name['image_2'])): ?>
                <div class="text">

                    <p style="padding-left: 80px; padding-top: 15px;"><?php echo htmlspecialchars($image_name['date']); ?></>
                </div>
            <?php endif; ?>
        </div>

        <div class="cot">
            <div class="img">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM plant_image WHERE plant = 'biomed' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_3'])) {
                    echo '<a href="uploads/biomed/' . htmlspecialchars($image_name['image_3']) . '" target="_blank">
                            <img src="uploads/biomed/' . htmlspecialchars($image_name['image_3']) . '" alt="">
                          </a>';
                }
                ?>
            </div>
            <?php if (!empty($image_name['image_3'])): ?>
                <div class="text">

                    <p style="padding-left: 80px; padding-top: 15px;"><?php echo htmlspecialchars($image_name['date']); ?></>
                </div>
            <?php endif; ?>
        </div>

        <div class="cot">
            <div class="img">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM plant_image WHERE plant = 'biomed' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_4'])) {
                    echo '<a href="uploads/biomed/' . htmlspecialchars($image_name['image_4']) . '" target="_blank">
                            <img src="uploads/biomed/' . htmlspecialchars($image_name['image_4']) . '" alt="">
                          </a>';
                }
                ?>
            </div>
            <?php if (!empty($image_name['image_4'])): ?>
                <div class="text">

                    <p style="padding-left: 80px; padding-top: 15px;"><?php echo htmlspecialchars($image_name['date']); ?></>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    $plant_name = 'biomed';
    include("./messageModal.php");
    ?>

    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>DATE</td>
                <td>UNIT</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM biomed
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td><td>" . $row['unit'] . " kWh</td><tr>";
                    }
                }

                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm()">Add-Data</button>
                    <button class="btn" onclick="openPopupForm2()">Generate-Data</button>
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        echo "<button class='btn' onclick='opendeleteForm()'>Delete</button>";
                    }
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="row">
        <div class="cell">
            <h2 style="margin-bottom: 30px;">Biomed Generation</h2>
            <div id="chart2" style="margin-bottom: 50px;"></div>
        </div>
    </div>

<?php
    include 'config.php';

    $sql = "SELECT date, unit
    FROM (
        SELECT id, date, unit
        FROM biomed
        ORDER BY date DESC
        LIMIT 10
    ) sub
    ORDER BY date ASC";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        $labels = [];
        $points = [];

        while ($row = $result->fetch_assoc()) {
            $labels[] = date('M d', strtotime($row['date'])); 
            $points[] = (int) $row['unit']; 
        }

        $chartData = [
            'labels' => $labels,
            'points' => $points
        ];
        echo "<script>const chartData = " . json_encode($chartData) . ";</script>";
    } 

    $connection->close();
?>

    <script>
        const {
            Chart
        } = SingleDivUI;

        const options = {
            data: {
                labels: chartData.labels, 
                series: {
                    points: chartData.points 
                }
            },
            height: 400,
            width: 1050
        };

        new Chart('#chart2', {
            type: 'bar',
            ...options
        });
    </script>

    <!-- <div id="curve_chart" class="curve_chart"></div> -->

    <div id="image-popup-form" class="popup_form">
        <form action="./add_plant_image.php" method="post" enctype="multipart/form-data">
            <h2>ADD IMAGE</h2>
            <input type="file" name="image1" required />
            <input type="file" name="image2" />
            <input type="file" name="image3" />
            <input type="file" name="image4" />
            <input type="hidden" name="plant" value="biomed" />
            <br />
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="submit" />
            <button type="button" onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <!-- item status Start -->
    <!-- card Start -->

    <div class="card">

        <!-- Turbine 1 -->
        <div class="form-container">
            <form id="turbine1Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='1' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Turbine 1</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Turbine 2 -->
        <div class="form-container">
            <form id="turbine2Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='2' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Turbine 2</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Generator 1 -->
        <div class="form-container">
            <form id="generator1Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='3' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Generator 1</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Generator 2 -->
        <div class="form-container">
            <form id="generator2Form">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='4' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Generator 2</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Hydraulic Unit -->
        <div class="form-container">
            <form id="hydraulicUnitForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='5' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Hydraulic Unit</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Lubrication System -->
        <div class="form-container">
            <form id="lubricationSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='6' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Lubrication System</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Dewatering System -->
        <div class="form-container">
            <form id="dewateringSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='8' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Dewatering System</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Medium Voltage Panel -->
        <div class="form-container">
            <form id="mediumVoltagePanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='9' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Medium Voltage Panel</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Low Voltage Panel -->
        <div class="form-container">
            <form id="lowVoltagePanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='10' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Low Voltage Panel</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Battery Pack -->
        <div class="form-container">
            <form id="batteryPackForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='11' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Battery Pack</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Control Panel -->
        <div class="form-container">
            <form id="controlPanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='12' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Control Panel</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Station Service Panel -->
        <div class="form-container">
            <form id="stationServicePanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='13' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Station Service Panel</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Motor Control Panel -->
        <div class="form-container">
            <form id="motorControlPanelForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='14' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Motor Control Panel</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Decentralized Control Common -->
        <div class="form-container">
            <form id="decentralizedControlCommonForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='15' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Decentralized Control Common</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Inlet Valve and Control System -->
        <div class="form-container">
            <form id="inletValveControlSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='16' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Inlet Valve and Control System</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Bypass Valve and Control System (Water Bypass) -->
        <div class="form-container">
            <form id="bypassValveControlSystemForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='17' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Bypass Valve and Control System (Water Bypass)</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Auxiliary Generator (Outside) -->
        <div class="form-container">
            <form id="auxiliaryGeneratorOutsideForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='18' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Auxiliary Generator (Outside)</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Transformer -->
        <div class="form-container">
            <form id="transformerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='19' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Transformer</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- CT PT Transformer -->
        <div class="form-container">
            <form id="ctPtTransformerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='20' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>CT PT Transformer</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Auto Re-closer -->
        <div class="form-container">
            <form id="autoRecloserForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='21' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Auto Re-closer</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Mechanical Bypass Unit (33,000) -->
        <div class="form-container">
            <form id="mechanicalBypassUnitForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='22' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Mechanical Bypass Unit (33,000)</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Overhead Crane -->
        <div class="form-container">
            <form id="overheadCraneForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_biomed WHERE id='23' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_biomed_status.php?id=$color[id]'>Overhead Crane</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

    </div>

    <!-- card end -->

    <!-- item status End -->

    <div id="popup-form" class="popup_form">
        <form action="./add_biomed.php" method="post">
            <h2>ADD DATA</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="text" name="unit" required placeholder="Unit-kWh" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form2" class="popup_form">
        <form action="./generate_biomed.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form3" class="popup_form">
        <form action="./shift_biomed.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="text" name="name" required placeholder="Name" />
            <br />
            <input type="number" name="number" required placeholder="Contact Number" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>
    <div id="popup-form4" class="popup_form">
        <form action="./delete_biomed.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    function openImageForm() {
        document.getElementById('image-popup-form').style.display = 'block';
    }

    function openPopupForm() {
        document.getElementById('popup-form').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function openPopupForm2() {
        document.getElementById('popup-form2').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function openPopupForm3() {
        document.getElementById('popup-form3').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function opendeleteForm() {
        document.getElementById('popup-form4').style.display = 'block';
        document.getElementById('curve_chart').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function closePopupForm() {
        document.getElementById('popup-form').style.display = 'none';
        document.getElementById('popup-form2').style.display = 'none';
        document.getElementById('popup-form3').style.display = 'none';
        document.getElementById('popup-form4').style.display = 'none';
        document.getElementById('curve_chart').style.display = 'block';
        document.getElementById('image-popup-form').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.remove('blurred');
        divToBlur.classList.remove('blurred');
        mydiv.classList.remove('blurred');
        table.classList.remove('blurred');
    }
</script>

<?php
include("./footer.php");
?>