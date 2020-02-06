<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/conection.css?v=1">
    <title>Connection</title>
</head>
<body>
    <article>
        <h1>Connexion</h1>

        <form action="" method="post">
            <?php if (isset($error) && $error != "") { ?>
                <span><?= $error ?></span>
            <?php } ?>
            <div class="mail">
                <label for="mail">Mail: </label>
                <input type="email" name="mail" id="mail" required>
            </div>
            <div class="mdp">
                <label for="mdp">Mot de passe: </label>
                <input type="password" name="mdp" id="mdp" required>
            </div>
            <input type="submit" value="Connexion">
        </form>
    </article>
</body>
</html>