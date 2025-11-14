<?php
// ======================
// Habilita CORS
// ======================
header("Access-Control-Allow-Origin: *"); // permite qualquer origem
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit; // encerra preflight
}

require_once __DIR__ . '/../config/conexao.php';

try {
    $sql = "SELECT nome, valor FROM produtos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($produtos, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => $e->getMessage()]);
}
?>
