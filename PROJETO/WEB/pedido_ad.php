<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Pedido de Produtos</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    select {
        width: 100%; /* Agora o campo select ocupará toda a largura do contêiner pai */
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }


    button[type="button"],
    button[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        margin-top: 20px;
        padding: 10px 20px;
        border-radius: 5px;
    }

    button[type="button"]:hover,
    button[type="submit"]:hover {
        background-color: #218838;
    }

    .item {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .item label {
        display: inline-block;
        width: 100px;
    }

    .item select {
        width: calc(70% - 60px);
        margin-right: 10px;
    }

    .item input[type="number"] {
        width: calc(50% - 80px);
        margin-right: 10px;
    }

    .item button {
        margin-top: 5px;
    }

    .button {
        background-color: #00BFFF;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 20px;
        width: auto;
        display: inline-block;
        text-decoration: none;
    }

    .button:hover {
        background-color: #1E90FF;
    }
  </style>
</head>
<body>
  <?php
  include('ConexaoBD.php');
  $sql_produtos = "SELECT id, nome FROM produto";
  $result_produtos = $con->query($sql_produtos);

  $produtos = [];
  if ($result_produtos->num_rows > 0) {
    while($row = $result_produtos->fetch_assoc()) {
      $produtos[] = $row;
    }
  }
  $sql_clientes = "SELECT id, nome FROM clientes";
  $result_clientes = $con->query($sql_clientes);
  $clientes = [];
  if ($result_clientes->num_rows > 0) {
    while($row = $result_clientes->fetch_assoc()) {
      $clientes[] = $row;
    }
  }
  $sql_formas_pagto = "SELECT id, nome FROM forma_pagto";
  $result_formas_pagto = $con->query($sql_formas_pagto);
  $formas_pagto = [];
  if ($result_formas_pagto->num_rows > 0) {
    while($row = $result_formas_pagto->fetch_assoc()) {
      $formas_pagto[] = $row;
    }
  }
  $sql_vendedores = "SELECT id, nome FROM vendedor";
  $result_vendedores = $con->query($sql_vendedores);
  $vendedores = [];
  if ($result_vendedores->num_rows > 0) {
    while($row = $result_vendedores->fetch_assoc()) {
      $vendedores[] = $row;
    }
  }

  $con->close();
  ?>
  
  <form action="processar_pedido.php" method="POST">
    <h2>Pedido</h2>
    <label for="data">Data:</label>
    <input type="date" id="data" name="data" required><br>
    <label for="id_cliente">Cliente:</label>
    <select id="id_cliente" name="id_cliente" required>
      <?php foreach ($clientes as $cliente): ?>
        <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
      <?php endforeach; ?>
    </select><br>
    <label for="observacao">Observação:</label>
    <input type="text" id="observacao" name="observacao"><br>
    <label for="id_forma_pagto">Forma de Pagamento:</label>
    <select id="id_forma_pagto" name="id_forma_pagto">
      <?php foreach ($formas_pagto as $forma_pagto): ?>
        <option value="<?= $forma_pagto['id'] ?>"><?= $forma_pagto['nome'] ?></option>
      <?php endforeach; ?>
    </select><br>
    <label for="prazo_entrega">Prazo de Entrega:</label>
    <input type="text" id="prazo_entrega" name="prazo_entrega"><br>
    <label for="id_vendedor">Vendedor:</label>
    <select id="id_vendedor" name="id_vendedor">
      <option value="" selected></option>
      <?php foreach ($vendedores as $vendedor): ?>
        <option value="<?= $vendedor['id'] ?>"><?= $vendedor['nome'] ?></option>
      <?php endforeach; ?>
    </select><br>
    <h3>Itens do Pedido</h3>
    <div id="itens-container">
      <div class="item">
        <label for="id_produto">Produto:</label>
        <select name="id_produto[]" required>
          <option value="" selected></option>
          <?php foreach ($produtos as $produto): ?>
            <option value="<?= $produto['id'] ?>"><?= $produto['nome'] ?></option>
          <?php endforeach; ?>
        </select>
        <p>
        <label for="qtde">Quantidade:</label>
        <input type="number" name="qtde[]" required>
        <button type="button" onclick="removerItem(this)">Remover</button>
      </div>
    </div>
    <button type="button" onclick="adicionarItem()">Adicionar Item</button><br><br>
    <button type="submit">Salvar Pedido</button>
    <a href="Pedidos.php" class="button">Voltar</a>
  </form>
  <script>
    const produtos = <?php echo json_encode($produtos); ?>;
    function adicionarItem() {
      const itemContainer = document.getElementById('itens-container');
      const newItem = document.createElement('div');
      newItem.className = 'item';
      newItem.innerHTML = `
        <label for="id_produto">Produto:</label>
        <select name="id_produto[]" required>
          <option value="" selected></option>
          ${produtos.map(produto => `<option value="${produto.id}">${produto.nome}</option>`).join('')}
        </select>
        <p>
        <label for="qtde">Quantidade:</label>
        <input type="number" name="qtde[]" required>
        <button type="button" onclick="removerItem(this)">Remover</button>
      `;
      itemContainer.appendChild(newItem);
    }
    function removerItem(button) {
      const item = button.parentElement;
      item.remove();
    }
  </script>
</body>
</html>