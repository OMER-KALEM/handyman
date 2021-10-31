<?php 
include "header.php";
include "sidebar.php";
?>

<head>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">HABER EKLEME</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Haber Başarıyla Eklendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Haber Eklenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Sitenize Haber Ekliyorsunuz";
                } else {
                    $updateInfo = "hata";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="addNew" value="Haber Kaydet">
                </div>
            </div>
            <div class="col-md-6">
                <div style="margin-left:15px;" class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-lg-4">Image Upload</label>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-success">
                                            <span class="fileupload-new">Select image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="newImgFile">
                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Haber Adı</label>
                    <input class="form-control" type="text" name="newName" required="" placeholder="Haber Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-9">
                    <label>Haber İcerigi Giriniz</label>
                    <textarea name="content" class="ckeditor"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "footer.php" ?>