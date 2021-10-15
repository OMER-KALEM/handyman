<?php
include 'nedmin/netting/DbConnect.php';

$result = $conn->query("SELECT * FROM ayarlar");
$row = $result->fetch_assoc()
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $row['TITLE'] ?></title>
  <meta charset="utf-8">

  <meta name="description" content="<?php echo $row['DESCRIPTION'] ?>">
  <meta name="keywords" content="<?php echo $row['KEYWORDS'] ?>">
  <meta name="author" content="OMER">

  <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/mystyles.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
  <script src="js/jquery-1.6.3.min.js"></script>
  <script src="js/cufon-yui.js"></script>
  <script src="js/cufon-replace.js"></script>
  <script src="js/FF-cash.js"></script>
  <script src="js/script.js"></script>
  <script src="js/jquery.equalheights.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/tms-0.3.js"></script>
  <script src="js/tms_presets.js"></script>
  <script src="js/easyTooltip.js"></script>
  <!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>

<body id="page1">
  <div class="extra">
    <div class="main">
      <!--==============================header=================================-->
      <header>
        <div class="indent">
          <div class="row-top">
            <div class="wrapper">

              <img style="margin-top:30px; margin-left:30px;" src="<?php echo $row['LOGO'] ?>">

              <strong class="support"><?php echo $row['PHONE'] ?></strong>
            </div>
          </div>

          <nav>
            <ul class="menu">
              <li><a class="active" href="index.html">Home</a></li>

              <?php
              $result = $conn->query("SELECT * FROM DASH_MENU_ITEM");
              $menuSay = $conn->affected_rows;
              $say = 0;
              while ($row = $result->fetch_assoc()) {
                $say++;
              ?>
                <li class="<?php if ($menuSay == $say) {echo "last";}?>"><a href="<?php echo $row['URL']; ?>" target="_blank"><?php echo $row['SCREEN_NAME']; ?></a></li>
              <?php }
              ?>

            </ul>
          </nav>
        </div>
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
      </header>