<?php include "header.php";
include "sidebar.php";

$menuId = $_GET['menuId'];
$result = $conn->query("SELECT * FROM DASH_MENU_ITEM WHERE ID='$menuId'");
$selectedMenu = $result->fetch_assoc();

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
                    $updateInfo = "Menu Başarıyla Düzenlendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Menu Düzenlenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Menünüzü Dünzeliyorsunuz";
                } else {
                    $updateInfo = "Sıçtık";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST">
            <input type="hidden" name="menuId" value="<?php echo $selectedMenu['ID']; ?>">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="editMenu" value="Menü Düzenle">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Adı</label>
                    <input class="form-control" type="text" name="screenName" value="<?php echo $selectedMenu['SCREEN_NAME']; ?>" placeholder="Menü Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Linki</label>
                    <input class="form-control" type="text" name="url" value="<?php if ($selectedMenu['URL']=="") {echo "http://";}else{echo $selectedMenu['URL'];} ?>" placeholder="Menü Linki Giriniz">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php" ?>