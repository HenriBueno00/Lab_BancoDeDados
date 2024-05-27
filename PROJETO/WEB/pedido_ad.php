<?php
include('ConexaoBD.php');

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $data = $_POST['data'];
    $id_cliente = $_POST['id_cliente'];
    $observacao = $_POST['observacao'];
    $id_forma_pagto = isset($_POST['id_forma_pagto']) ? $_POST['id_forma_pagto'] : null;
    $prazo_entrega = $_POST['prazo_entrega'];
    $id_vendedor = $_POST['id_vendedor'];

    // Verificar se o cliente existe
    $check_client = "SELECT * FROM clientes WHERE id = '$id_cliente'";
    $result = $con->query($check_client);
    
    if ($result->num_rows > 0) {
        // Preparar e executar a inserção do pedido
        $stmt = $con->prepare("INSERT INTO pedidos (data, id_cliente, observacao, id_forma_pagto, prazo_entrega, id_vendedor) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissis", $data, $id_cliente, $observacao, $id_forma_pagto, $prazo_entrega, $id_vendedor);
        
        if ($stmt->execute()) {
            echo "Pedido adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar pedido: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Erro: Cliente não encontrado.";
    }
}

// Consulta para obter todas as formas de pagamento
$sql_formas_pagto = "SELECT id, nome FROM forma_pagto";
$result_formas_pagto = $con->query($sql_formas_pagto);

// Consulta para obter todos os vendedores
$sql_vendedores = "SELECT id, nome FROM vendedor";
$result_vendedores = $con->query($sql_vendedores);
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
        <label for="data">Data:</label>
        <input type="date" id="data" name="data"><br>
        
        <label for="id_cliente">Cliente:</label>
        <select id="id_cliente" name="id_cliente">
            <?php
            if ($result_clientes->num_rows > 0) {
                while($row = $result_clientes->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            }
            ?>
        </select><br>
        
        <label for="observacao">Observação:</label>
        <input type="text" id="observacao" name="observacao"><br>
        
        <label for="id_forma_pagto">Forma de Pagamento:</label>
        <select id="id_forma_pagto" name="id_forma_pagto">
            <?php
            if ($result_formas_pagto->num_rows > 0) {
                while($row = $result_formas_pagto->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            }
            ?>
        </select><br>
        
        <label for="prazo_entrega">Prazo de Entrega:</label>
        <input type="text" id="prazo_entrega" name="prazo_entrega"><br>
        
        <label for="id_vendedor">Vendedor:</label>
        <select id="id_vendedor" name="id_vendedor">
            <?php
            if ($result_vendedores->num_rows > 0) {
                while($row = $result_vendedores->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            }
            ?>
        </select><br>
        
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
