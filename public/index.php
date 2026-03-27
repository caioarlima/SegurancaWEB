<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title></title>
</head>
<body>
    
    <div>
           <?php
// 1. Define qual página carregar (se não houver nada na URL, carrega 'login')
$pagina = $_GET['page'] ?? 'login';

// 2. Lista BRANCA: Apenas estes arquivos podem ser incluídos via URL
$permitidos = [
    'login', 
    'xss', 
    'xss_fixed', 
    'sql_injection', 
    'sql_injection_fixed'
];

// 3. Lógica de segurança
if (in_array($pagina, $permitidos)) {
    // Verifica se o arquivo físico existe na pasta atual
    if (file_exists($pagina . '.php')) {
        include_once $pagina . '.php';
    } else {
        include_once 'erro404.php';
    }
} else {
    // Se o usuário tentar acessar algo que não está na lista (ex: conn.php)
    include_once 'erro404.php';
}
?>
    </div>

</body>
</html>