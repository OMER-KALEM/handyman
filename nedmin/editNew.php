<?php include "header.php";
include "sidebar.php";

$newId = $_GET['newId'];
$result = $conn->query("SELECT * FROM DASH_NEW_ITEM WHERE ID='$newId'");
$selectedNew = $result->fetch_assoc();
?>

<head>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">HABER DUZENLEME</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Haber Başarıyla Düzenlendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Haber Düzenlenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Haber Dünzeliyorsunuz";
                } else {
                    $updateInfo = "Sıçtık";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST">
            <input type="hidden" name="newId" value="<?php echo $selectedNew['ID']; ?>">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="editNew" value="Haber Düzenle">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Menü Adı</label>
                    <input class="form-control" type="text" name="newName" value="<?php echo $selectedNew['NEW_NAME']; ?>" placeholder="Haber Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Sayfa İçerigi</label>
                    <textarea name="content" class="ckeditor"><?php echo $selectedNew['NEW_CONTENT']; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "footer.php" ?>