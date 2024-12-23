<?php
// Configuração de conexão com o banco de dados
define('HOST', 'localhost');
define('USER', 'edon');
define('PASS', '12345');
define('BASE', 'cadastro');

// Estabelecendo conexão com tratamento de erros
try {
    $conn = new mysqli(HOST, USER, PASS, BASE);

    // Verificando se há erros de conexão
    if ($conn->connect_error) {
        throw new Exception("Falha na conexão: " . $conn->connect_error);
    }

    // Definir charset para evitar problemas com caracteres especiais
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>
