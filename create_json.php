<?php
    include "cors.php";
    include "settings.php";

    $json_str = file_get_contents('php://input');

    $file_name = md5(microtime(true));
    file_put_contents($storage['directory'] . $file_name . $storage['format'], $json_str);
?>