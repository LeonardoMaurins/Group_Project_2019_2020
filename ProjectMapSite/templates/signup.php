<!-- Created by Leonardo -->
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name =viewport content="width=device-width, initial-scale=1">
    <title>Signup</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <?php
    require __DIR__ . '/main.php';
    ?>
</head>

<body>

<main>
    <div class="text-center">
		<img src="../images/TUDublinLogo.png" width="350" height="250" class="text-center" alt="logo">
        <form class="form-group" action="../includes/signup.inc.php" method="post">
            <div class="col"></div>
            <h1>Signup</h1>
            <input type="text" class="col.col-sm-" name="uid" placeholder="Student ID">
            <div class="col"></div><br>
            <input type="text" class="col.col-sm-" name="mail" placeholder="E-Mail" >
            <div class="col"></div><br>
            <input type="password" class="col.col-sm-" name="pwd" placeholder="Password">
            <div class="col"></div><br>
            <input type="password" class="col.col-sm-" name="pwd-confirm" placeholder="Confirm Password">
            <br><br>
            <button type="submit" class="btn btn-dark" name="signup-submit">Signup</button>
            <br><br>
            <a href="../public/index.php">Return to Homepage!</a>
            <br><br>
            <?php
            if (isset($_GET['error'])){
                ?>
                <div style="color:red" class="error"><?php echo $_GET['error']; ?></div>
                <?php
            }
            ?>
        </form>
    </div>
</main>

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