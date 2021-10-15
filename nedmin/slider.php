<?php
include "header.php";
include "sidebar.php";

if (!isset($_SESSION["UserName"])) {
    header('Location: ../login.php');
}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Slider</h1>
                <h1 class="page-subhead-line">Sitenizdeki Sliderleri Bu sayfadan yönetebilirsiniz</h1>
            </div>
            <div class="col-md-12">
                <a href="addSlider.php"><button class="btn btn-success">Slider Ekle</button>
                    <hr>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ekli Sliderler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Slider Adı</th>
                                        <th>Slider Görseli</th>
                                        <th>Url</th>
                                        <th>List Order</th>
                                        <th style="width: 20px;"></th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>

                                <?php
                                $result = $conn->query("SELECT * FROM SLIDER ORDER BY LIST_ORDER ASC");
                                while ($getMenus = $result->fetch_assoc()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $getMenus['ID']; ?></td>
                                            <td><?php echo $getMenus['IMG_NAME']; ?></td>
                                            <td><img width="200" src="<?php echo $getMenus['IMG_URL']; ?>" alt="slider Resmi"></td>
                                            <td><?php echo $getMenus['URL']; ?></td>
                                            <td><?php echo $getMenus['LIST_ORDER']; ?></td>
                                            <td><a href="editSlider.php?sliderId=<?php echo $getMenus['ID'] ?>"><button class="btn btn-primary">Duzenle</button></a></td>
                                            <td><a href="netting/DbTransactions.php?sliderId=<?php echo $getMenus['ID'] ?>&deleteSlider=ok"><button class="btn btn-danger">Sil</button></a></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>