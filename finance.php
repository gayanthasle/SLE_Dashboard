<?php
include("./header.php");

?>
<div class="content">
    <h1>Finance Division</h1>
    <table id="deduruoya_table" class="plant_table">
        <thead>
            <tr>
                <td>DATE</td>
                <td>To Be Received</td>
                <td>Collection</td>
                <td>Payment</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once 'config.php';
                $query = "SELECT * FROM finance_status
                        ORDER BY id DESC
                        LIMIT 1";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['date'] . "</td>
                        <td>" . $row['to_be_received'] . "</td>
                        <td>" . $row['collection'] . "</td>
                        <td>" . $row['payment'] ."</td>
                        <tr>";
                    }
                }
                
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td><button class="btn" onclick="openPopupForm()">Add-Data</button>
                    <?php
                     if ($_SESSION['role'] == 'admin') {
                    echo "<button class='btn' onclick='opendeleteForm()'>Delete</button>";
                     }                    
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <div id="popup-form" class="popup_form">
        <form action="./add_finance.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date"/>
            <br />
            <input type="number" name="to_be_received" required placeholder="To Be Received"/>
            <br />
            <input type="number" name="collection" required placeholder="Collection"/>
            <br />
            <input type="number" name="payment" required placeholder="payment"/>
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

    <div id="popup-form-del" class="popup_form">
        <form action="./delete_finance.php" method="post">
            <h2>Date</h2>
            <input type="date" name="date" required placeholder="Date" />
            <br />
            <input type="submit" />
            <button onclick="closePopupForm()"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        </form>
    </div>

<?php
include("./footer.php");
?>
<script>
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
function closePopupForm() {
        document.getElementById('popup-form').style.display = 'none';
        document.getElementById('popup-form-del').style.display = 'none';
        document.getElementById('popup-form-3').style.display = 'none';
        document.getElementById('popup-form4').style.display = 'none';
        document.getElementById('popup-form-revenue').style.display = 'none';
        document.getElementById('popup-form-del-revenue').style.display = 'none';
        var divToBlur = document.getElementById('blurredDiv');
        var mydiv = document.getElementById('myDiv');
        var table = document.getElementById('deduruoya_table');
        var table2 = document.getElementById('deduruoya_table2');
        table2.classList.remove('blurred');
        divToBlur.classList.remove('blurred');
        mydiv.classList.remove('blurred');
        table.classList.remove('blurred');
    }

    function opendeleteForm() {
        document.getElementById('popup-form-del').style.display = 'block';
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
</script>
