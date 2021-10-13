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
                <h1 class="page-head-line">MENULER</h1>
                <h1 class="page-subhead-line">Sitenizdeki Menuleri Bu sayfadan yönetebilirsiniz</h1>
            </div>
            <div class="col-md-12">
                <a href="addMenu.php"><button class="btn btn-success">Menu Ekle</button>
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
                                        <th>#</th>
                                        <th>Menu Adı</th>
                                        <th>Menu Link</th>
                                        <th style="width: 20px;"></th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>

                                <?php
                                $result = $conn->query("SELECT * FROM DASH_MENU_ITEM");
                                while ($getMenus = $result->fetch_assoc()) {
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $getMenus['ID']; ?></td>
                                            <td><?php echo $getMenus['SCREEN_NAME']; ?></td>
                                            <td><?php echo $getMenus['URL']; ?></td>
                                            <td><a href="editMenu.php?menuId=<?php echo $getMenus['ID'] ?>"><button class="btn btn-primary">Duzenle</button></a></td>
                                            <td><a href="netting/DbTransactions.php?menuId=<?php echo $getMenus['ID'] ?>&deleteMenu=ok"><button class="btn btn-danger">Sil</button></a></td>
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