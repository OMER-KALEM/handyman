<?php

    include "DbConnect.php";

    if(isset($_POST['saveSettings'])){
    
        $id = 0; //Tek bir elemanım olacak zaten

        $updatedRows = $conn->query("UPDATE ayarlar SET 
        TITLE='".$_POST['title']."',
        DESCRIPTION='".$_POST['description']."',
        KEYWORDS='".$_POST['keywords']."',
        PHONE='".$_POST['phone']."',
        FACEBOOK='".$_POST['facebook']."',
        TWITTER='".$_POST['twitter']."',
        FOOTER='".$_POST['footer']."',
        ADDRESS='".$_POST['address']."',
        MAIL='".$_POST['mail']."',
        FAX='".$_POST['fax']."'

    where ID= '$id'
    ");
    }

    if ($conn -> affected_rows > 0) {
        header("Location: ../ayarlar.php?status=ok");
    }else {
        header("Location: ../ayarlar.php?status=notok");
    }
    // $conn -> close();
?>