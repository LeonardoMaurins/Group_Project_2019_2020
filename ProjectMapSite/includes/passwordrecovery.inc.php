<?php

// Not currently used but created by Leonardo

use Utility\User;

require __DIR__ . '/../templates/main.php';

if(isset($_POST['recovery-submit'])) {

    $email = $_POST['mail'];

    /** @var User[] $usersAll */
    $usersAll = User::getAll();

    $usernames = array_unique(array_map(function ($mail){return $mail->getEmail();}, $usersAll));

    if (isset($_GET['mail'])){
        $users = User::searchByColumn('mail', $_GET['mail']);
    }

    if(empty($email)) {
        header("Location: ../templates/passwordrecovery.php?error=Fields are empty");
        return;
    }

    // Same as before but with the additional email after the student ID
    if (!preg_match("/^B[0-9]{8}@mytudublin.ie$/mi", $email))
    {
        header("Location: ../templates/passwordrecovery.php?error=Invalid Email (e.g. B00123456@mytudublin.ie)");
        return;
    }

    if (in_array($email, $usernames)){
        $to = "B00107064@mytudublin.ie";
        $subject = "HTML email";

        $message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Leonardo</th>
<th>Maurins</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <CrazyLeo57@gmail.com>' . "\r\n";
        $headers .= 'Cc: CrazyLeo57@gmail.com' . "\r\n";

        mail($to,$subject,$message,$headers);
        return;
    }

    if (User::insert($mail) === -1){
        header("Location: ../templates/passwordrecovery?error=Something went wrong");
    }else{
        header("Location: /");
    }
}
