<?php
include("./header.php");
?>

<div class="content">
    <h1>Meter Enclosure Manufacturing</h1>
    <button class="btn" onclick="openImageForm()" style="margin-bottom: 10px;">Add Image</button>

    <div class="card">
        <div class="cot">
            <div class="img">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM plant_image WHERE plant = 'memp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_1'])) {
                    echo '<a href="uploads/memp/' . htmlspecialchars($image_name['image_1']) . '" target="_blank">
                            <img src="uploads/memp/' . htmlspecialchars($image_name['image_1']) . '" alt="">
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

                $sql = "SELECT * FROM plant_image WHERE plant = 'memp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_2'])) {
                    echo '<a href="uploads/memp/' . htmlspecialchars($image_name['image_2']) . '" target="_blank">
                            <img src="uploads/memp/' . htmlspecialchars($image_name['image_2']) . '" alt="">
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

                $sql = "SELECT * FROM plant_image WHERE plant = 'memp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_3'])) {
                    echo '<a href="uploads/memp/' . htmlspecialchars($image_name['image_3']) . '" target="_blank">
                            <img src="uploads/memp/' . htmlspecialchars($image_name['image_3']) . '" alt="">
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

                $sql = "SELECT * FROM plant_image WHERE plant = 'memp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_4'])) {
                    echo '<a href="uploads/memp/' . htmlspecialchars($image_name['image_4']) . '" target="_blank">
                            <img src="uploads/memp/' . htmlspecialchars($image_name['image_4']) . '" alt="">
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
    $plant_name = 'memp';
    include("./messageModal.php");
    ?>

    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Date</td>
                <td>Dispatched</td>
                <td>Manufactured</td>
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
                $query = "SELECT * FROM memp
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td>
                        <td>" . $row['dispatch'] . "</td>
                        <td>" . $row['manufactured'] . " </td>
                        <td>" . $row['good_covers'] . "</td>
                        <td>" . $row['good_bases'] . "</td>
                        <td>" . $row['good_shutters'] . "</td>
                        <td>" . $row['defect_covers'] . "</td>
                        <td>" . $row['defect_bases'] . "</td>
                        <td>" . $row['defect_shutters'] . "</td>
                        <tr>";
                    }
                }
                // $connection->close();
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <button style="margin-bottom: 20px;" class="btn" onclick="openPopupForm()">Add-Data</button>
                    <button style="margin-bottom: 20px;" class="btn" onclick="openPopupForm2()">Generate-Data</button>
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        echo "<button class='btn' onclick='opendeleteForm()'>Delete</button>";
                    }
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>CEB</td>
                <td>LECO</td>
                <td>CEB Covers</td>
                <td>LECO Covers</td>
                <td>Base</td>
                <td>Shutters</td>
                <td>PC /kg</td>
                <td>MB /kg</td>
                <td>Cover Beading</td>
                <td>Shutter Beading</td>
                <td>Springs</td>
                <td>Corrugated Boxes</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM memp_production ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc(); // Fetch only one row since it's limited to 1
                    echo "<td>" . $row['ceb'] . "</td>
            <td>" . $row['leco'] . "</td>
            <td>" . $row['ceb_covers'] . " </td>
            <td>" . $row['leco_covers'] . "</td>
            <td>" . $row['base'] . "</td>
            <td>" . $row['shutters'] . "</td>
            <td>" . $row['pc_kg'] . "</td>
            <td>" . $row['mb_kg'] . "</td>
            <td>" . $row['cover_beading'] . "</td>
            <td>" . $row['shutter_beading'] . "</td>
            <td>" . $row['springs'] . "</td>
            <td>" . $row['corrugated_boxes'] . "</td>";
                }
                ?>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="12">
                    <!-- Add the button inside the tfoot -->
                    <?php
                    // Only display the button if there is data
                    if ($result->num_rows > 0) {
                        // Pass the row data to the button using json_encode and htmlspecialchars
                        echo '<button class="btn" onclick="openPopupForm5(' . htmlspecialchars(json_encode($row)) . ')">Update-Data</button>';
                    }
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="row">
        <div class="cell">
            <h2 style="margin-bottom: 30px;">Meter Enclosure Dispatch</h2>
            <div id="chart2" style="margin-bottom: 50px;"></div>
        </div>
    </div>

    <?php
    include 'config.php';

    $sql = "SELECT date, dispatch
    FROM (
        SELECT id, date, dispatch
        FROM memp
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
            $points[] = (int) $row['dispatch']; 
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

    <!-- item status Start -->
    <!-- card Start -->

    <div class="card">

        <!-- IMM I -->
        <div class="form-container">
            <form id="hopperForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='14' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>IMM I<br></a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- IMM II -->
        <div class="form-container">
            <form id="hopperForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='15' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>IMM II<br></a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- IMM III -->
        <div class="form-container">
            <form id="hopperForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='16' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>IMM III<br></a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

    </div>
    <div class="card">        
        <!-- Hopper I-->
        <div class="form-container">
            <form id="hopperForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='1' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Hopper I</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Hopper II-->
        <div class="form-container">
            <form id="hopperForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='17' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Hopper II</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Hopper III-->
        <div class="form-container">
            <form id="hopperForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='18' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Hopper III</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

    </div>
    <div class="card">        

        <!-- Auto Loader I -->
        <div class="form-container">
            <form id="autoLoaderForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='2' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Auto Loader I</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Auto Loader II-->
        <div class="form-container">
            <form id="autoLoaderForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='19' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Auto Loader II</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Auto Loader III-->
        <div class="form-container">
            <form id="autoLoaderForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='20' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Auto Loader III</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

    </div>
    <div class="card"> 

        <!-- Chiller I-->
        <div class="form-container">
            <form id="chillerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='3' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Chiller I<br></a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Chiller II-->
        <div class="form-container">
            <form id="chillerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='21' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Chiller II</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Chiller III-->
        <div class="form-container">
            <form id="chillerForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='22' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Chiller III</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>
    </div>

    <div class="card"> 

        <!-- Colour Doser -->
        <div class="form-container">
            <form id="crusherForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='27' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Colour Doser<br></a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>
    </div>

    <div class="card"> 

        <!-- Compressor I-->
        <div class="form-container">
            <form id="compressorForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='4' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Compressor I</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Compressor II-->
        <div class="form-container">
            <form id="compressorForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='23' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Compressor II</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Compressor III-->
        <div class="form-container">
            <form id="compressorForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='24' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Compressor III</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

    </div>
    <div class="card"> 
        <!-- Crusher -->
        <div class="form-container">
            <form id="crusherForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='5' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Crusher</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Gantry Crane -->
        <div class="form-container">
            <form id="crusherForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='25' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Gantry Crane</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>

        <!-- Diesel Generator -->
        <div class="form-container">
            <form id="crusherForm">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM status_memp WHERE id='26' ";
                $result = mysqli_query($connection, $sql);
                $color = $result->fetch_assoc();
                echo "<a href='update_memp_status.php?id=$color[id]'>Diesel Generator</a>";
                echo "<input style='background-color :" . $color['color'] . ";' type='text'>";
                ?>
            </form>
        </div>
    </div>

    <!-- card end -->

    <!-- item status End -->

    <div id="popup-form" class="popup_form">
        <form action="./add_memp.php" method="post">
            <h2>ADD DATA</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="text" name="dispatch" required placeholder="Dispatch Unit" />
            <br />
            <input type="text" name="manufactured" required placeholder="Manufactured Unit" />
            <br />
            <input type="text" name="good_covers" required placeholder="Good Covers" />
            <br />
            <input type="text" name="good_bases" required placeholder="Good Bases" />
            <br />
            <input type="text" name="good_shutters" required placeholder="Good Shutters" />
            <br />
            <input type="text" name="defect_covers" required placeholder="Defect Covers" />
            <br />
            <input type="text" name="defect_bases" required placeholder="Defect Bases" />
            <br />
            <input type="text" name="defect_shutters" required placeholder="Defect Shutters" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>


    <div id="popup-form2" class="popup_form">
        <form action="./generate_memp.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form3" class="popup_form">
        <form action="./shift_memp.php" method="post">
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
        <form action="./delete_memp.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form5" class="popup_form">
        <form action="./update_memp.php" method="post">
            <div style="margin: 15px;">
                <label for="ceb" style="display: block; margin-bottom: 5px; font-weight: bold;">CEB</label>
                <input type="text" name="ceb" id="ceb" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label for="leco" style="display: block; margin-bottom: 5px; font-weight: bold;">LECO</label>
                <input type="text" name="leco" id="leco" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>

            <div style="margin-bottom: 15px;">
                <label for="ceb_covers" style="display: block; margin-bottom: 5px; font-weight: bold;">CEB Covers</label>
                <input type="text" name="ceb_covers" id="ceb_covers" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label for="leco_covers" style="display: block; margin-bottom: 5px; font-weight: bold;">LECO Covers</label>
                <input type="text" name="leco_covers" id="leco_covers" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>

            <div style="margin-bottom: 15px;">
                <label for="base" style="display: block; margin-bottom: 5px; font-weight: bold;">Base</label>
                <input type="text" name="base" id="base" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label for="shutters" style="display: block; margin-bottom: 5px; font-weight: bold;">Shutters</label>
                <input type="text" name="shutters" id="shutters" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>

            <div style="margin-bottom: 15px;">
                <label for="pc_kg" style="display: block; margin-bottom: 5px; font-weight: bold;">PC/kg</label>
                <input type="text" name="pc_kg" id="pc_kg" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label for="mb_kg" style="display: block; margin-bottom: 5px; font-weight: bold;">MB/kg</label>
                <input type="text" name="mb_kg" id="mb_kg" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>

            <div style="margin-bottom: 15px;">
                <label for="cover_beading" style="display: block; margin-bottom: 5px; font-weight: bold;">Cover Beading</label>
                <input type="text" name="cover_beading" id="cover_beading" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label for="shutter_beading" style="display: block; margin-bottom: 5px; font-weight: bold;">Shutter Beading</label>
                <input type="text" name="shutter_beading" id="shutter_beading" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>

            <div style="margin-bottom: 15px;">
                <label for="springs" style="display: block; margin-bottom: 5px; font-weight: bold;">Springs</label>
                <input type="text" name="springs" id="springs" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>
            <div style="margin-bottom: 15px;">
                <label for="corrugated" style="display: block; margin-bottom: 5px; font-weight: bold;">Corrugated</label>
                <input type="text" name="corrugated" id="corrugated" required style="width: 200px; display: block; margin-bottom: 10px;" />
            </div>

            <!-- Hidden field for the ID of the row being updated -->
            <input type="hidden" name="id" id="update_id" />

            <input type="submit" value="Update" />
            <button type="button" onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>


    <style>
        /* Set uniform width for all inputs */
        #popup-form5 input[type="text"] {
            width: 200px;
            /* Adjust the width as needed */
            margin-bottom: 10px;
            /* Optional: for spacing */
        }

        /* Ensure the form inputs are aligned consistently */
        #popup-form5 div {
            display: inline-block;
            margin-right: 10px;
        }
    </style>



    <div id="image-popup-form" class="popup_form">
        <form action="./add_plant_image.php" method="post" enctype="multipart/form-data">
            <h2>ADD IMAGE</h2>
            <input type="file" name="image1" required />
            <input type="file" name="image2" />
            <input type="file" name="image3" />
            <input type="file" name="image4" />
            <input type="hidden" name="plant" value="memp" />
            <br />
            <input type="date" name="date" required placeholder="date" />
            <br />
            <input type="submit" />
            <button type="button" onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    <?php
    include 'config.php';

    $sql = "SELECT date, dispatch
    FROM (
        SELECT id, date, dispatch
        FROM memp
        ORDER BY id DESC
        LIMIT 10
    ) sub
    ORDER BY id ASC";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $data = array();

        // Add the header to the array
        $data[] = ['date', 'dispatch'];

        while ($row = $result->fetch_assoc()) {
            // Fetch and add each row to the array
            $data[] = [date('m-d', strtotime($row['date'])), (int) $row['dispatch']];
        }

        // Convert the PHP array to a JSON string
        $json_data = json_encode($data);
    } else {
        echo "No data found!";
    }

    $connection->close();
    ?>
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Parse the JSON data generated from PHP
        var jsonData = <?php echo $json_data; ?>;

        var data = google.visualization.arrayToDataTable(jsonData);

        var options = {
            title: "Meter Manufacturing Generation",
            curveType: "function",
            legend: {
                position: "none"
            },
            backgroundColor: {
                fill: "transparent"
            },
            chartArea: {
                left: 70,
                top: 50,
                width: '100%',
                height: '75%'
            },
            vAxes: {
                0: {
                    title: 'dispatch'
                }
            }
        };

        var chart = new google.visualization.LineChart(
            document.getElementById("curve_chart")
        );

        chart.draw(data, options);
    }
</script>

<script>
    function openImageForm() {
        document.getElementById('image-popup-form').style.display = 'block';
    }

    function openPopupForm() {
        document.getElementById('popup-form').style.display = 'block';
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
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function openPopupForm5(rowData) {

        if (rowData) {
            document.getElementById('ceb').value = rowData.ceb;
            document.getElementById('leco').value = rowData.leco;
            document.getElementById('ceb_covers').value = rowData.ceb_covers;
            document.getElementById('leco_covers').value = rowData.leco_covers;
            document.getElementById('base').value = rowData.base;
            document.getElementById('shutters').value = rowData.shutters;
            document.getElementById('pc_kg').value = rowData.pc_kg;
            document.getElementById('mb_kg').value = rowData.mb_kg;
            document.getElementById('cover_beading').value = rowData.cover_beading;
            document.getElementById('shutter_beading').value = rowData.shutter_beading;
            document.getElementById('springs').value = rowData.springs;
            document.getElementById('corrugated').value = rowData.corrugated_boxes;
            document.getElementById('update_id').value = rowData.id;
        } else {
            alert('No data found!');
        }

        document.getElementById('popup-form5').style.display = 'block';

    }

    function opendeleteForm() {
        document.getElementById('popup-form4').style.display = 'block';
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
        document.getElementById('popup-form5').style.display = 'none';
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