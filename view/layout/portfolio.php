<?php if (isset($sites) && $sites && is_array($sites)) { ?>
    <article id="portfolio" class="scrollanim" scroll_anim_height="80">
        <h2>Portfolio</h2>
        <div class="sites">
            <?php 
                if (isset($isMobil) == false) {
                    $isMobil = false;
                }
                
                foreach ($sites as $value) {
            ?>
                <section data-id="<?= htmlspecialchars($value["id"]) ?>" data-site="<?= (is_null($value['img']) ? "" : htmlspecialchars($value["img"])) ?>" mobile="<?= ($isMobil ? 'true' : 'false') ?>">
                    <h3><?= htmlspecialchars($value["titre"]) ?></h3>
                    <?php if (is_null($value['tag']) == false && is_array($value["tag"])) { ?>
                        <span>
                            <?php
                                $tags = "";
                                foreach ($value["tag"] as $tag) {
                                    if ($tags == "") {
                                        $tags .= $tag . " ";
                                    }else {
                                        $tags .= "/ {$tag} ";
                                    }
                                }
                                echo htmlspecialchars(substr($tags, 0, -1));
                            ?>
                        </span>
                    <?php } ?>
                </section>
            <?php } ?>
        </div>
    </article>
<?php } ?>