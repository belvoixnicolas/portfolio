<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>500</title>

    <link rel="stylesheet" href="view/css/error.css?v=1">

    <?php
        if (isset($isMobil) && isset($navigateur) && $isMobil) {
            switch ($navigateur) {
                case 'chrome':
    ?>

        <link rel="stylesheet" href="view/css/barreChrome.css?v=2">

    <?php
                    # code...
                    break;
                
                case 'edge':
    ?>

        <link rel="stylesheet" href="view/css/barreEdge.css?v=2">

    <?php
                    break;
            }
        }
    ?>

    <link rel="apple-touch-icon" sizes="180x180" href="view/src/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="view/src/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="view/src/favicon/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="view/src/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="view/src/favicon/favicon-16x16.png">
    <link rel="manifest" href="view/src/favicon/site.webmanifest">
    <link rel="mask-icon" href="view/src/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="view/src/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Nicolas Belvoix">
    <meta name="application-name" content="Nicolas Belvoix">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-TileImage" content="view/src/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="view/src/favicon/browserconfig.xml">
    <meta name="theme-color" content="#4D4F52">

    <script src="https://kit.fontawesome.com/828b21001a.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1>500</h1>
    <p>
        Erreur du serveur
    </p>
    <a href="index.php">Revenir sur le site</a>
</body>
</html>