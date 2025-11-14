<?php
// backend/controllers/login.php

require_once __DIR__ . '/../config/conexao.php'; // conecta ao banco

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Acesso inválido.');
}

// Captura e valida os dados
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($email) || empty($senha)) {
    die('Preencha todos os campos.');
}

try {
    // Busca o usuário pelo e-mail
    $sql = "SELECT * FROM clientes WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Login válido → cria sessão
        $_SESSION['usuario_id'] = $usuario['id'];     // supondo que tenha uma coluna "id"
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];

        // Redireciona para área protegida (ex: dashboard)
        header("Location: ../../frontend/app.html");
        exit();
    } else {
        die('E-mail ou senha inválidos.');
    }

} catch (PDOException $e) {
    error_log('Erro no login: ' . $e->getMessage());
    die('Erro ao processar o login. Tente novamente.');
}
?>
