<?php

/**
 * ARQUIVO DE EXEMPLO - COPIE PARA "conn.php"
 * Preencha com as credenciais do seu ambiente Laradock/Docker.
 */

$host     = 'NOME_DO_SERVICO_MYSQL'; 
$port     = 'SUA_PORTA';
$database = 'NOME_DO_SEU_BANCO';
$user     = 'SEU_USUARIO';
$password = 'SUA_SENHA';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Mensagem genérica para não vazar caminhos de arquivos no erro
    die("Erro na conexão: Verifique as configurações no seu conn.php");
}git init
