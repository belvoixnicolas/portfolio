<?php
    class visite {
        private const CHEMIN = "view/src/json/";
        private const FICHIER = "vue.json";

        public function __construct () {
            if (file_exists(self::CHEMIN . self::FICHIER)) {
                $this->add_visite();
            }else {
                touch(self::CHEMIN . self::FICHIER);
                $this->add_visite();
            }
        }

        private function add_visite() {
            $json = json_decode(file_get_contents(self::CHEMIN . self::FICHIER), true);

            $json[] .= time();

            file_put_contents(self::CHEMIN . self::FICHIER ,json_encode($json));
        }
    }
?>