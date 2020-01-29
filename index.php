<?php
    if (isset($_GET['page'])) {
        echo "variable get: " . $_GET['page']; 
    }elseif (isset($_POST["app"])) {
        switch ($_POST["app"]) {
            case 'site':
                include_once("controller/appSite.php");
                break;

            case 'mail':
                include_once("controller/appMail.php");
        }
    }else {
        include_once("controller/acceuil.php");
    }
?>