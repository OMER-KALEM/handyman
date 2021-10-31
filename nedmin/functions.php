<?php

ob_start();
session_start();

function LogInControl()
{
    include 'netting/DbConnect.php';
    $userName = $_SESSION["UserName"];
    $conn->query("SELECT * FROM ADMIN WHERE USER_NAME='$userName'");

    if ($conn->affected_rows == 0) {
        header("Location: login.php?");
    }
}

function AuthorizationControlForAdmin()
{
    include 'netting/DbConnect.php';
    $userName = $_SESSION["UserName"];
    $conn->query("SELECT * FROM ADMIN WHERE USER_NAME='$userName' AND AUTHORIZATION ='1'");

    if ($conn->affected_rows == 0) {
        header("Location: index.php?");
    }
}

?>