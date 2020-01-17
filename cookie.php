<?php
    $cookie = setcookie("autorisation", true, strtotime("+1 day"));

    if ($cookie) {
        echo json_encode(true);
    }else {
        echo json_encode(false);
    }
?>