<!-- Created by Leonardo -->
<?php

require __DIR__ . '/main.php';

use Utility\Staff;

session_start();

/** @var Staff[] $allStaff */
$allStaff = Staff::getAll();
$departments = array_unique(array_map(function ($department){return $department->getDepartment();}, $allStaff));

if (isset($_GET['department'])){
    $staffs = Staff::searchByColumn('department', $_GET['department']);
}else{
    $staffs = $allStaff;
}

// Removed question marks inbetween names
header("Content-type: text/html; charset=iso-8859-1");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name =viewport content="width=device-width, initial-scale=1">
    <title>Staff Directory</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

        <!-- Navbar brand -->
        <a class="navbar-brand" style="font-variant:small-caps;font-weight:bold;font-size:36px">Staff Directory |</a>

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

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Departments</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="staffdirectory.php">All</a>
                        <?php
                        foreach ($departments as $department) {
                            echo '<a class="dropdown-item" href="?department=' . $department . '">' . $department . '</a>';
                        }
                        ?>
                    </div>
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

    <table id="myTable" class="table table-striped table-hover table-bordered" style="width:75%">

        <!-- Search form -->
        <form class="form-inline">
            <input class="form-control" style="width:75%" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search for staff..." aria-label="Search">
            <br>
        </form>

        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Department</th>
            <th scope="col">Email</th>
            <th scope="col" style="white-space:nowrap">Phone Number</th>
            <th scope="col">Room</th>
        </tr>
        </thead>

        <tbody>

        <?php

        if (isset($_SESSION['username'])){

        foreach ($staffs as $staff) {
            ?>
            <tr>
                <td><?php echo $staff->getName(); ?></td>
                <td><?php echo $staff->getPosition(); ?></td>
                <td><?php echo $staff->getDepartment(); ?></td>
                <td><?php echo $staff->getEmail(); ?></td>
                <td><?php echo $staff->getPhoneNum(); ?></td>
                <td><?php echo $staff->getRoom(); ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
<?php
}
?>
</div>

</body>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>