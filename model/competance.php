<?php
    class competance {
        protected $_CHEMIN = "view/src/json/competance.json";
        protected $_CHEMIN_IMG = "view/src/data_competance/";

        public function __construct() {
            if ($this->verifChemin() == false) {
                $array = array();

                file_put_contents($this->_CHEMIN, json_encode($array));
            }
        }

        public function getCompetance($originale = false) {
            if ($this->verifChemin()) {
                $json = json_decode(file_get_contents($this->_CHEMIN), true);

                if (is_array($json) && $json !== false) {
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

        protected function modelTableCompetance($img) {
            return array(
                "img" => $img,
            );
        }
    }
?>