<?php
    class deroulement {
        protected $_CHEMIN = "view/src/json/deroulement.json";
        protected $_CHEMIN_IMG = "view/src/data_deroulement/";

        public function __construct() {
            if ($this->verifChemin() == false) {
                $array = array();

                file_put_contents($this->_CHEMIN, json_encode($array));
            }
        }

        public function getDeroulement($originale = false) {
            if ($this->verifChemin()) {
                $json = json_decode(file_get_contents($this->_CHEMIN), true);

                if ($json) {
                    if ($originale == false) {
                        foreach ($json as $key => $value) {
                            if (file_exists($this->_CHEMIN_IMG . $value["img"]) && is_null($value["img"]) == false && strlen($value["img"]) > 0) {
                                $json[$key]["img"] = $this->_CHEMIN_IMG . $value["img"];
                            }else {
                                $json[$key]["img"] = null;
                            }
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
            if (file_exists($this->_CHEMIN)) {
                return true;
            }else{
                return false;
            }
        }

        protected function modelTableDeroulement($img, $text) {
            return array(
                "img" => $img,
                "text" => $text
            );
        }
    }
?>