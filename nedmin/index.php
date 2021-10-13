<?php
include "header.php";
include "sidebar.php";

if (!isset($_SESSION["UserName"])) {
    header('Location: login.php');
}

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Tamirci admin panele hosgeldin</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>
        </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>