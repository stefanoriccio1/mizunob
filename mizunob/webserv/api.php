<?php
// Abilita la visualizzazione degli errori
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Imposta l'header per il contenuto JSON
header('Content-Type: application/json');

// Verifica il metodo della richiesta
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGetRequest();
        break;
    case 'POST':
        handlePostRequest();
        break;
    default:
        echo json_encode(['message' => 'Metodo non supportato']);
        break;
}

function handleGetRequest() {
    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
        echo json_encode(['message' => "Ciao $name"]);
    } else {
        echo json_encode(['message' => 'Nome non fornito']);
    }
}

function handlePostRequest() {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['name'])) {
        $name = htmlspecialchars($input['name']);
        echo json_encode(['message' => "Ciao $name"]);
    } else {
        echo json_encode(['message' => 'Nome non fornito']);
    }
}
?>
