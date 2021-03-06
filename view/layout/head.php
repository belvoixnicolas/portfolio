<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
        $titre = "";

        if (isset($data["titre"]) && $data["titre"] != "") {
            $titre = " | {$data["titre"]}";
        }   
    ?>

    <title>Nicolas Belvoix<?= htmlspecialchars($titre) ?></title>

    <link rel="stylesheet" href="view/css/animate.min.css">
    <link rel="stylesheet" href="view/css/style.css?v=6">

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

    <?php if (isset($data["description"]) && $data["description"] != "") { ?>
        <meta name="description" content="<?= htmlspecialchars(substr($data["description"], 0, 180)); ?>"/>
    <?php } ?>

    <script src="https://kit.fontawesome.com/828b21001a.js" crossorigin="anonymous"></script>
    <script src="view/js/jquery_compresser.js"></script>
    <script src="view/js/smooth-scroll.min.js"></script>
    <script src="view/js/min.compiler.js"></script>
</head>