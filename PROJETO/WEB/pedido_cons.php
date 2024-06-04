<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Consulta de Pedidos</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script>
    function toggleItens(pedidoId) {
      var x = document.getElementById("itens-" + pedidoId);
      var btn = document.getElementById("btn-" + pedidoId);
      if (x.style.display === "none") {
        x.style.display = "table-row";
        btn.textContent = "Ocultar Itens";
      } else {
        x.style.display = "none";
        btn.textContent = "Ver Itens";
      }
    }
  </script>
</head>
<body>
  <?php
  include('ConexaoBD.php');
  try {
    $con->begin_transaction();

    $data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
    $data_fim = isset($_POST['data_fim']) ? $_POST['data_fim'] : '';
    $sql = "SELECT p.*, c.nome AS nome_cliente, v.nome AS nome_vendedor
            FROM pedidos p
            INNER JOIN clientes c ON p.id_cliente = c.id
            INNER JOIN vendedor v ON p.id_vendedor = v.id";

    if ($data_inicio && $data_fim) {
      $sql .= " WHERE p.data BETWEEN '$data_inicio' AND '$data_fim'";
    }

    $result = $con->query($sql);

    if (!$result) {
      throw new Exception("Erro ao consultar pedidos: " . $con->error);
    }

    $con->commit();
  } catch (Exception $e) {
    $con->rollback();
    echo "Falha ao consultar pedidos: " . $e->getMessage();
    exit;
  }
  ?>

  <form method="POST">
    <h2>Filtro de Período</h2>
    <label for="data_inicio">Data Início:</label>
    <input type="date" id="data_inicio" name="data_inicio" value="<?= $data_inicio ?>"><br>
    
    <label for="data_fim">Data Fim:</label>
    <input type="date" id="data_fim" name="data_fim" value="<?= $data_fim ?>"><br><br>
    
    <button type="submit">Filtrar</button>
  </form>

  <h2>Consulta de Pedidos</h2>
  <table border="1">
    <thead>
      <tr>
        <th>ID Pedido</th>
        <th>Data</th>
        <th>Cliente</th>
        <th>Observação</th>
        <th>Forma de Pagamento</th>
        <th>Prazo de Entrega</th>
        <th>Vendedor</th>
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
          echo "<td>{$row['nome_cliente']}</td>";
          echo "<td>{$row['observacao']}</td>";
          echo "<td>{$row['id_forma_pagto']}</td>";
          echo "<td>{$row['prazo_entrega']}</td>";
          echo "<td>{$row['nome_vendedor']}</td>";
          echo "<td><button type='button' id='btn-{$row['id']}' onclick='toggleItens({$row['id']})'>Ver Itens</button></td>";
          echo "</tr>";
          echo "<tr id='itens-{$row['id']}' style='display: none;'><td colspan='8'>";
          echo "<table border='1' width='100%'><tr><th>Produto</th><th>Quantidade</th></tr>";

          $sql_itens = "SELECT ip.*, pr.nome AS nome_produto
                        FROM itens_pedido ip
                        INNER JOIN produto pr ON ip.id_produto = pr.id
                        WHERE ip.id_pedido = {$row['id']}";

          try {
            $con->begin_transaction();

            $result_itens = $con->query($sql_itens);

            if (!$result_itens) {
              throw new Exception("Erro ao consultar itens do pedido: " . $con->error);
            }

            if ($result_itens->num_rows > 0) {
              while($item = $result_itens->fetch_assoc()) {
                echo "<tr><td>{$item['nome_produto']}</td><td>{$item['qtde']}</td></tr>";
              }
            } else {
              echo "<tr><td colspan='2'>Nenhum item encontrado</td></tr>";
            }

            $con->commit();
          } catch (Exception $e) {
            $con->rollback();
            echo "Falha ao consultar itens do pedido: " . $e->getMessage();
            exit;
          }
          echo "</table></td></tr>";
        }
      } else {
        echo "<tr><td colspan='8'>Nenhum pedido encontrado</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <?php
  $con->close();
  ?>
</body>
</html>
