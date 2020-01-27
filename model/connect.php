<?php
    class connect {
        private const HOST = "127.0.0.1";
        private const BD = "portfolio";
        private const USER = "root";
        private const PASS = "";

        protected function coBd () {
            try {
                return new PDO("mysql:host=" . self::HOST . ";dbname=" . self::BD, self::USER, self::PASS);
            }catch (PDOException $e) {
                return false;
            }
        }

        protected function supIntKey ($array) {
            if (is_array($array)) {
                foreach ($array as $key => $value) {
                    if (is_int($key)) {
                        unset($array[$key]);
                    }
                }

                return $array;
            }else {
                return $array;
            }
        }
    }
?>