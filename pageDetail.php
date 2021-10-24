<?php include "header.php";

$sayfaId = $_GET['pageId'];
$result = $conn->query("SELECT * FROM DASH_PAGE_ITEM WHERE ID = '$sayfaId'");
$getPages = $result->fetch_assoc()
?>

<div class="wrapper">
    <div class="column-6">
        <div class="box">
            <div class="aligncenter">
                <h4><?php echo $getPages['PAGE_NAME']; ?></h4>
            </div>
            <div class="box-bg maxheight">
                <div class="padding">
                    <p><?php echo $getPages['CONTENT']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content">
    <div class="wrapper">
    </div>
    <div class="block"></div>
</section>
</div>
</div>
<?php include "footer.php" ?>