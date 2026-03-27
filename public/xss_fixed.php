<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SegurançaWEB</title>
    <link rel="stylesheet" href="css/xss_fixed.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>

<body>

<div class ="container">

    <table class = "tabela">

    <thead class = "cabecalho">

    <tr class = "linha">

    <th class = "item">ID</th>
    <th class = "item">Marca</th>
    <th class = "item">Modelo</th>
    <th class = "item">Ano</th>

        </tr>

    </thead>

    <tbody class = "corpo">

       <?php
    // Carrega o arquivo de conexão com o banco de dados
    require_once __DIR__ . '/../conn.php';

    // Executa a busca de todos os veículos na tabela 'cars'
    $resultado = $conn->query("SELECT * FROM cars");
    $resultado->execute();
    
    // Converte os dados do banco em um array (lista) organizado
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);

    // Inicia o loop para criar uma linha na tabela para cada carro
    foreach ($rows as $row) {
?>

    <tr>
        <td>
            <?php echo htmlentities($row['id']); // Protege o ID contra XSS ?>
        </td>
        
        <td>
            <?php echo htmlentities($row['brand']); // Limpa caracteres especiais da marca ?>
        </td>
                
        <td>
             <?php echo htmlentities($row['model']); // Neutraliza scripts maliciosos no modelo ?>
        </td>
                
        <td>
            <?php echo htmlentities($row['year']); // Exibe o ano de forma segura ?>
        </td>
    </tr>
    
<?php
    } // Fim do loop de repetição
?>

    </tbody>

</table>

</div>

</body>
</html>