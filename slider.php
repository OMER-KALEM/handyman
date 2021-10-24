<div class="wrapper">
    <div class="slider">
        <ul class="items">

            <?php
            $result = $conn->query("SELECT * FROM SLIDER ORDER BY LIST_ORDER ASC");
            while ($row = $result->fetch_assoc()) {
            ?>
                <li><img src="nedmin/<?php echo $row['IMG_URL']; ?>" alt="<?php echo $row['IMG_NAME']; ?>"></li>
            <?php }
            ?>
        </ul>
    </div>
    <a class="prev">prev</a> <a class="next">next</a>
    <div class="banner1-bg"></div>
    <div class="banner-1"></div>
</div>