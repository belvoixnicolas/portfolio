<?php
    if (isset($_GET['page'])) {
        echo "variable get: " . $_GET['page']; 
    }else {
        include("controller/acceuil.php");
    }
?>