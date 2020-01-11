<?php
    ///////////////////////////
    /// appel fichier model ///
    ///////////////////////////

    require_once("model/Mobile_Detect.php");


    ////////////////////////
    /// instancier class ///
    ////////////////////////
    
    $mobileDetect = new Mobile_Detect;


    /// détecter les téléphone ///

    if ($mobileDetect->isTablet() || $mobileDetect->isMobile()) {
        $isMobil = true;
    }else {
        $isMobil = false;
    }


    /// détecter navigateur ///

    $http = $_SERVER['HTTP_USER_AGENT'];

    if (stristr($http, "edge") || stristr($http, "edga")) {
        $navigateur = "edge";
    }elseif (stristr($http, "chrome")) {
        $navigateur = "chrome";
    }else {
        $navigateur = "inconnue";
    } 

    
    include "view/acceuil.php";
?>