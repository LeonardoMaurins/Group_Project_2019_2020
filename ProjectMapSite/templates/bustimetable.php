<!-- Table input created by Gavin, Display by Leonardo -->
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
    <title>Bus Timetable</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

<style>
table, th, td {
  border: 1px solid black;
}

div.title {
  font-size: 25px;
}

</style>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

        <!-- Navbar brand -->
        <a class="navbar-brand" style="font-variant:small-caps;font-weight:bold;font-size:36px">Shuttle Bus Timetable |</a>

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

    <h3>From Coolmine</h3>
    <table id="myTable" class="table table-striped table-hover table-bordered" style="width:75%">
        <tbody>
            <tr>
                <td>Coolmine Train Station</td>
                <td>07:50</td>
                <td>08:25</td>
                <td>09:00</td>
                <td>09:35</td>
                <td>10:10</td>
                <td>11:30</td>
                <td>12:30</td>
                <td>13:30</td>
                <td>14:30</td>
                <td>15:30</td>
                <td>16:30</td>
                <td>17:10</td>
                <td>17:45</td>
            </tr>

            <tr>
                <td>Blanchardstown Centre</td>
                <td>08:00</td>
                <td>08:35</td>
                <td>09:10</td>
                <td>09:45</td>
                <td>10:20</td>
                <td>11:40</td>
                <td>12:40</td>
                <td>13:40</td>
                <td>14:40</td>
                <td>15:40</td>
                <td>NA</td>
                <td>NA</td>
                <td>NA</td>
            </tr>

            <tr>
                <td>Ebay</td>
                <td>08:03</td>
                <td>08:38</td>
                <td>09:13</td>
                <td>09:48</td>
                <td>10:23</td>
                <td>11:43</td>
                <td>12:43</td>
                <td>13:43</td>
                <td>14:43</td>
                <td>15:43</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
            </tr>

            <tr>
                <td>National Aquatic Centre</td>
                <td>08:06</td>
                <td>08:41</td>
                <td>09:16</td>
                <td>09:51</td>
                <td>10:26</td>
                <td>11:46</td>
                <td>12:46</td>
                <td>13:46</td>
                <td>14:36</td>
                <td>15:36</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
            </tr>

            <tr>
                <td>TUDublin</td>
                <td>08:11</td>
                <td>08:46</td>
                <td>09:21</td>
                <td>09:56</td>
                <td>10:31</td>
                <td>11:51</td>
                <td>12:51</td>
                <td>13:51</td>
                <td>14:51</td>
                <td>15:51</td>
                <td>16:35</td>
                <td>17:15</td>
                <td>17:50</td>
            </tr>
        </tbody>
</table>

    <h3>From TUDublin</h3>
    <table id="myTable" class="table table-striped table-hover table-bordered" style="width:75%">
        <tbody>
            <tr>
                <td>TUDublin</td>
                <td>08:10</td>
                <td>08:45</td>
                <td>09:20</td>
                <td>09:55</td>
                <td>11:10</td>
                <td>12:10</td>
                <td>13:10</td>
                <td>14:10</td>
                <td>15:10</td>
                <td>16:10</td>
                <td>16:50</td>
                <td>17:25</td>
                <td>18:10</td>
            </tr>

            <tr>
                <td>National Aquatic Centre</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>11:15</td>
                <td>12:15</td>
                <td>13:15</td>
                <td>14:15</td>
                <td>15:15</td>
                <td>16:15</td>
                <td>16:55</td>
                <td>17:30</td>
                <td>18:15</td>
            </tr>

            <tr>
                <td>Ebay</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>11:18</td>
                <td>12:18</td>
                <td>13:18</td>
                <td>14:18</td>
                <td>15:18</td>
                <td>16:18</td>
                <td>16:58</td>
                <td>17:33</td>
                <td>18:18</td>
            </tr>

            <tr>
                <td>Blanchardstown Centre</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>N/A</td>
                <td>11:22</td>
                <td>12:22</td>
                <td>13:22</td>
                <td>14:22</td>
                <td>15:22</td>
                <td>16:22</td>
                <td>17:01</td>
                <td>17:36</td>
                <td>18:21</td>
            </tr>

            <tr>
                <td>Coolmine Train station</td>
                <td>08:18</td>
                <td>08:53</td>
                <td>09:28</td>
                <td>10:03</td>
                <td>11:30</td>
                <td>12:30</td>
                <td>13:30</td>
                <td>14:30</td>
                <td>15:30</td>
                <td>16:28</td>
                <td>17:08</td>
                <td>17:43</td>
                <td>18:28</td>
            </tr>
        </tbody>
</table>

</body>
</html>