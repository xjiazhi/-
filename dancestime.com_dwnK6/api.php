<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$storageFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonContent = file_get_contents('php://input');
    if ($jsonContent && file_put_contents($storageFile, $jsonContent)) {
        echo json_encode(['status' => 'success']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error']);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo file_exists($storageFile) ? file_get_contents($storageFile) : json_encode(['teachers' => [], 'courses' => (object)[], 'lastUpdate' => '']);
    exit;
}
?>