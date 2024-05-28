<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Consulta de Pedidos</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <?php
  // Incluir o arquivo de conexão com o banco de dados
  include('ConexaoBD.php');

  $data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
  $data_fim = isset($_POST['data_fim']) ? $_POST['data_fim'] : '';

  // Consulta para obter os pedidos
  $sql = "SELECT p.*, c.nome AS nome_cliente, v.nome AS nome_vendedor
          FROM pedidos p
          INNER JOIN clientes c ON p.id_cliente = c.id
          INNER JOIN vendedor v ON p.id_vendedor = v.id";

  if ($data_inicio && $data_fim) {
    $sql .= " WHERE p.data BETWEEN '$data_inicio' AND '$data_fim'";
  }

  $result = $con->query($sql);
  ?>
  
  <form method="POST" action="consulta_pedidos.php">
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
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='7'>Nenhum pedido encontrado</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <?php
  $con->close();
  ?>
</body>
</html>
