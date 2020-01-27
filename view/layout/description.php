<?php if (isset($data["description"]) && $data["description"] != "") { ?>
    <article id="description" class="scrollanim" scroll_anim_height="80">
        <h2>Description</h2>
        <p><?= htmlspecialchars($data["description"]); ?></p>
    </article>
<?php } ?>