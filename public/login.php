<?php

// Inicia a sessão para permitir o uso de $_SESSION
session_start();

// Gera um token CSRF e armazena na sessão
$_SESSION['csrf_token'] = $_SESSION['csrf_token'] ?? hash('sha256',random_bytes(32));

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SegurançaWEB</title>
    <link rel="stylesheet" href="css/style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>


    <main class = "container">
        <form action="sql_injection_fixed.php" method = "POST">
          <!-- Value é o codigo gerado -->
            <input type="hidden" name = "csrf" value = "<?php echo $_SESSION['csrf_token']; ?>">
            <h1>Login</h1>
            
            <div class = "campo">
                <input type="email" name = "email" placeholder="Usúario">
            </div>

             <div class = "campo">
                <input type="password" name = "senha" placeholder="Senha">
            </div>

           
             <button class="login" type="submit">Entrar</button>

            <div class="semconta">
                <p>Não tem uma conta? <a href="#">Cadastre-se</a></p>
            </div>
          

    </form>
</main>

</body>
</html>