<?php

// Importa a conexão com o banco de dados
require_once __DIR__ . '/../conn.php';

// Verifica se os campos de e-mail e senha foram enviados via POST
if (isset($_POST['email']) && isset($_POST['senha'])) {
    
    // Armazena os dados vindos do formulário em variáveis
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // ATENÇÃO: Monta a query inserindo as variáveis diretamente na string.
    // Isso é ALTAMENTE INSEGURO e permite ataques de SQL Injection.
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$senha'";

    // Executa a consulta "suja" (sem tratamento) no banco de dados
    $resultado = $conn->query($sql);

    // Verifica se o banco encontrou algum usuário com esses dados
    if ($resultado->rowCount() > 0) {
        echo "Login bem-sucedido!";
    } else {
        echo "Login falhou.";
    }
}