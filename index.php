<?php
    include "cors.php";
    include "settings.php";

    $json_str = file_get_contents('php://input');
    $method = $_SERVER['REQUEST_METHOD'];
    $json_id = $_GET['id'];

    if ($method == 'GET') {
        
        if ($json_id) {
            header('Content-Type: application/json;charset=UTF-8');
            $file_name = $storage['directory'] . $json_id . $storage['format'];
            echo file_get_contents($file_name);
        } else {
            echo "post form";
        }
        
    } elseif ($method === 'POST') {

        $json_id = md5(microtime(true));
        file_put_contents($storage['directory'] . $json_id . $storage['format'], $json_str);
        echo $json_id;

    } elseif ($method === 'PUT') {
        
        $file_name = $storage['directory'] . $json_id . $storage['format'];

        if (file_exists($file_name)){
            $status = file_put_contents($file_name, $json_str);
            echo "ok";
        }
        else
            echo "something went wrong";
            
    }
?>