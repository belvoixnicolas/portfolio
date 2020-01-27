<?php if (isset($dataDeroulement) && $dataDeroulement && is_array($dataDeroulement)) { ?>
    <article id="deroulement" class="scrollanim" scroll_anim_height="80">
        <h2>Déroulement</h2>

        <div class="etape">
            <?php 
                foreach ($dataDeroulement as $key => $value) { 
                    $titre = "Titre";
                    $img = "view/src/img/deroulementDefau.jpg";
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
                    <img src="<?= htmlspecialchars($img); ?>" alt="imagr <?= htmlspecialchars($titre); ?>">
                    <h3><?= htmlspecialchars($titre); ?></h3>
                    <p><?= htmlspecialchars($text); ?></p>
                </section>
            <?php } ?>
        </div>
    </article>
<?php } ?>