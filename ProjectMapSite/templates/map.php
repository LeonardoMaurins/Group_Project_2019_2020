<!-- Created by Leonardo -->
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
        <a class="navbar-brand" style="font-variant:small-caps;font-weight:bold;font-size:36px">Campus Map |</a>

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

<div class='table-responsive' align="center">

    <img src="../images/CampusMap.png"  class="text-center" alt="logo">

</div>

</body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>
    </html>