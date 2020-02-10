<?php
    class captcha {
        private const KEY = "6Lc2pb8UAAAAAFBoMKOndJQrcyslxzL7ILpQs4hH";
        private const URL = "https://www.google.com/recaptcha/api/siteverify?secret=" . self::KEY . "&response=";

        public function verif ($responce) {
            $url = self::URL . $responce;

            $reponse = json_decode(file_get_contents($url), true);

            if ($reponse["hostname"] == "localhost") {
                if ($reponse["hostname"] == $_SERVER["SERVER_NAME"] && $reponse["success"]) {
                    return true;
                } else {
                    return false;
                }
            }else {
                if (substr($reponse["hostname"], 4) == $_SERVER["SERVER_NAME"] && $reponse["success"]) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
?>