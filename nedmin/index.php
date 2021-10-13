<?php
include "header.php";
include "sidebar.php";

if (!isset($_SESSION["UserName"])) {
    header('Location: login.php');
}

include "indexPageInner.php";
include "footer.php";
?>