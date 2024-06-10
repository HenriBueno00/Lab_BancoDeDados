<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Consulta de Pedidos</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }
    input, select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .button-filter, input[type="reset"], #btnVoltar {
        width: 100%;
        background-color: #28a745;
        color: white;
        border: none;
        padding: 15px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
    }
    .button-filter:hover, input[type="reset"]:hover, #btnVoltar:hover {
        background-color: #218838;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    a {
        text-decoration: none;
        color: #007bff;
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #007bff;
        color: white;
    }
    a:hover {
        background-color: #0056b3;
    }
    #btnVoltar {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 20px;
    }
  </style>
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
    echo "Erro ao consultar pedidos: " . $con->error;
    exit;
  }
  ?>

  <form method="POST">
    <h2>Filtro por Período</h2>
    <label for="data_inicio">Data Início:</label>
    <input type="date" id="data_inicio" name="data_inicio" value="<?= $data_inicio ?>"><br>
    
    <label for="data_fim">Data Fim:</label>
    <input type="date" id="data_fim" name="data_fim" value="<?= $data_fim ?>"><br><br>
    
    <button type="submit" class="button-filter">Filtrar</button>
    <a href="Pedidos.php" class="button">Voltar</a>
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

          $result_itens = $con->query($sql_itens);

          if (!$result_itens) {
            echo "Erro ao consultar itens do pedido: " . $con->error;
            exit;
          }

          if ($result_itens->num_rows > 0) {
            while($item = $result_itens->fetch_assoc()) {
              echo "<tr><td>{$item['nome_produto']}</td><td>{$item['qtde']}</td></tr>";
            }
          } else {
            echo "<tr><td colspan='2'>Nenhum item encontrado</td></tr>";
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
