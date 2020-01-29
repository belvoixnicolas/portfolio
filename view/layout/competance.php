<?php if (isset($dataCompetance) && $dataCompetance && is_array($dataCompetance)) { ?>
    <article id="competance" class="scrollanim" scroll_anim_height="80">
        <div class="main">
            <h2>Compétances</h2>

            <?php 
                foreach ($dataCompetance as $key => $value) { 
                    $titre = "Titre";
                    $img = "view/src/img/competanceDefau.jpg";

                    if ($key != "" && is_null($key) == false) {
                        $titre = $key;
                    }
                    if ($value["img"] != "" && is_null($value["img"]) == false) {
                        $img = $value["img"];
                    }
            ?>
                <div class="competances">
                    <section>
                        <img src="<?= htmlspecialchars($img); ?>" alt="logo de <?= htmlspecialchars($titre); ?>">
                            <h3><?= htmlspecialchars($titre); ?></h3>
                    </section>
                </div>
            <?php } ?>
        </div>
    </article>
<?php } ?>