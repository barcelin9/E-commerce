<?php
// conexao.php
// Arquivo responsável pela conexão com o banco de dados usando PDO

// ======= CONFIGURAÇÕES DO BANCO DE DADOS =======
define('DB_HOST', 'sql311.infinityfree.com');          // Endereço do servidor de banco de dados
define('DB_NAME', 'if0_40419573_cad_clientes');   // Nome do banco de dados
define('DB_USER', 'if0_40419573');          // Usuário do banco de dados
define('DB_PASS', 'mAzz6kRWhi0KsRK');      // Senha do banco de dados
define('DB_CHARSET', 'utf8mb4');         // Charset da conexão (recomendado: utf8mb4)

// ======= CONEXÃO =======
try {
    // DSN (Data Source Name)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

    // Cria uma nova conexão PDO
    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    // Define o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define o modo padrão de busca (fetch) para array associativo
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Registra o erro no log do servidor
    error_log('Erro de conexão com o banco de dados: ' . $e->getMessage());

    // Mensagem genérica para o usuário final (segurança)
    die('Erro ao conectar ao banco de dados. Tente novamente mais tarde.');
}

