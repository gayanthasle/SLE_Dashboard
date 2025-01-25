<?php
include("./header.php");
include 'config.php';
if (count($_POST) > 0) {
    mysqli_query($connection, "UPDATE status_memp set color='" . $_POST['new_color'] .  "' WHERE id='" . $_POST['userid'] . "'");
    header("Location:./memp.php");
}
$result = mysqli_query($connection, "SELECT * FROM status_memp  WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
<div class="content">
    <div style="display:block" class="popup_form">
        <form method="post" action="">
            <input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
            <br>
            <input type="text" name="new_color" class="txtField" value="<?php echo $row['color']; ?>">
            <input type="submit" name="submit" value="Submit" class="buttom">
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>
</div>
<?php
include("./footer.php");
?>