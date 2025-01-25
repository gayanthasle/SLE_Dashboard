<?php
include("./header.php");
include 'config.php';

if (count($_POST) > 0) {
    mysqli_query($connection, "UPDATE users set name='" . $_POST['first_name'] . "' ,email='" . $_POST['last_name'] . "',role='" . $_POST['role'] . "' WHERE id='" . $_POST['userid'] . "'");
    header("Location:./employee.php");
}

$result = mysqli_query($connection, "SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
<div class="content">
    <div style="display:block" class="popup_form">
        <form method="post" action="">
            <input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
            <br>
            <input type="text" name="first_name" class="txtField" value="<?php echo $row['name']; ?>">
            <br>
            <input type="text" name="last_name" class="txtField" value="<?php echo $row['email']; ?>">
            <br>
            <input type="text" name="role" class="txtField" value="<?php echo $row['role']; ?>">
            <br>
            <input type="submit" name="submit" value="Submit" class="buttom">
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>
</div>

<?php
include("./footer.php");
?>