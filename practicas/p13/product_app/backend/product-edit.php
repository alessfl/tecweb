<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use TECWEB\MYAPI\Products;

    $data = json_decode(json_encode($_POST)); // espera id y campos a editar
    $response = Products::edit($data);

    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>