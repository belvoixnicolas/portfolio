<?php
    class deroulement {
        private const CHEMIN = "view/src/json/deroulement.json";
        private const CHEMIN_IMG = "view/src/data_deroulement/";

        public function __construct() {
            if ($this->verifChemin() == false) {
                $array = array();

                file_put_contents(self::CHEMIN, json_encode($array));
            }
        }

        public function getDeroulement() {
            if ($this->verifChemin()) {
                $json = json_decode(file_get_contents(self::CHEMIN), true);

                if ($json) {
                    foreach ($json as $key => $value) {
                        if (file_exists(self::CHEMIN_IMG . $value["img"])) {
                            $json[$key]["img"] = self::CHEMIN_IMG . $value["img"];
                        }else {
                            $json[$key]["img"] = null;
                        }
                    }

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

        private function modelTableDeroulement($img, $text) {
            return array(
                "img" => $img,
                "text" => $text
            );
        }
    }
?>