<?php
include "DbConnect.php";

if (isset($_POST['saveSettings'])) {
    $id = 0; //Tek bir elemanım olacak zaten
    $updatedRows = $conn->query("UPDATE SETTINGS SET 
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
        header("Location: ../settings.php?status=ok");
    } else {
        header("Location: ../settings.php?status=notok");
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

if (isset($_POST['addSlider'])) {
    $uploads_dir = "../uploads/sliders";
    @$tmp_name = $_FILES["sliderImgFile"]["tmp_name"];
    @$name = $_FILES["sliderImgFile"]["name"];
    $uniqueNumber1 = rand(20000, 32000);
    $uniqueNumber2 = rand(20000, 32000);
    $uniqueNumber3 = rand(20000, 32000);
    $uniqueNumber4 = rand(20000, 32000);
    $uniqueName = $uniqueNumber1 . $uniqueNumber2 . $uniqueNumber3 . $uniqueNumber4;
    $refImgUrl = substr($uploads_dir, 3) . "/" . $uniqueName . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$uniqueName$name");
    $addSlider = $conn->query("INSERT INTO SLIDER (IMG_URL,URL,LIST_ORDER,IMG_NAME) 
        VALUES('" . $refImgUrl . "','" . $_POST['sliderUrl'] . "','" . $_POST['sliderOrder'] . "','" . $_POST['imgName'] . "') ");

    if ($conn->affected_rows > 0) {
        header("Location: ../addSlider.php?status=ok");
    } else {
        header("Location: ../addSlider.php?status=notok");
    }
}

if (isset($_POST['editSlider'])) {
    $sliderId = $_POST['sliderId'];
    $updatedRows = $conn->query("UPDATE SLIDER SET 
        IMG_NAME='" . $_POST['imgName'] . "',
        IMG_URL='" . $_POST['imgUrl'] . "',
        URL='" . $_POST['url'] . "',
        LIST_ORDER='" . $_POST['listOrder'] . "'

        where ID= '$sliderId'
    ");

    if ($conn->affected_rows > 0) {
        header("Location: ../editSlider.php?status=ok&sliderId=$sliderId");
    } else {
        header("Location: ../editSlider.php?status=notok&sliderId=$sliderId");
    }
}

if (isset($_GET['deleteSlider'])) {
    $deletedRow = $conn->query("DELETE FROM SLIDER WHERE ID='" . $_GET['sliderId'] . "'");

    if ($conn->affected_rows > 0) {
        $deleteImgUrl = $_GET['deleteImgUrl'];
        unlink("../$deleteImgUrl");
        header("Location: ../slider.php?status=ok");
    } else {
        header("Location: ../slider.php?status=notok");
    }
}

if (isset($_POST['addPage'])) {
    $mainscreenchxbox = $_POST['IsMainScreen'];
    $AddPage = $conn->query("INSERT INTO DASH_PAGE_ITEM (PAGE_NAME,CONTENT,LIST_ORDER,IS_MAIN_SCREEN) 
        VALUES('" . $_POST['screenName'] . "','" . $_POST['content'] . "','" . $_POST['listOrder'] . "',b'" . $_POST['IsMainScreen'] . "') ");

    if ($conn->affected_rows > 0) {
        header("Location: ../pages.php?status=ok&mainscrn=$mainscreenchxbox");
    } else {
        header("Location: ../pages.php?status=notok&mainscrn=$mainscreenchxbox");
    }
}

if (isset($_GET['deletePage'])) {
    $deletedRow = $conn->query("DELETE FROM DASH_PAGE_ITEM WHERE ID='" . $_GET['pageId'] . "'");

    if ($conn->affected_rows > 0) {
        header("Location: ../pages.php?status=ok");
    } else {
        header("Location: ../pages.php?status=notok");
    }
}

if (isset($_POST['editPage'])) {
    $pageId = $_POST['pageId'];
    $updatedRows = $conn->query("UPDATE DASH_PAGE_ITEM SET 
        PAGE_NAME='" . $_POST['pageName'] . "',
        CONTENT='" . $_POST['content'] . "',
        LIST_ORDER='" . $_POST['listOrder'] . "',
        IS_MAIN_SCREEN=b'" . $_POST['IsMainScreen'] . "'

        where ID= '$pageId'
    ");

    if ($conn->affected_rows > 0) {
        header("Location: ../editPage.php?status=ok&menuId=$pageId");
    } else {
        header("Location: ../editPage.php?status=notok&menuId=$pageId");
    }
}


if (isset($_GET['deleteNew'])) {
    $deletedRow = $conn->query("DELETE FROM DASH_NEW_ITEM WHERE ID='" . $_GET['newId'] . "'");

    if ($conn->affected_rows > 0) {
        header("Location: ../news.php?status=ok");
    } else {
        header("Location: ../news.php?status=notok");
    }
}


if (isset($_POST['addNew'])) {
    $uploads_dir = "../uploads/news";
    @$tmp_name = $_FILES["newImgFile"]["tmp_name"];
    @$name = $_FILES["newImgFile"]["name"];
    $uniqueNumber1 = rand(20000, 32000);
    $uniqueNumber2 = rand(20000, 32000);
    $uniqueNumber3 = rand(20000, 32000);
    $uniqueNumber4 = rand(20000, 32000);
    $uniqueName = $uniqueNumber1 . $uniqueNumber2 . $uniqueNumber3 . $uniqueNumber4;
    $refImgUrl = substr($uploads_dir, 3) . "/" . $uniqueName . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$uniqueName$name");
    $addNew = $conn->query("INSERT INTO DASH_NEW_ITEM (NEW_NAME,NEW_CONTENT,IMG_URL) 
        VALUES('" . $_POST['newName'] . "','" . $_POST['content'] . "','" . $refImgUrl . "') ");

    if ($conn->affected_rows > 0) {
        header("Location: ../addNew.php?status=ok");
    } else {
        header("Location: ../addNew.php?status=notok");
    }
}

if (isset($_POST['editNew'])) {
    $newId = $_POST['newId'];
    $updatedRows = $conn->query("UPDATE DASH_NEW_ITEM SET 
        NEW_NAME='" . $_POST['newName'] . "',
        NEW_CONTENT='" . $_POST['content'] . "'
        where ID= '$newId'
    ");

    if ($conn->affected_rows > 0) {
        header("Location: ../editNew.php?status=ok&newId=$newId");
    } else {
        header("Location: ../editNew.php?status=notok&newId=$newId");
    }
}

?>