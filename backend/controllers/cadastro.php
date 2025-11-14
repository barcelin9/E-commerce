<?php
// backend/controllers/cadastro.php

require_once __DIR__ . '/../config/conexao.php'; // Importa a conexão PDO

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Acesso inválido.');
}

// Captura e valida os dados do formulário
$cpf   = trim($_POST['cpf'] ?? '');
$nome  = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($cpf) || empty($nome) || empty($email) || empty($senha)) {
    die('Preencha todos os campos.');
}

try {
    // Criptografa a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara e executa o INSERT
    $sql = "INSERT INTO clientes (cpf, nome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cpf, $nome, $email, $senhaHash]);

    header("Location: ../../index.html");
    exit();

} catch (PDOException $e) {
    die('Erro ao cadastrar usuário. Tente novamente mais tarde.'.$e->getMessage());
}
?>
