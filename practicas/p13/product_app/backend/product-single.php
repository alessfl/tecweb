<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use TECWEB\MYAPI\Products;

    $id = $_POST['id'] ?? $_GET['id'] ?? null;

    $response = Products::single($id);
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>