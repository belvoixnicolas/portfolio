<?php
    class mail {
        private const HEADERS = array(
            "MIME-Version" => "1.0",
            "Content-type" => "text/html; charset=UTF-8",
            "From" => "Nicolas <belvoixnicolas1997@gmail.com>",
            "Reply-To" => "Nicolas <belvoixnicolas1997@gmail.com>"
        );
        private const MAIL = "belvoixnicolas1997@gmail.com";
        private const NOM = "Nicolas";
        private const MODEL = "view/layout/model_mail.html";

        public function envoyer($text, $sujet, $to = null) {
            if (is_null($to)) {
                $to = self::NOM . " <" . self::MAIL . ">";

                if($this->envoiMail($to, $sujet, $text, self::HEADERS)) {
                    return true;
                }else {
                    return false;
                }
            }else if (is_array($to)) {
                $mails = "";

                foreach ($to as $value) {
                    if($this->verifMail($value)) {
                        $mails .= "{$value}, ";
                    }
                }

                $mails = substr($mails, 0, -2);

                if($this->envoiMail($mails, $sujet, $text, self::HEADERS)) {
                    return true;
                }else {
                    return false;
                }
            }else {
                if ($this->verifMail($to)) {
                    if($this->envoiMail($to, $sujet, $text, self::HEADERS)) {
                        return true;
                    }else {
                        return false;
                    }
                }else {
                    return false;
                }
            }
        }

        private function envoiMail($mail, $sujet, $text, $header) {
            if ($model = file_get_contents(self::MODEL)) {
                $text = str_replace(array("%titre%", "%text%"), array($sujet, nl2br($text)), $model);

                if (mail($mail, $sujet, $text, $header)) {
                    return true;
                }else {
                    return false;
                }
            }else {
                if (mail($mail, $sujet, nl2br($text), $header)) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        private function verifMail($mail) {
            if ($debut = strpos($mail, "<")) {
                if ($fin = strrpos($mail, ">")) {
                    $debut++;
                    $fin = $fin - strlen($mail);

                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", substr($mail, $debut, $fin))) {
                        return true;
                    }else {
                        return false;
                    }
                }else{
                    return false;
                }
            }else {
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $mail)) {
                    return true;
                }else {
                    return false;
                }
            }
        }
    }
?>