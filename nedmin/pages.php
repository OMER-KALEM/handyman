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
                <h1 class="page-head-line">SAYFALAR</h1>
                <h1 class="page-subhead-line">Sitenizdeki Sayfaları Bu sayfadan yönetebilirsiniz</h1>
            </div>
            <div class="col-md-12">
                <a href="addPage.php"><button class="btn btn-success">Sayfa Ekle</button>
                    <hr>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ekli Menuler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Eklendiği Tarih</th>
                                        <th>Sayfa Adı</th>
                                        <th>AnaSayfada Gösteriliyor mu</th>
                                        <th>Sıra</th>
                                        <th style="width: 20px;"></th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>

                                <?php
                                $result = $conn->query("SELECT * FROM DASH_PAGE_ITEM");
                                while ($getPages = $result->fetch_assoc()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $getPages['CREATE_DATE']; ?></td>
                                            <td><?php echo $getPages['PAGE_NAME']; ?></td>
                                            <td><?php echo $getPages['IS_MAIN_SCREEN'] ? "Evet" : "Hayır"; ?></td>
                                            <td><?php echo $getPages['LIST_ORDER']; ?></td>
                                            <td><a href="editPage.php?pageId=<?php echo $getPages['ID'] ?>"><button class="btn btn-primary">Duzenle</button></a></td>
                                            <td><a href="netting/DbTransactions.php?pageId=<?php echo $getPages['ID'] ?>&deletePage=ok"><button class="btn btn-danger">Sil</button></a></td>
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