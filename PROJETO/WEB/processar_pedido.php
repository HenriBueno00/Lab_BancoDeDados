<?php
include('ConexaoBD.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = $_POST['data'];
  $id_cliente = $_POST['id_cliente'];
  $observacao = $_POST['observacao'];
  $id_forma_pagto = $_POST['id_forma_pagto'];
  $prazo_entrega = $_POST['prazo_entrega'];
  $id_vendedor = $_POST['id_vendedor'];

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
  } else {
    echo "Erro: " . $sql . "<br>" . $con->error;
  }
}

$con->close();
?>
