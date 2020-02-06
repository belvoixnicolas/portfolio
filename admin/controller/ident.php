<?php
    session_start([
        "cookie_lifetime" => 600
    ]);
    session_destroy();

    if (isset($_POST["mail"], $_POST["mdp"])) {
        require_once("model/ident.php");

        $ident = new ident;

        $autorisation = $ident->connexion($_POST["mail"], $_POST["mdp"]);

        if ($autorisation["result"] === true) {
            session_start([
                "cookie_lifetime" => 600
            ]);

            $_SESSION["time"] = $ident->derCo();

            header('Location: index.php?page=accueil');
        }else {
            $error = $autorisation["info"];

            include_once("view/ident.php");
        }
    }else {
        include_once("view/ident.php");
    }
?>