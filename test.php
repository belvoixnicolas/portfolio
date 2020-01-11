<?php
    $test = file_get_contents("https://www.nicolas-belvoix.fr");
    
    echo htmlspecialchars($test);
?>