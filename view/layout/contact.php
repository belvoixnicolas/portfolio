<article id="contact" class="scrollanim" scroll_anim_height="80">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <h2>Me contacter</h2>

    <menu>
        <button id="buttonContact" class="focus">Contact</button>
        <button id="buttonFormulaire">Formulaire</button>
    </menu>

    <section class="contact">
        <h3>contact</h3>

        <ul>
            <?php if (isset($data) && is_array($data)) { ?>
                <?php if (isset($data["prenom"]) && $data["prenom"] || isset($data["nom"]) && $data["nom"]) { ?>
                    <li>
                        <h4>Nom et prénom</h4>
                        <p><?php 
                            if (isset($data["prenom"], $data["nom"]) && $data["prenom"] != "" && $data["nom"] != "") {
                                echo htmlspecialchars("{$data["nom"]} {$data["prenom"]}");
                            }elseif (isset($data["prenom"]) && $data["prenom"] != "") {
                                echo htmlspecialchars($data["prenom"]);
                            }elseif (isset($data["nom"]) && $data["nom"] != "") {
                                echo htmlspecialchars($data["nom"]);
                            }else {
                                echo "N/A";
                            }
                        ?></p>
                    </li>
                <?php } ?>

                <?php if (isset($data["mail"]) && $data["mail"] != "") { ?>
                    <li>
                        <h4>Mail</h4>
                        <p><?php 
                            if (isset($isMobil) && $isMobil) {
                                echo "<a href=\"mailto:" . htmlspecialchars($data["mail"]) . "\">" . htmlspecialchars($data["mail"]) . "</a>";
                            }else {
                                echo htmlspecialchars($data["mail"]);
                            }
                        ?></p>
                    </li>
                <?php } ?>

                <?php if (isset($data["tel"]) && $data["tel"] != "") { ?>
                    <li>
                        <h4>Téléphone</h4>
                        <p><?php
                            if (isset($isMobil) && $isMobil) {
                                echo "<a href=\"tel:" . htmlspecialchars($data["tel"]) . "\">" . htmlspecialchars(implode(".", str_split(str_replace("+33", "0", $data["tel"]), 2))) . "</a>";
                            }else {
                                echo htmlspecialchars(implode(".", str_split(str_replace("+33", "0", $data["tel"]), 2)));
                            }
                        ?></p>
                    </li>
                <?php } ?>

                <?php if (isset($data["siret"]) && $data["siret"] != "") { ?>
                    <li>
                        <h4>Siret</h4>
                        <p><?= htmlspecialchars($data["siret"]); ?></p>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </section>
    <section class="formulaire hidden">
        <h3>Formulaire contacte</h3>

        <form id="formContact">
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <input type="email" name="mail" id="mail" placeholder="Mail" required>
            <textarea name="text" id="text" placeholder="text" required></textarea>
            <div class="g-recaptcha" data-sitekey="6Lc2pb8UAAAAANwT4eDni7RMNQoIryCYvMee25hh" data-callback="correctCaptcha" data-expired-callback="invalid"></div>
            <button type="submit" class="" disabled>Envoyer</button>
        </form>
    </section>
</article>