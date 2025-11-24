<?php
    require_once __DIR__ . '/vendor/autoload.php';
    use TECWEB\MYAPI\Products;

    $id = $_GET['id'] ?? $_POST['id'] ?? null;

    if (!$id) {
        echo json_encode([
            "status" => "error",
            "message" => "No se recibió el ID del producto."
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }

    $response = Products::delete($id);
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>