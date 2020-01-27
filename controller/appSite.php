<?php
    if (isset($_POST["siteId"], $_POST["action"]) && $_POST["siteId"] > 0 && $_POST["siteId"] !="") {
        switch ($_POST["action"]) {
            case "1":
                require_once("model/portfolio.php");

                $portfolio = new portfolio;

                $portfolio->addVue($_POST["siteId"]);

                echo json_encode($portfolio->getSite($_POST["siteId"]));
                break;

            case "2":
                require_once("model/portfolio.php");

                $portfolio = new portfolio;

                echo json_encode($portfolio->addVisite($_POST["siteId"]));
                break;
            
            default:
                echo json_encode(false);
                break;
        }
    }else {
        echo json_encode(false);
    }
?>