<article id="portfolio">
    <h2>Portfolio</h2>
    <div class="sites">
        <?php 
            if (isset($isMobil) == false) {
                $isMobil = false;
            }
            
            for ($i=1; $i <= 4; $i++) { 
        ?>
            <section data-site="site_<?= $i ?>.jpg" mobile="<?= ($isMobil ? 'true' : 'false') ?>">
                <h3>Titre site site site site site site site</h3>
                <span>tag / tag / tag</span>
            </section>
        <?php } ?>
    </div>
</article>
<script src="view\js\portfolio_backgroud.js"></script>
<script src="view\js\portfolio_focus.js"></script>