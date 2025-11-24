<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use TECWEB\MYAPI\Products;

    $response = Products::list();
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>