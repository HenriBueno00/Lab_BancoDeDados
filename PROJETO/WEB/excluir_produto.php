<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <h2>Excluir Produto</h2>
    <form method="post" action="excluir_produto.php">
        <input type="hidden" name="id">
        Tem certeza que deseja excluir este produto?<br><br>
        <input type="submit" value="Sim">
        <button type="button" onclick="window.history.back();">Não</button>
    </form>
</body>
</html>
