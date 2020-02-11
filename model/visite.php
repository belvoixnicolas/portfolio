<?php
    class visite {
        protected $_CHEMIN = "view/src/json/";
        protected const FICHIER = "vue.json";

        public function __construct ($i = true) {
            if ($i) {
                if (file_exists($this->_CHEMIN . self::FICHIER)) {
                    $this->add_visite();
                }else {
                    touch($this->_CHEMIN . self::FICHIER);
                    $this->add_visite();
                }
            }else {
                if (file_exists($this->_CHEMIN . self::FICHIER) == false) {
                    touch($this->_CHEMIN . self::FICHIER);
                }
            }
        }

        private function add_visite() {
            $json = json_decode(file_get_contents($this->_CHEMIN . self::FICHIER), true);

            $json[] .= time();

            file_put_contents($this->_CHEMIN . self::FICHIER ,json_encode($json));
        }
    }
?>