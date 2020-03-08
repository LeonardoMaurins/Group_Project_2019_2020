<?php

// Created by Leonardo

use Utility\User;

require __DIR__ . '/../templates/main.php';

if(isset($_POST['login-submit'])) {

    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    if(empty($username) || empty($password)) {
        header("Location: ../templates/login.php?error=Fields are empty&username=".$username."&password=".$password);
        return;
    }

    /** @var User $user */
    $user = User::getOneByUsernameAndPassword($username, $password);

    if (!$user){
        header("Location: ../templates/login.php?error=Invalid credentials");
        return;
    }

    session_start(); // Starts/Resumes current session
    $_SESSION['username'] = $user->getUsername(); // Creates a session for the current user

    header('Location: /ProjectMapSite/templates/mainframe.php');
}