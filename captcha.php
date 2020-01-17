<?php
    if (isset($_POST["response"]) && $_POST["response"] != "") {
        $key = "6Lc2pb8UAAAAAFBoMKOndJQrcyslxzL7ILpQs4hH";
        $captcha = $_POST["response"];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret={$key}&response={$captcha}";

        $reponse = file_get_contents($url);

        if ($reponse != "") {
            echo $reponse;
        }
    }else {
        echo json_encode($_POST);
    }
?>