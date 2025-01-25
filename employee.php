<?php
include("./header.php");
?>

<div class="content">
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>ROLE</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM users";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['role'] . "</td>

                        <td>
                            <a href='#' onclick='confirmDelete(" . $row['id'] . ")'><i class='fa-solid fa-trash-can'></i> delete</a>
                            <a href='update.php?id=$row[id]'><i class='fa-regular fa-pen-to-square'></i> update</a>
                        </td>

                        </tr>";
                    }
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm()">Add-Data</button></td>
            </tr>
        </tfoot>
    </table>

    <div id="popup-form" class="popup_form">
        <form action="./sign_up.php" method="post">
            <h2>ADD DATA</h2>
            <input type="text" name="name" placeholder="Enter your name" required />
            <input type="text" name="email" placeholder="Enter your email" required />
            <input type="password" name="pwd" placeholder="Create password" required />
            <input type="password" name="Repet_Password" placeholder="Confirm password" required />
            <input type="hidden" name="role" value="guest" />
            <input type="Submit" name="submit" value="Register Now" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <script>
        function openPopupForm() {
            document.getElementById('popup-form').style.display = 'block';
            var divToBlur = document.getElementById('blurredDiv');
            var mydiv = document.getElementById('myDiv');
            var table = document.getElementById('deduruoya_table');
            divToBlur.classList.add('blurred');
            mydiv.classList.add('blurred');
            table.classList.add('blurred');
        }
        function closePopupForm() {
            document.getElementById('popup-form').style.display = 'none';
            var divToBlur = document.getElementById('blurredDiv');
            var mydiv = document.getElementById('myDiv');
            var table = document.getElementById('deduruoya_table');
            divToBlur.classList.remove('blurred');
            mydiv.classList.remove('blurred');
            table.classList.remove('blurred');
        }
        function confirmDelete(id) {
            var result = confirm("Are you sure you want to delete this item?");

            if (result) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>



    <?php
    include("./footer.php");
    ?>