<!-- Not used yet but created by Danni -->
<?php

require __DIR__ . '/main.php';

use Utility\User;

session_start();

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name =viewport content="width=device-width, initial-scale=1">
    <title>Campus Map</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">


    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

        <!-- Navbar brand -->
        <a class="navbar-brand" style="font-variant:small-caps;font-weight:bold;font-size:36px">Student Services |</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Links -->
            <ul class="navbar-nav mr-auto" style="font-size:20px;">
                <li class="nav-item active">
                    <a class="nav-link" href="mainframe.php">Home<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <?php
            if(isset($_SESSION['username'])) {
                ?>
                <p style="font-weight:bold;font-size:20px;font-style:italic">
                    Student Number:
                    <?php
                    echo $_SESSION['username'];
                    ?>
                </p>
                <?php
            }
            else {
                ?>
                <p style="font-weight:bold;font-size:20px;font-style:italic">
                    <a href="/">Not logged in, return to Homepage!</a>
                </p>
                <?php
            }
            ?>
            <form class="form-group" style="padding-left:15px" action="../includes/logout.inc.php" method="post">
                <button type="submit" class="btn btn-dark" name="logout-submit">Logout</button>
            </form>
        </div>
    </nav>
</head>
	<body>

    <div class="row">
        <div class="col">
            <h2>Student Services</h2>
            <div class="row">
                <div class="column">
                    <h3>Academic</h3><br>
                    <p>Find out all information relating to your student academic life such as exam results, library
                        information, and FAQs on how to them</p>
                    <button class="btn"><a href="underConstruction.html">Find Out More</button>
            </div>
        </div>

        <div class="col">
            <a href="studentServices.php"><img src = "../images/service_icon.png" alt="Services" id="menuIcon"><h3>Student Services</h3></a>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <a href="studentServices.php"><img src = "../images/time_icon.png" alt="Timetable" id="menuIcon"><h3>Timetable</h3></a>
        </div>
        <div class="col">
            <a href="bustimetable.php"><img src = "../images/bus_icon.png" alt="Bus" id="menuIcon"><h3>Shuttle Bus</h3></a>
        </div>
    </div>

		<div data-role="page" id="login">
			<div data-role="header" id="header">
				<a href="../../../../Users/Crazy/Downloads/Code_So_Far/Code/index.html"><img id="logo" src="images/logo.png">
			</div><!-- /header -->

			<div role="main" class="ui-content">    
				<center><h2>Student Services</h2></center>
				<div class="row">
					<div class="column">
						<h3>Academic</h3><br>
						<p>Find out all information relating to your student academic life such as exam results, library
						information, and FAQs on how to them</p>
						<button class="btn"><a href="underConstruction.html">Find Out More</button>
					</div>
					
					<div class = "column">
						<h3>Non-Academic</h3><br>
						<p>Enjoy student life with our sections on Student Union, Clubs, Availing of Student Counselling, and how to navigate the fun campus life!</p>
						<button class="btn"><a href="underConstruction.html">Find Out More</button>
					</div>
				
			</div><!-- /content -->

		</div><!-- /page one -->

	</body>
</html>