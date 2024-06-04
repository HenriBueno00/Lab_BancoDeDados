<?php
include('ConexaoBD.php');

// Verificar se foi solicitada a exclusão de um pedido
if (isset($_GET['excluir'])) {
    $pedido_id = intval($_GET['excluir']);

    // Excluir itens do pedido
    $sql_delete_itens = "DELETE FROM itens_pedido WHERE id_pedido = $pedido_id";
    $con->query($sql_delete_itens);

    // Excluir o pedido
    $sql_delete_pedido = "DELETE FROM pedidos WHERE id = $pedido_id";
    $con->query($sql_delete_pedido);

    // Redirecionar para a mesma página sem o parâmetro de exclusão
    header("Location: cancelarpedido.php");
    exit();
}

// Consulta para obter os pedidos
$sql = "SELECT * FROM pedidos";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
    <script>
        function confirmarExclusao(pedidoId) {
            if (confirm("Você tem certeza que deseja excluir este pedido e seus itens?")) {
                window.location.href = "?excluir=" + pedidoId;
            }
        }
    </script>
</head>
<body>
    
    <h2>Pedidos</h2>
    <table border="1">
        <thead>
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
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['data']}</td>";
                    echo "<td>{$row['id_cliente']}</td>";
                    echo "<td>{$row['observacao']}</td>";
                    echo "<td>{$row['id_forma_pagto']}</td>";
                    echo "<td>{$row['prazo_entrega']}</td>";
                    echo "<td>{$row['id_vendedor']}</td>";
                    echo "<td><a href='CancelarPedido.php?excluir={$row['id']}'>Excluir</a></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhum pedido encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // Fechar a conexão com o banco de dados
    $con->close();
    ?>
</body>
</html>