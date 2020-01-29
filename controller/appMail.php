<?php
    if (isset($_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["text"], $_POST["captcha"]) && $_POST["nom"] != "" && $_POST["prenom"] != "" && $_POST["mail"] != "" && $_POST["text"] != "" && $_POST["captcha"] != "") {
        require_once("model/captcha.php");
        require_once("model/mail.php");

        $captcha = new captcha;
        $mail = new mail;

        if ($captcha->verif($_POST["captcha"])) {
            $post_nom = ucfirst($_POST["nom"]);
            $post_prenom = ucfirst($_POST["prenom"]);
            $post_mail = $_POST["mail"];
            $post_txt = $_POST["text"];

            $text = "Nom: {$post_nom}\r\nPrénom: {$post_prenom}\r\nMail: {$post_mail}\r\n\r\n{$post_txt}";

            $envoyer = $mail->envoyer($text, "Contact Portfolio");

            if ($envoyer){
                echo json_encode(array(
                    "resultat" => true,
                    "info" => "Le mail a été envoyer !"
                ));
            }else{
                echo json_encode(array(
                    "resultat" => false,
                    "info" => "Le mail n'a pas été envoyer !"
                ));
            }
        }else {
            echo json_encode(array(
                "resultat" => false,
                "info" => "Le captcha n'est pas valide !"
            ));
        }
    }else {
        echo json_encode(array(
            "resultat" => false,
            "info" => "Il manque des variables !"
        ));
    }
?>