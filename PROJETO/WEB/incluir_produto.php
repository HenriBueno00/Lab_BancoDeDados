<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<body>
    <h2>Adicionar Produto</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nome"><br><br>
        Quantidade em Estoque: <input type="number" name="qtde_estoque"><br><br>
        Preço: <input type="number" step="0.01" name="preco"><br><br>
        Unidade de Medida: <input type="text" name="unidade_medida"><br><br>
        <input type="submit" value="Adicionar Produto">
    </form>
</body>
</html>
