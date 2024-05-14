<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<body>
    <h2>Adicionar Produto</h2>
    <?php
    // Incluindo o arquivo de conexão
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $db = 'loja';
    $con = mysqli_connect($servidor, $usuario, $senha, $db);
    
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura os dados do formulário
        $nome = $_POST['nome'];
        $qtde_estoque = $_POST['qtde_estoque'];
        $preco = $_POST['preco'];
        $unidade_medida = $_POST['unidade_medida'];

        // Prepara e executa a query de inserção
        $query = "INSERT INTO produto (nome, qtde_estoque, preco, unidade_medida) 
                  VALUES ('$nome', '$qtde_estoque', '$preco', '$unidade_medida')";

        if (mysqli_query($con, $query)) {
            echo "<p style='color:green;'>Produto cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar produto: " . mysqli_error($con) . "</p>";
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nome"><br><br>
        Quantidade em Estoque: <input type="number" name="qtde_estoque"><br><br>
        Preço: <input type="number" step="0.01" name="preco"><br><br>
        Unidade de Medida: <input type="text" name="unidade_medida"><br><br>
        <input type="submit" value="Adicionar Produto">
    </form>
</body>
</html>

