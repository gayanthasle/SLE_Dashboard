<?php
include("./header.php");
?>
<div class="content">



    <div id="popup-form" class="popup_form" style="display: block;">
        <form action="./get_revenue.php" method="post">
            <h2>Generete Reveneve</h2>
            <select name="place">
                <option value="1">Meter Manufacturing</option>
                <option value="2">Aluminum Recycling</option>
                <option value="3">Deduruoya Plant</option>
                <option value="4">Kumbalgamuwa</option>
                <option value="5">Biomed</option>
                <option value="6">Sithawaka-I</option>
                <option value="7">Sithawaka-II</option>
            </select>
            <input type="date" name="date" required placeholder="Place" />
            <br />
            <input type="submit" />
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
    </script>

</div>
<?php
include("./footer.php");
?>