<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="assets/img/user.png" class="img-thumbnail" />
                    <div class="inner-text">
                        Hoşgeldin <?php echo $_SESSION["UserName"]; ?>
                        <br />
                        <small>Last Login : 2 Weeks Ago </small>
                    </div>
                </div>
            </li>
            <li>
                <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>ANA SAYFA</a>
            </li>

            <?php
            $userName = $_SESSION["UserName"];
            $result = $conn->query("SELECT * FROM ADMIN WHERE USER_NAME='$userName'");
            $admin = $result->fetch_assoc();
            if ($admin['AUTHORIZATION'] == '1') {
            ?>

                <li>
                    <a href="settings.php"><i class="fa fa-dashboard "></i>AYARLAR</a>
                </li>

            <?php } ?>

            <li>
                <a href="menus.php"><i class="fa fa-dashboard "></i>MENULER</a>
            </li>
            <li>
                <a href="slider.php"><i class="fa fa-dashboard "></i>SLİDER</a>
            </li>
            <li>
                <a href="pages.php"><i class="fa fa-dashboard "></i>SAYFALAR</a>
            </li>
            <li>
                <a href="news.php"><i class="fa fa-dashboard "></i>HABERLER</a>
            </li>
        </ul>
    </div>
</nav>