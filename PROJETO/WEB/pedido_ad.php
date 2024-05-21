<?php
$servername = "localhost"; /
$username = "root";
$password = "";
$database = "loja";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processamento do formulário de adição de pedidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $id_cliente = $_POST['id_cliente'];
    $observacao = $_POST['observacao'];
    
    // Verificar se o campo 'id_forma_pagto' está definido antes de acessá-lo
    $id_forma_pagto = isset($_POST['id_forma_pagto']) ? $_POST['id_forma_pagto'] : null;
    
    $prazo_entrega = $_POST['prazo_entrega'];
    $id_vendedor = $_POST['id_vendedor'];

    // Verificar se o cliente existe
    $check_client = "SELECT * FROM clientes WHERE id = '$id_cliente'";
    $result = $conn->query($check_client);
    if ($result->num_rows > 0) {
        
        $sql = "INSERT INTO pedidos (data, id_cliente, observacao, id_forma_pagto, prazo_entrega, id_vendedor)
        VALUES ('$data', '$id_cliente', '$observacao', '$id_forma_pagto', '$prazo_entrega', '$id_vendedor')";

        if ($conn->query($sql) === TRUE) {
            echo "Pedido adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar pedido: " . $conn->error;
        }
    } else {
        // Cliente não encontrado, exibir uma mensagem de erro
        echo "Erro: Cliente não encontrado.";
    }
}

// Fechar conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pedido</title>
</head>
<body>

<h2>Adicionar Pedido</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Data: <input type="date" name="data"><br>
    ID Cliente: <input type="number" name="id_cliente"><br>
    Observação: <input type="text" name="observacao"><br>
    ID Forma de Pagamento: <input type="number" name="id_forma_pagto"><br>
    Prazo de Entrega: <input type="text" name="prazo_entrega"><br>
    ID Vendedor: <input type="number" name="id_vendedor"><br>
    <input type="submit" value="Adicionar">
</form>

</body>
</html>

