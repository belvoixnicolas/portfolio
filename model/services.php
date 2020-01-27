<?php
    class services {
        private const CHEMIN = "view/src/json/services.json";
        private const CHEMIN_IMG = "view/src/data_services/";

        public function __construct() {
            if ($this->verifChemin() == false) {
                $array = array(
                    "Services 1" => $this->modelTableServices("img_1.jpg", "text"),
                    "Services 2" => $this->modelTableServices("img_2.jpg", "text"),
                    "Services 3" => $this->modelTableServices("img_3.jpg", "text"),
                    "Services 4" => $this->modelTableServices("img_4.jpg", "text"),
                );

                file_put_contents(self::CHEMIN, json_encode($array));
            }
        }

        public function getServices() {
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

        private function modelTableServices($img, $text) {
            return array(
                "img" => $img,
                "text" => $text
            );
        }
    }
?>