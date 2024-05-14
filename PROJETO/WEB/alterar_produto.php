<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
</head>
<body>
    <h2>Alterar Produto</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>
        Quantidade em Estoque: <input type="number" name="qtde_estoque" value="<?php echo $qtde_estoque; ?>"><br><br>
        Preço: <input type="number" step="0.01" name="preco" value="<?php echo $preco; ?>"><br><br>
        Unidade de Medida: <input type="text" name="unidade_medida" value="<?php echo $unidade_medida; ?>"><br><br>
        <input type="submit" value="Alterar Produto">
    </form>
</body>
</html>
