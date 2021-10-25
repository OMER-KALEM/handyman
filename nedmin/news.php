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
                <h1 class="page-head-line">HABERLER</h1>
                <h1 class="page-subhead-line">Sitenizdeki habeleri buradan yönetebilirsiniz</h1>
            </div>
            <div class="col-md-12">
                <a href="addNew.php"><button class="btn btn-success">Haber Ekle</button>
                    <hr>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ekli Haberler
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Eklendiği Tarih</th>
                                        <th>Sayfa Adı</th>
                                        <th>Hit</th>
                                        <th style="width: 20px;"></th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>

                                <?php
                                $result = $conn->query("SELECT * FROM DASH_NEW_ITEM");
                                while ($getNews = $result->fetch_assoc()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $getNews['ID']; ?></td>
                                            <td><?php echo $getNews['CREATE_DATE']; ?></td>
                                            <td><?php echo $getNews['NEW_NAME']; ?></td>
                                            <td><?php echo $getNews['NEW_HIT']; ?></td>
                                            <td><a href="editNew.php?newId=<?php echo $getNews['ID'] ?>"><button class="btn btn-primary">Duzenle</button></a></td>
                                            <td><a href="netting/DbTransactions.php?newId=<?php echo $getNews['ID'] ?>&deleteNew=ok"><button class="btn btn-danger">Sil</button></a></td>
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