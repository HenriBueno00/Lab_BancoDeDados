<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Pedido de Produtos</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
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
          ${produtos.map(produto => `<option value="${produto.id}">${produto.nome}</option>`).join('')}
        </select>
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