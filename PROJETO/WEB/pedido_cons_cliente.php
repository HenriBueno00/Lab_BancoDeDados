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
    h1, h2 {
        text-align: center;
        color: #333;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 20px auto;
    }
    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }
    input[type="text"], input[type="date"], select {
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
        font-size: 16px;
    }
    .button-filter:hover, input[type="reset"]:hover, #btnVoltar:hover {
        background-color: #218838;
    }
    #btnVoltar {
        background-color: #007bff;
        margin-top: 10px;
    }
    #btnVoltar:hover {
        background-color: #0056b3;
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
        color: white;
        padding: 10px 15px;
        border-radius: 4px;
        background-color: #007bff;
    }
    a:hover {
        background-color: #0056b3;
    }
    button {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
    .itens {
        display: none;
    }
  </style>
  <script>
    function toggleItens(pedidoId) {
      var x = document.getElementById("itens-" + pedidoId);
      var btn = document.getElementById("btn-" + pedidoId);
      if (x.style.display === "none") {
        x.style.display = "table-row-group";
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
  $nome_cliente = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : '';

  $sql = "SELECT p.id, p.data, c.nome AS nome_cliente, v.nome AS nome_vendedor 
          FROM pedidos p
          INNER JOIN clientes c ON p.id_cliente = c.id
          INNER JOIN vendedor v ON p.id_vendedor = v.id";

  if ($nome_cliente) {
    $sql .= " WHERE c.nome LIKE '%$nome_cliente%'";
  }

  $result = $con->query($sql);

  if (!$result) {
    echo "Erro ao consultar pedidos: " . $con->error;
    exit;
  }
  ?>

  <form method="POST">
    <h2>Filtro por Nome do Cliente</h2>
    <label for="nome_cliente">Nome do Cliente:</label>
    <input type="text" id="nome_cliente" name="nome_cliente" value="<?= htmlspecialchars($nome_cliente) ?>">
    
    <input type="submit" value="Filtrar" class="button-filter">
    <a href="Pedidos.php" id="btnVoltar">Voltar</a>
  </form>

  <h2>Consulta de Pedidos</h2>
  <table>
    <thead>
      <tr>
        <th>Número do Pedido</th>
        <th>Data</th>
        <th>Nome do Cliente</th>
        <th>Nome do Vendedor</th>
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
          echo "<td>{$row['nome_vendedor']}</td>";
          echo "<td><button type='button' id='btn-{$row['id']}' onclick='toggleItens({$row['id']})'>Ver Itens</button></td>";
          echo "</tr>";
          echo "<tr class='itens' id='itens-{$row['id']}'><td colspan='5'>";
          echo "<table width='100%'><tr><th>Produto</th><th>Preço</th><th>Quantidade</th></tr>";

          $sql_itens = "SELECT ip.qtde, pr.nome AS nome_produto, pr.preco
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
              echo "<tr><td>{$item['nome_produto']}</td><td>{$item['preco']}</td><td>{$item['qtde']}</td></tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Nenhum item encontrado</td></tr>";
          }
          echo "</table></td></tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Nenhum pedido encontrado</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <?php
  $con->close();
  ?>
</body>
</html>
