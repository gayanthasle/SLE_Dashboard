<?php
session_start();
if (isset($_SESSION["name"])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/template.css" />
    <link rel="stylesheet" href="./css/dashboard.css" />
    <link rel="stylesheet" href="./css/plant.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://unpkg.com/singledivui/dist/singledivui.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/singledivui/dist/singledivui.min.js"></script>
    <script src="https://kit.fontawesome.com/f65110973c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var links = document.querySelectorAll('.menu ul li a');
        links.forEach(function(link) {
          var href = link.getAttribute('href');
          var linkPage = href.split("/").pop();
          if (linkPage === page) {
            link.parentNode.classList.add('active');
          }
        });
      });
  </script>
  </head>

  <body>
    <header class="header" id="blurredDiv">
      <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
          <i class="fa fa-bars"></i>
        </label>
        <a href="./logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        <a href="#news">
          <?php
          echo "<i class='fa-solid fa-circle-user'></i>" . $_SESSION["name"] . "";
          ?>
        </a>
      </nav>

    </header>

    <div class="main">
      <!--Start Menu Bar Section -->
      <div class="menu" id="myDiv">
        <ul>
          <li id="logo">
            <a href="#"><i class="fa-solid fa-seedling"></i>Sri Lanka
              Energies</a>
          </li>
          <hr />
          <li>
            <a href="./dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
          </li>
          <li>
            <a href="./memp.php"><i class="fa fa-wrench" aria-hidden="true"></i>Meter Manufacturing</a>
          </li>
          <li>
            <a href="./Aluminum.php"><i class="fa fa-retweet" aria-hidden="true"></i>Aluminum
              Recycling</a>
          </li>
          <li>
            <a href="./deduruoya.php"><i class="fa fa-university" aria-hidden="true"></i>Deduruoya
              Plant</a>
          </li>
          <li>
            <a href="./kumbalagama.php"><i class="fa fa-university" aria-hidden="true"></i>Kumbalgamuwa
              Plant</a>
          </li>
          <li>
            <a href="./biomed.php"><i class="fa fa-university" aria-hidden="true"></i>Biomed Plant</a>
          </li>
          <li>
            <a href="./dikella.php"><i class="fa fa-university" aria-hidden="true"></i>Dik Ella Plant</a>
          </li>
          <li>
            <a href="./algoda.php"><i class="fa fa-university" aria-hidden="true"></i>Algoda Plant</a>
          </li>
          <li>
            <a href="./solar.php"><i class="fa fa-university" aria-hidden="true"></i>Solar Department</a>
          </li>
          <li>
            <a href="./finance.php"><i class="fa fa-university" aria-hidden="true"></i>Finance Division</a>
          </li>
<!-- user previlage- only addmin can see start-->
          <?php
          if ($_SESSION['role'] == 'admin') {
            echo '<li><a href="./generaterevenue.php"><i class="fa fa-spinner" ></i>Generaterevenue</a></li>';
            echo '<li><a href="./employee.php"><i class="fa-solid fa-user-tie"></i>Empolyee</a></li>';
          }
          ?>
          
<!-- user previlage- only addmin can see end-->

        </ul>
      </div>
      <!--End Menu Bar Section -->
      <?php
} else {
  header("Location:./index.html");
}
?>