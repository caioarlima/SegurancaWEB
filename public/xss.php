<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SegurançaWEB</title>
    <link rel="stylesheet" href="css/xss.css">
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
    // Importa a conexão com o banco de dados
    require_once __DIR__ . '/../conn.php';

    // Prepara a consulta para selecionar todos os carros
    $resultado = $conn->query("SELECT * FROM cars");
    
    // Executa a consulta no banco
    $resultado->execute();
    
    // Pega todos os dados e os organiza em uma lista (array)
    $rows = $resultado->fetchAll(PDO::FETCH_ASSOC);

    // Inicia a repetição para cada linha encontrada no banco
    foreach ($rows as $row) {
?>

    <tr>
        <td>
            <?php echo $row['id']; // Exibe o ID do carro ?>
        </td>
        
        <td>
            <?php echo $row['brand']; // Exibe a marca ?>
        </td>
                
        <td>
             <?php echo $row['model']; // Exibe o modelo ?>
        </td>
                
        <td>
            <?php echo $row['year']; // Exibe o ano ?>
        </td>
    </tr>
    
<?php
    } // Finaliza o laço de repetição (foreach)
?>

    </tbody>

</table>

</div>

</body>
</html>