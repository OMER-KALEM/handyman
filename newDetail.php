<?php include "header.php";

$newId = $_GET['newId'];
$result = $conn->query("SELECT * FROM DASH_NEW_ITEM WHERE ID = '$newId'");
$getNew = $result->fetch_assoc();

$newHitCount = $getNew['NEW_HIT'];
$newHitCount++;
$newHit = $conn->query("UPDATE DASH_NEW_ITEM SET NEW_HIT='" . $newHitCount . "' WHERE ID = '$newId'");
?>
<section id="content">
    <div class="wrapper">
        <article class="col-1">
            <div class="indent-left">
                <div class="wrapper prev-indent-bot">
                    <figure class="img-indent"><img width="200" height="200" src="nedmin/<?php echo $getNew['IMG_URL']; ?>" alt=""></figure>
                    <div class="extra-wrap">
                        <h6 class="prev-indent-bot"><?php echo $getNew['NEW_NAME']; ?></h6>
                        <?php echo $getNew['NEW_CONTENT']; ?>
                    </div>
                </div>
            </div>
        </article>
        <article class="col-2">
            <h4 style="font-size: 20px;" class="p1">En çok okunan haberler</h4>
            <ul class="list-1">
                <?php
                $result = $conn->query("SELECT * FROM DASH_NEW_ITEM WHERE STATUS=b'1' ORDER BY NEW_HIT DESC LIMIT 10");
                while ($getNew = $result->fetch_assoc()) {
                ?>
                    <li><a href="newDetail.php?newId=<?php echo $getNew['ID']; ?>"><?php echo $getNew['NEW_NAME'] . " " . $getNew['NEW_HIT']; ?></a></li>
                <?php } ?>
            </ul>
        </article>
    </div>
</section>
</div>
</div>
<?php include "footer.php" ?>