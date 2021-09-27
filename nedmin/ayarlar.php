<?php include "header.php"?>
<?php include "sidebar.php"?>


    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">SITE GENEL AYARLARI</h1>
<?php



$updateInfo="";
$updateInfoColor="black";
if ($_GET['status'] == "ok") {
    $updateInfo = "İsleminiz gerceklesmistir";
    $updateInfoColor ="green";
} elseif ($_GET['status'] == "notok") {
    $updateInfo = "Olmadı bir daha";
    $updateInfoColor = "red";
} elseif ($_GET['status'] == "") {
    $updateInfo = "Sitenizin genel ayarlarının yapıldığı yer";
}else {
    $updateInfo = "Sıçtık";
}
?>

                    <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>" > <?php echo $updateInfo ?> </h1>
                </div>
            </div>

            <form action = "netting/DbTransactions.php" method="POST">
            <div class="form-group col-md-12">
                <div class="form-group col-md-6">
                    <label>Site basligi</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $row['TITLE'] ?>">
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="form-group col-md-6">
                    <label>Site basligi</label>
                    <input class="form-control" type="text" name="description" value="<?php echo $row['DESCRIPTION'] ?>">
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="form-group col-md-6">
                    <label>Site anahtar kelimeler</label>
                    <input class="form-control" type="text" name="keywords" value="<?php echo $row['KEYWORDS'] ?>">
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="form-group col-md-3">
                    <label>Telefon Numaranız</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $row['PHONE'] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label>Facebook adresiniz</label>
                    <input class="form-control" type="text" name="facebook" value="<?php echo $row['FACEBOOK'] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label>Twitter Adresiniz</label>
                    <input class="form-control" type="text" name="twitter" value="<?php echo $row['TWITTER'] ?>">
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="form-group col-md-10">
                    <label>Site Footer</label>
                    <input class="form-control" type="text" name="footer" value="<?php echo $row['FOOTER'] ?>">
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="form-group col-md-10">
                    <label>Adresiniz</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $row['ADDRESS'] ?>">
                </div>
            </div>

            <div class="form-group col-md-12">
                <div class="form-group col-md-3">
                    <label>Mail adresiniz</label>
                    <input class="form-control" type="text" name="mail" value="<?php echo $row['MAIL'] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label>Faks Numranız</label>
                    <input class="form-control" type="text" name="fax" value="<?php echo $row['FAX'] ?>">
                </div>
            </div>

            <div class="form-group col-md-6">
                <div class="form-group col-md-4">
                    <input style="width:100%; margin-left: 30px" class="btn btn-success" type="submit" name="saveSettings" value="Ayarları Kaydet">
                </div>
            </div>

            </form>
        </div>
    </div>
<?php include "footer.php"?>