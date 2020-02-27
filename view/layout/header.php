<header class="anim" espaceBarreMinHeight>
    <img class="logo" src="view/src/logo/logo.svg" alt="Logo du site" loading="eager">
    <h1><?php 
        if (isset($data["titre"]) && $data["titre"] != "") {
            echo htmlspecialchars($data["titre"]);
        }else {
            echo "Titre du site";
        }
    ?></h1>
</header>