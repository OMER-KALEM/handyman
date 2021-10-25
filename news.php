<?php
include "header.php";
?>

<section id="content">
    <div class="wrapper">
        <article class="col-1">
            <h3 class="prev-indent-bot">Haber Bloğu</h3>

            <?php
            define("maxLimitOfNewCharacter", 300);
            $result = $conn->query("SELECT * FROM DASH_NEW_ITEM");
            while ($getNews = $result->fetch_assoc()) {
                $isOverLength = strlen($getNews['NEW_CONTENT']) > maxLimitOfNewCharacter
            ?>

                <div class="indent-left">
                    <div class="wrapper prev-indent-bot">
                        <figure class="img-indent"><img width="200" height="200" src="nedmin/<?php echo $getNews['IMG_URL']; ?>" alt=""></figure>
                        <div class="extra-wrap">
                            <h6 class="prev-indent-bot"><?php echo $getNews['NEW_NAME']; ?></h6>
                            <?php echo substr($getNews['NEW_CONTENT'], 0, maxLimitOfNewCharacter);
                            echo $isOverLength ? " ..." : "" ?>
                        </div>
                    </div>
                    <div style="float:right; padding-bottom: 15px;" class="indent-right">
                        <a style="visibility: <?php echo $isOverLength ? "visible" : "hidden"; ?>" class="button-2" href="newDetail.php?newId=<?php echo $getNews['ID']; ?>">Read More</a>
                    </div>
                </div>
                <br><br>
                <hr>
            <?php } ?>

        </article>
        <article class="col-2">
            <h4 style="font-size: 20px;" class="p1">En çok okunan haberler</h4>
            <ul class="list-1">
                
                <?php
                $result = $conn->query("SELECT * FROM DASH_NEW_ITEM WHERE STATUS=b'1' ORDER BY NEW_HIT DESC LIMIT 10");
                while ($getNews = $result->fetch_assoc()) {
                ?>
                    <li><a href="newDetail.php?newId=<?php echo $getNews['ID']; ?>"><?php echo $getNews['NEW_NAME'] . " " . $getNews['NEW_HIT']; ?></a></li>
                <?php } ?>
                
            </ul>
        </article>
    </div>
</section>
<aside>
    <div class="block"></div>
</aside>
</div>
</div>

<?php include "footer.php" ?>