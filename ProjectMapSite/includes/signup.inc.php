<?php

// Created by Leonardo

use Utility\User;

require __DIR__ . '/../templates/main.php';

if(isset($_POST['signup-submit'])) {

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordConfirm = $_POST['pwd-confirm'];

    /** @var User[] $usersAll */
    $usersAll = User::getAll();

    $usernames = array_unique(array_map(function ($user){return $user->getUsername();}, $usersAll));

    if (isset($_GET['uid'])){
        $users = User::searchByColumn('uid', $_GET['uid']);
    }

    if(empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        header("Location: ../templates/signup.php?error=Fields are empty");
        return;
    }

    // Using RegEx to check if the username starts with a B and continues with numbers up to 8
    // 9 in total and is case insensitive for the B
    if (!preg_match("/^B[0-9]{8}$/mi", $username))
    {
        header("Location: ../templates/signup.php?error=Invalid Student ID (e.g. B00123456)");
        return;
    }

    // Same as before but with the additional email after the student ID
    if (!preg_match("/^B[0-9]{8}@mytudublin.ie$/mi", $email))
    {
        header("Location: ../templates/signup.php?error=Invalid Email (e.g. B00123456@mytudublin.ie)");
        return;
    }

    if ($password !== $passwordConfirm){
        header("Location: ../templates/signup.php?error=Passwords dont match!");
        return;
    }

    if (in_array($username, $usernames)){
        header("Location: ../templates/signup.php?error=Name already exists!");
        return;
    }

    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);
    $user->setEmail($email);

    if (User::insert($user) === -1){
        header("Location: ../templates/signup?error=Something went wrong");
    }else{
        header("Location: /");
    }
}