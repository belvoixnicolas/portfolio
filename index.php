<?php
    // test push github //
    if (isset($_GET['page'])) {
        echo "variable get: " . $_GET['page']; 
    }elseif (isset($_POST["app"])) {
        switch ($_POST["app"]) {
            case 'site':
                include("controller/appSite.php");
                break;
        }
    }else {
        include("controller/acceuil.php");
    }
?>