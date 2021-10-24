<?php include "header.php";
include "sidebar.php";
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SLİDER EKLEME</h1>

                <?php
                $updateInfo = "";
                $updateInfoColor = "black";
                if ($_GET['status'] == "ok") {
                    $updateInfo = "Slider Başarıyla Eklendi";
                    $updateInfoColor = "green";
                } elseif ($_GET['status'] == "notok") {
                    $updateInfo = "Slider Eklenemedi";
                    $updateInfoColor = "red";
                } elseif ($_GET['status'] == "") {
                    $updateInfo = "Sitenize Slider Ekliyorsunuz";
                } else {
                    $updateInfo = "Sıçtık";
                }
                ?>

                <h1 class="page-subhead-line" style="color :<?php echo $updateInfoColor ?>"> <?php echo $updateInfo ?> </h1>
            </div>
        </div>
        <form action="netting/DbTransactions.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group col-md-3">
                    <input style="width:100%;" class="btn btn-success" type="submit" name="addSlider" value="Slider Kaydet">
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
                                            <input type="file" name="sliderImgFile">
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
                    <label>Slider Adı</label>
                    <input class="form-control" type="text" name="imgName" placeholder="Slider Adı Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Linki</label>
                    <input class="form-control" type="text" name="sliderUrl" placeholder="Slider Yönlendirmek için Link Giriniz">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Slider Sırası</label>
                    <input class="form-control" type="number" name="sliderOrder" placeholder="Slider Sırasını Giriniz">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.php" ?>