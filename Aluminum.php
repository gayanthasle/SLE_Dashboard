<?php
include("./header.php");

?>

<div class="content">
    <h1>Aluminum Recycling</h1>
    <button class="btn" onclick="openImageForm()" style="margin-bottom: 10px;">Add Image</button>

    <div class="card">
        <div class="cot">
            <div class="img">
                <?php
                include 'config.php';

                $sql = "SELECT * FROM plant_image WHERE plant = 'scalp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_1'])) {
                    echo '<a href="uploads/scalp/' . htmlspecialchars($image_name['image_1']) . '" target="_blank">
                            <img src="uploads/scalp/' . htmlspecialchars($image_name['image_1']) . '" alt="">
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

                $sql = "SELECT * FROM plant_image WHERE plant = 'scalp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_2'])) {
                    echo '<a href="uploads/scalp/' . htmlspecialchars($image_name['image_2']) . '" target="_blank">
                            <img src="uploads/scalp/' . htmlspecialchars($image_name['image_2']) . '" alt="">
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

                $sql = "SELECT * FROM plant_image WHERE plant = 'scalp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_3'])) {
                    echo '<a href="uploads/scalp/' . htmlspecialchars($image_name['image_3']) . '" target="_blank">
                            <img src="uploads/scalp/' . htmlspecialchars($image_name['image_3']) . '" alt="">
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

                $sql = "SELECT * FROM plant_image WHERE plant = 'scalp' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $image_name = $result->fetch_assoc();

                if (!empty($image_name['image_4'])) {
                    echo '<a href="uploads/scalp/' . htmlspecialchars($image_name['image_4']) . '" target="_blank">
                            <img src="uploads/scalp/' . htmlspecialchars($image_name['image_4']) . '" alt="">
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
    $plant_name = 'scalp';
    include("./messageModal.php");
    ?>

    <!-- 2024_7_28 add Task -->
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Date</td>
                <td>Task</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM scalp_task
                        ORDER BY id DESC
                        LIMIT 5";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo
                        "<td>" . $row['name'] . "</td>
                        <td>" . $row['date'] . "</td>
                        <td>" . $row['task'] . "</td>                        
                        <tr>";
                    }
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm4()">Add-Data</button>
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        echo "<button class='btn' onclick='opendeleteForm5()'>Delete</button>";
                    }
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <!-- 2024_7_23 add attendance -->
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
                $query = "SELECT * FROM scalp_attendance
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td><td>" . $row['skilled_labour'] . "</td><td>" . $row['semi_skilled_labour'] . "</td><tr>";
                    }
                }
                // $connection->close();
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

    <!-- 2024_7_28 add Status -->
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Date</td>
                <td>Start</td>
                <td>End</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM scalp_status
                        ORDER BY id DESC
                        LIMIT 4";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo
                        "<td>" . $row['date'] . "</td>
                        <td>" . $row['start'] . "</td>
                        <td>" . $row['end'] . "</td>  
                        <td>" . $row['status'] . "</td>                         
                        <tr>";
                    }
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm6()">Add-Data</button>
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        echo "<button class='btn' onclick='opendeleteForm7()'>Delete</button>";
                    }
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

</div>


<!-- scalp_attendance start -->

<div id="image-popup-form" class="popup_form">
    <form action="./add_plant_image.php" method="post" enctype="multipart/form-data">
        <h2>ADD IMAGE</h2>
        <input type="file" name="image1" required />
        <input type="file" name="image2" />
        <input type="file" name="image3" />
        <input type="file" name="image4" />
        <input type="hidden" name="plant" value="scalp" />
        <br />
        <input type="date" name="date" required placeholder="date" />
        <br />
        <input type="submit" />
        <button type="button" onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>

<div id="popup-form" class="popup_form">
    <form action="./add_scalp_attendance.php" method="post">
        <h2>ADD DATA</h2>
        <input type="date" name="date" required placeholder="Date" />
        <br />
        <input type="number" name="skilled_labour" required placeholder="Skilled Labour" />
        <br />
        <input type="number" name="semi_skilled_labour" required placeholder="Semi Skilled Labour" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>

<div id="popup-form-2" class="popup_form">
    <form action="./generate_scalp_attendance.php" method="post">
        <h2>ADD DATA</h2>
        <input type="date" name="date" required placeholder="date" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>

<div id="popup-form-3" class="popup_form">
    <form action="./delete_scalp_attendance.php" method="post">
        <h2>DELETE DATA</h2>
        <input type="date" name="date" required placeholder="Date" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>
<!-- scalp_attendance end -->

<div id="popup-form-4" class="popup_form">
    <form action="./add_scalp_task.php" method="post">
        <h2>ADD DATA</h2>
        <input type="date" name="date" required placeholder="Date" />
        <br />
        <input type="text" name="name" required placeholder="Name" />
        <br />
        <input type="text" name="task" required placeholder="Task" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>

<div id="popup-form-5" class="popup_form">
    <form action="./delete_scalp_task.php" method="post">
        <h2>DELETE DATA</h2>
        <input type="date" name="date" required placeholder="Date" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>


<!-- scalp_status -->

<div id="popup-form-6" class="popup_form">
    <form action="./add_scalp_status.php" method="post">
        <h2>ADD DATA</h2>
        <input type="date" name="date" required placeholder="Date" />
        <br />
        <input type="time" name="start" required placeholder="Start" />
        <br />
        <input type="time" name="end" required placeholder="End" />
        <br />
        <input type="text" name="status" required placeholder="Status" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>

<div id="popup-form-7" class="popup_form">
    <form action="./delete_scalp_status.php" method="post">
        <h2>DELETE DATA</h2>
        <input type="date" name="date" required placeholder="Date" />
        <br />
        <input type="time" name="start" required placeholder="Start" />
        <br />
        <input type="submit" />
        <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
    </form>
</div>

<?php
include("./footer.php");
?>


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
        document.getElementById('popup-form-2').style.display = 'block';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function openPopupForm4() {
        document.getElementById('popup-form-4').style.display = 'block';
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
        document.getElementById('popup-form-3').style.display = 'block';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }
    // for task table delete button
    function opendeleteForm5() {
        document.getElementById('popup-form-5').style.display = 'block';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    // add data into status table 
    function openPopupForm6() {
        document.getElementById('popup-form-6').style.display = 'block';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.add('blurred');
        divToBlur.classList.add('blurred');
        mydiv.classList.add('blurred');
        table.classList.add('blurred');
    }

    function opendeleteForm7() {
        document.getElementById('popup-form-7').style.display = 'block';
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
        document.getElementById('popup-form-2').style.display = 'none';
        document.getElementById('popup-form-3').style.display = 'none';
        document.getElementById('popup-form-4').style.display = 'none';
        document.getElementById('popup-form-5').style.display = 'none';
        document.getElementById('popup-form-6').style.display = 'none';
        document.getElementById('popup-form-7').style.display = 'none';
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