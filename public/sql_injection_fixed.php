<?php
// Inicia a sessão para permitir o uso de $_SESSION
session_start();

// Importa o arquivo de conexão com o banco de dados
require_once __DIR__ . '/../conn.php';

// VALIDAÇÃO CSRF: Compara o token da sessão com o token enviado pelo formulário ($_POST['csrf'])
if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $_POST['csrf']) {
    // Interrompe o script se os tokens não forem idênticos
    throw new Exception('CSRF token inválido');
}

// Verifica se os campos de login foram preenchidos
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // PREPARED STATEMENT: Prepara a query usando "placeholders" (:email, :senha) para evitar SQL Injection
    $query = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :senha");
    
    // BIND PARAM: Vincula as variáveis aos placeholders, garantindo que sejam tratadas apenas como texto comum
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':senha', $senha, PDO::PARAM_STR);
    
    // Executa a consulta de forma segura
    $query->execute();

    // Verifica se o banco encontrou algum registro correspondente
    if ($query->rowCount() > 0) {
        echo "Login bem-sucedido!";
    } else {
        echo "Login falhou.";
    }
}

// Gera um NOVO token CSRF para a próxima requisição, aumentando a segurança
$_SESSION['csrf_token'] = hash('sha256', random_bytes(32));