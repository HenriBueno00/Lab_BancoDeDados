<?php
// Dados de conexão
$servername = "localhost";
$username = "root";
$password = "";
$database = "loja";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    
    <h2>Produtos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>ID Cliente</th>
            <th>Observação</th>
            <th>Forma de Pagamento</th>
            <th>Prazo de Entrega</th>
            <th>ID Vendedor</th>
            <th>Ações</th>
        </tr>
        <tr>
            <td>1</td>
            <td>2024-05-13</td>
            <td>1</td>
            <td>Observação 1</td>
            <td>Pagamento 1</td>
            <td>Entrega 1</td>
            <td>1</td>
            <td><a href="#">Excluir</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>2024-05-14</td>
            <td>2</td>
            <td>Observação 2</td>
            <td>Pagamento 2</td>
            <td>Entrega 2</td>
            <td>2</td>
            <td><a href="#">Excluir</a></td>
        </tr>
        <!-- Adicione mais linhas conforme necessário -->
    </table>
</body>
</html>
