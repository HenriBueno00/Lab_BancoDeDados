<?php
include('ConexaoBD.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!mysqli_begin_transaction($con)) {
        die("Falha ao iniciar a transação: " . mysqli_connect_error());
    }
    
    $data = $_POST['data'];
    $id_cliente = $_POST['id_cliente'];
    $observacao = $_POST['observacao'];
    $id_forma_pagto = $_POST['id_forma_pagto'];
    $prazo_entrega = $_POST['prazo_entrega'];
    $id_vendedor = $_POST['id_vendedor'];

    try {
        $sql = "INSERT INTO pedidos (data, id_cliente, observacao, id_forma_pagto, prazo_entrega, id_vendedor)
          VALUES ('$data', $id_cliente, '$observacao', $id_forma_pagto, '$prazo_entrega', $id_vendedor)";
        
        if ($con->query($sql) === TRUE) {
            $id_pedido = $con->insert_id;

            $id_produtos = $_POST['id_produto'];
            $qtdes = $_POST['qtde'];

            foreach ($id_produtos as $index => $id_produto) {
                $qtde = $qtdes[$index];
                $sql_item = "INSERT INTO itens_pedido (id_pedido, id_produto, qtde)
                           VALUES ($id_pedido, $id_produto, $qtde)";
                $con->query($sql_item);
            }

            echo "Pedido salvo com sucesso!";
            mysqli_commit($con);
        } else {
            throw new Exception("Erro ao salvar pedido: " . mysqli_error($con));
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
        mysqli_rollback($con);
    }
    $con->close();
}
?>
