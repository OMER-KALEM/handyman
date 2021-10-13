<?php
include "DbConnect.php";

if (isset($_POST['saveSettings'])) {

    $id = 0; //Tek bir elemanım olacak zaten

    $updatedRows = $conn->query("UPDATE ayarlar SET 
        TITLE='" . $_POST['title'] . "',
        DESCRIPTION='" . $_POST['description'] . "',
        KEYWORDS='" . $_POST['keywords'] . "',
        PHONE='" . $_POST['phone'] . "',
        FACEBOOK='" . $_POST['facebook'] . "',
        TWITTER='" . $_POST['twitter'] . "',
        FOOTER='" . $_POST['footer'] . "',
        ADDRESS='" . $_POST['address'] . "',
        MAIL='" . $_POST['mail'] . "',
        FAX='" . $_POST['fax'] . "'

        where ID= '$id'
    ");

    if ($conn->affected_rows > 0) {
        header("Location: ../ayarlar.php?status=ok");
    } else {
        header("Location: ../ayarlar.php?status=notok");
    }
}

if (isset($_POST['login'])) {

    $userName = $_POST['UserName'];
    $password = md5($_POST['Password']);

    if ($userName && $password) {
        $effectedRows = $conn->query("SELECT * FROM ADMIN WHERE USER_NAME='$userName' AND PASSWORD='$password'");
    }

    if ($conn->affected_rows > 0) {
        session_start();
        $_SESSION["UserName"] = $userName;
        header("Location: ../index.php");
    } else {
        header("Location: ../login.php?login=no");
    }
}

if (isset($_POST['addMenu'])) {

    $AddMenu = $conn->query("INSERT INTO DASH_MENU_ITEM (SCREEN_NAME,URL) 
        VALUES('" . $_POST['screenName'] . "','" . $_POST['url'] . "') ");

    if ($conn->affected_rows > 0) {
        header("Location: ../addMenu.php?status=ok");
    } else {
        header("Location: ../addMenu.php?status=notok");
    }
}

if (isset($_POST['editMenu'])) {

    $menuId = $_POST['menuId'];
    $updatedRows = $conn->query("UPDATE DASH_MENU_ITEM SET 
        SCREEN_NAME='" . $_POST['screenName'] . "',
        URL='" . $_POST['url'] . "'

        where ID= '$menuId'
    ");

    if ($conn->affected_rows > 0) {
        header("Location: ../editMenu.php?status=ok&menuId=$menuId");
    } else {
        header("Location: ../editMenu.php?status=notok&menuId=$menuId");
    }
}

if (isset($_GET['deleteMenu'])) {

    $deletedRow = $conn->query("DELETE FROM DASH_MENU_ITEM WHERE ID='" . $_GET['menuId'] . "'");

    if ($conn->affected_rows > 0) {
        header("Location: ../menus.php?status=ok");
    } else {
        header("Location: ../menus.php?status=notok");
    }
}
?>