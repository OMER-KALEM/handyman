<?php include "header.php";
include "sidebar.php";

$pageId = $_GET['pageId'];
$result = $conn->query("SELECT * FROM DASH_PAGE_ITEM WHERE ID='$pageId'");
$selectedPage = $result->fetch_assoc();
?>

<head>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Sayfa DUZENLEME</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Sayfa Başarıyla Düzenlendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Sayfa Düzenlenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Sayfanızı Dünzeliyorsunuz";
                } else {
                    $updateInfo = "Sıçtık";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST">
            <input type="hidden" name="pageId" value="<?php echo $selectedPage['ID']; ?>">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="editPage" value="Sayfa Düzenle">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa Adı</label>
                    <input class="form-control" type="text" name="pageName" value="<?php echo $selectedPage['PAGE_NAME']; ?>" placeholder="Sayfa Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa İçerigi</label>
                    <textarea name="content" class="ckeditor"><?php echo $selectedPage['CONTENT']; ?></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sıra</label>
                    <input class="form-control" type="text" name="listOrder" value="<?php echo $selectedPage['LIST_ORDER']; ?>" placeholder="Sayfa Sırasını Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <div class="checkbox">
                        <input type="hidden" name="IsMainScreen" value="0"  />
                        <label><input type="checkbox" name="IsMainScreen" value="1" <?php echo $selectedPage['IS_MAIN_SCREEN']==1 ? "checked" : ""?> >Ana Sayfada Goster</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php" ?>