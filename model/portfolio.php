<?php
    require_once("model\connect.php");

    class portfolio extends connect {
        private const CHEMIN = "view/src/data_site/";

        public function getSites() {
            $sites = array();
            $bdd = $this->coBd();

            if ($bdd) {
                $requete = $bdd->prepare("SELECT portfolio.id, titre, img FROM portfolio LEFT JOIN date_vue ON date_vue.id_portfolio = portfolio.id left JOIN date_visite ON date_visite.id_portfolio = portfolio.id GROUP BY titre ORDER BY (SELECT COUNT(id) FROM date_visite WHERE id_portfolio = portfolio.id) DESC, (SELECT COUNT(id) FROM date_vue WHERE id_portfolio = portfolio.id) DESC, portfolio.date DESC, titre");
                $requete->execute();

                if ($result = $requete->fetchAll()) {
                    $bdd = null;

                    foreach ($result as $value) {
                        $tag = $this->getTag((int) $value["id"], 3);

                        if ($tag) {
                            $value["tag"] = $tag;
                        }else {
                            $value["tag"] = NULL;
                        }
                        
                        $sites[] = $this->supIntKey($value);
                    }
                    
                    unset($bdd, $requete, $result);

                    return $sites;
                }else {
                    $bdd = null;
                    unset($bdd, $requete);

                    return false;
                }
            }else {
                $bdd = null;
                unset($bdd);

                return false;
            }
        }

        public function getSite($id) {
            $id = (int) $id;
            $bdd = $this->coBd();
            
            if ($bdd) {
                $requete = $bdd->prepare("SELECT id, titre, description, url, img FROM portfolio WHERE id = :id");
                $requete->execute([
                    ":id" => $id
                ]);

                if ($result = $requete->fetch()) {
                    $tags = $this->getTag($id);

                    if (is_null($result["img"]) == false) {
                        $orientation = $this->imgOrientation($result["img"]);

                        if ($orientation) {
                            $result["imgOrientation"] = $orientation;
                        }else {
                            $result["imgOrientation"] = null;
                        }
                    }else {
                        $result["imgOrientation"] = null;
                    }

                    if (is_null($result['url']) == false) {
                        $a = @get_headers($result['url']);
                        if ($a) {
                            //*** On a retour : on test le header HTTP
                            if (strstr($a[0],'404')) {
                                $result['url'] = null;
                            }
                        }else{
                            $result['url'] = null;
                        }
                    }

                    if ($tags) {
                        $result["tag"] = $tags;
                    }else {
                        $result["tag"] = null;
                    }

                    $bdd = null;
                    unset($bdd, $requete);

                    return $this->supIntKey($result);
                }else {
                    $bdd = null;
                    unset($bdd, $requete);

                    return false;
                }
            }else {
                $bdd = null;
                unset($bdd);

                return false;
            }
        }

        public function addVue($id) {
            if ($this->getSite($id)) {
                $bdd = $this->coBd();

                if ($bdd) {
                    $requete = $bdd->prepare("INSERT INTO date_vue (id, id_portfolio) VALUES (NULL, :id)");

                    if ($requete->execute([":id" => $id])) {
                        $bdd = null;
                        unset($bdd, $requete);

                        return true;
                    }else {
                        $bdd = null;
                        unset($bdd, $requete);

                        return false;
                    }
                }else {
                    $bdd = null;
                    unset($bdd);

                    return false;
                }
            }else {
                return false;
            }
        }

        public function addVisite($id) {
            if ($this->getSite($id)) {
                $bdd = $this->coBd();

                if ($bdd) {
                    $requete = $bdd->prepare("INSERT INTO date_visite (id, id_portfolio) VALUES (NULL, :id)");

                    if ($requete->execute([":id" => $id])) {
                        $bdd = null;
                        unset($bdd, $requete);
                        
                        return true;
                    }else {
                        $bdd = null;
                        unset($bdd, $requete);
                        
                        return false;
                    }
                }else {
                    $bdd = null;
                    unset($bdd);

                    return false;
                }
            }else {
                return false;
            }
        }

        private function getTag($id, $int=null) {
            if (is_int($id)) {
                $bdd = $this->coBd();

                if ($bdd) {
                    if (is_null($int) == false && is_int($int)) {
                        $requete = $bdd->prepare("SELECT tag FROM tager JOIN tag ON tager.id = tag.id WHERE id_portfolio = :id LIMIT :truc");
                        $requete->bindParam(":id", $id);
                        $requete->bindParam(":truc", $int, PDO::PARAM_INT);
                        $requete->execute();
                    }else {
                        $requete = $bdd->prepare("SELECT tag FROM tager JOIN tag ON tager.id = tag.id WHERE id_portfolio = :id");
                        $requete->execute(array(
                            ":id" => $id
                        ));
                    }

                    if ($result = $requete->fetchAll()) {
                        $array = array();
                        $bdd = null;

                        foreach ($result as $value) {
                            $array[] = $value["tag"];
                        }

                        unset($bdd, $requete, $result);

                        return $array;
                    }else {
                        $bdd = null;

                        unset($bdd, $requete);

                        return false;
                    }
                }else {
                    $bdd = null;

                    unset($bdd);

                    return false;
                }
            }else {
                return false;
            }
        }

        private function imgOrientation($fichier) {
            if (file_exists(self::CHEMIN . $fichier)) {
                $infoImg = getimagesize(self::CHEMIN . $fichier);

                if ($infoImg) {
                    list($width, $height) = $infoImg;

                    if ($width > $height) {
                        return "paysage";
                    }else {
                        return "portrai";
                    }
                }else {
                    return false;
                }
            }else {
                return false;
            }
        }
    }
?>