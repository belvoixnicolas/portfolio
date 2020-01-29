<?php
    ///////////////////////////
    /// appel fichier model ///
    ///////////////////////////

    require_once("model/Mobile_Detect.php");
    require_once("model/visite.php");
    require_once("model/portfolio.php");
    require_once("model/site_data.php");
    require_once("model/services.php");
    require_once("model/deroulement.php");
    require_once("model/competance.php");


    ////////////////////////
    /// instancier class ///
    ////////////////////////
    
    $mobileDetect = new Mobile_Detect;
    $visite = new visite;
    $portfolio = new portfolio;
    $siteData = new siteData;
    $services = new services;
    $deroulement = new deroulement;
    $competance = new competance;


    /// verif cookies ///

    if (isset($_COOKIE["autorisation"]) && $_COOKIE["autorisation"]) {
        $cookie = true;
    }else {
        $cookie = false;
    }


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


    /// liste site ///

    $sites = $portfolio->getSites();


    /// Data du site ///

    $data = $siteData->getData();


    /// liste des services ///

    $dataServices = $services->getServices();


    /// Liste du deroulement ///

    $dataDeroulement = $deroulement->getDeroulement();


    /// liste des compétances ///

    $dataCompetance = $competance->getCompetance();

    
    include "view/acceuil.php";
?>