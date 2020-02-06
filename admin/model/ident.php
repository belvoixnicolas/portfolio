<?php
    class ident {
        private const MAIL = "belvoixnicolas1997@gmail.com";
        private const MDP = '$2y$10$zhajulNfkH0wyMtX90qvlOObFIr1JAPjf7uHbWQ.QXwZ.eOQ8/Y8i';
        private const CHEMIN = "json/connexion.json";

        public function __construct () {
            if (file_exists(self::CHEMIN) == false) {
                file_put_contents(self::CHEMIN, json_encode(array()));
            }
        }

        public function connexion($mail, $mdp) {
            $verifMail = $this->verifMail($mail);
            $verifMdp = $this->verifMdp($mdp);

            if ($verifMail && $verifMdp) {
                $this->ajouCo();

                return array(
                    "result" => true,
                    "info" => "Identification reconnue"
                );
            }elseif ($verifMail == false && $verifMdp == false) {
                return array(
                    "result" => false,
                    "info" => "Le mot de passe et l'email est erronée !"
                );
            }elseif ($verifMail && $verifMdp == false) {
                return array(
                    "result" => false,
                    "info" => "Le mot de passe est erronée !"
                );
            }elseif ($verifMail == false && $verifMdp) {
                return array(
                    "result" => false,
                    "info" => "L'email est erronée !"
                );
            }else {
                return array(
                    "result" => false,
                    "info" => "Une erreur c'est produit !"
                );
            }
        }

        public function derCo() {
            if (file_exists(self::CHEMIN)) {
                $file = json_decode(file_get_contents(self::CHEMIN), true);
                $index = count($file);
                $index--;

                return $file[$index];
            }else {
                return false;
            }
        }

        private function verifMail($mail) {
            if ($mail === self::MAIL) {
                return true;
            }else {
                return false;
            }
        }

        private function verifMdp($mdp) {
            if (password_verify($mdp, self::MDP)) {
                return true;
            }else {
                return false;
            }
        }

        private function ajouCo() {
            if (file_exists(self::CHEMIN)) {
                $file = json_decode(file_get_contents(self::CHEMIN), true);

                $file[] = time();

                file_put_contents(self::CHEMIN, json_encode($file));
            }else {
                file_put_contents(self::CHEMIN, json_encode(array(time())));
            }
        }

        private function newMdp($mdp) {
            return password_hash($mdp, PASSWORD_BCRYPT);
        }
    }
?>