<?php include "header.php";
include "sidebar.php";

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MENU EKLEME</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Menu Başarıyla Eklendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Menu Eklenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Sitenize Menü Ekliyorsunuz";
                } else {
                    $updateInfo = "Sıçtık";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="addMenu" value="Menü Kaydet">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Adı</label>
                    <input class="form-control" type="text" name="screenName" placeholder="Menü Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Linki</label>
                    <input class="form-control" type="text" name="url" value="http://" placeholder="Menü Link Giriniz">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php" ?>