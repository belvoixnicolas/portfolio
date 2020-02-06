<?php if (isset($dataServices) && $dataServices && is_array($dataServices)) { ?>
    <article id="service" class="scrollanim" scroll_anim_height="80">
        <div class="main">
            <h2>Services</h2>

            <?php 
                foreach ($dataServices as $key => $value) { 
                    $titre = "Titre";
                    $img = "view/src/img/panneauGris.svg";
                    $text = "";

                    if ($key != "" && is_null($key) == false) {
                        $titre = $key;
                    }
                    if ($value["img"] != "" && is_null($value["img"]) == false) {
                        $img = $value["img"];
                    }
                    if ($value["text"] != "" && is_null($value["text"]) == false) {
                        $text = $value["text"];
                    }
            ?>
                <section>
                    <img src="<?= htmlspecialchars($img); ?>" alt="Image <?= htmlspecialchars($titre); ?>">
                    <h3><?= htmlspecialchars($titre); ?></h3>
                    <p><?= htmlspecialchars($text); ?></p>
                </section>
            <?php } ?>
        </div>
    </article>
<?php } ?>