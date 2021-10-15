<?php include "header.php";
include "sidebar.php";

$sliderId = $_GET['sliderId'];
$result = $conn->query("SELECT * FROM SLIDER WHERE ID='$sliderId'");
$selectedSlider = $result->fetch_assoc();
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Slider Duzenleme</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Slider Başarıyla Düzenlendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Slider Düzenlenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Sliderinizi Dünzeliyorsunuz";
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
                    <input style="width:100%;" class="btn btn-success" type="submit" name="editSlider" value="Slider Düzenle">
                </div>
            </div>
            <input type="hidden" name="sliderId" value="<?php echo $selectedSlider['ID']; ?>">
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Adı</label>
                    <input class="form-control" type="text" name="imgName" value="<?php echo $selectedSlider['IMG_NAME']; ?>" placeholder="Slider Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Linki</label>
                    <input class="form-control" type="text" name="imgUrl" value="<?php echo $selectedSlider['IMG_URL']; ?>" placeholder="Slider Linki Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Url</label>
                    <input class="form-control" type="text" name="url" value="<?php echo $selectedSlider['URL']; ?>" placeholder="Url Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sıra</label>
                    <input class="form-control" type="text" name="listOrder" value="<?php echo $selectedSlider['LIST_ORDER']; ?>" placeholder="Slider Sırasını Giriniz">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php" ?>