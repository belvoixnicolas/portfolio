<?php
    class siteData {
        private const CHEMIN = "view/src/json/dataSite.json";

        public function __construct() {
            if ($this->verifChemin() == false) {
                $array = array(
                    "titre" => "",
                    "description" => "",
                    "nom" => "",
                    "prenom" => "",
                    "mail" => "",
                    "tel" => "",
                    "siret" => ""
                );

                file_put_contents(self::CHEMIN, json_encode($array));
            }
        }

        public function getData() {
            if ($this->verifChemin()) {
                $json = json_decode(file_get_contents(self::CHEMIN), true);

                if ($json) {
                    return $json;
                }else {
                    return false;
                }
            }else {
                return false;
            }
        }

        private function verifChemin() {
            if (file_exists(self::CHEMIN)) {
                return true;
            }else{
                return false;
            }
        }
    }
?>