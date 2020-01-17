<!DOCTYPE html>
<html lang="fr">
<?php include "view/layout/head.php"; ?>
<body>
    <!-- NAV -->
    <?php include "view/layout/nav.php"; ?>

    <!-- HEADER -->
    <?php include "view/layout/header.php"; ?>

    <main>
        <?php include "view/layout/service.php"; ?>
        <?php include "view/layout/deroulement.php"; ?>
        <?php include "view/layout/competance.php"; ?>
        <?php include "view/layout/portfolio.php"; ?>
        <?php include "view/layout/description.php"; ?>
        <?php include "view/layout/contact.php"; ?>
    </main>

    <!-- FOOTER -->
    <?php include "view/layout/footer.php"; ?>

    <!-- ASSIDE -->
    <?php include "view/layout/site_info.php"; ?>

    <!-- cookie -->
    <?php 
        if (isset($cookie) && $cookie == false) {
            include "view/layout/cookie.php";
        }
    ?>
</body>
<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 1000,
        speedAsDuration: true,
        easing: 'easeInOutCubic'
    });
</script>
</html>