<header class="anim" espaceBarreMinHeight>
    <img class="logo" src="view/src/logo/logo.svg" alt="Logo du site">
    <h1><?php 
        if (isset($data["titre"]) && $data["titre"] != "") {
            echo htmlspecialchars($data["titre"]);
        }else {
            echo "Titre du site";
        }
    ?></h1>
    <img class="scrool" src="view/src/img/scrool_down.gif" alt="Scroller ver le bas pour voir le reste du site">
</header>