<?php include "header.php";
include "sidebar.php";

?>

<head>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SAYFA EKLEME</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Sayfa Başarıyla Eklendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Sayfa Eklenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Sitenize Sayfa Ekliyorsunuz";
                } else {
                    $updateInfo = "hata";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="addPage" value="Sayfa Kaydet">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Adı</label>
                    <input class="form-control" type="text" name="screenName" placeholder="Sayfa Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-9">
                    <label>Sayfa İcerigi Giriniz</label>
                    <textarea name="content" class="ckeditor"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa Sıra</label>
                    <input class="form-control" type="" name="listOrder" placeholder="Slider Sırasını Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <div class="checkbox">
                        <input type="hidden" name="IsMainScreen" value="0" />
                        <label><input type="checkbox" name="IsMainScreen" value="1">Ana Sayfada Goster</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php" ?>