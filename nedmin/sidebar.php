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
            <li>
                <a href="ayarlar.php"><i class="fa fa-dashboard "></i>AYARLAR</a>
            </li>
            <li>
                <!-- <a href="menutransaction/menus.php"><i class="fa fa-dashboard "></i>MENULER</a> -->
                <a href="menus.php"><i class="fa fa-dashboard "></i>MENULER</a>
            </li>
        </ul>
    </div>
</nav>