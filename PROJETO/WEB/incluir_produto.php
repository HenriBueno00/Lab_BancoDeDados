<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            color: #333;
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
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select,
        input[type="submit"],
        input[type="reset"],
        button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"],
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover,
        button:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
        #btnVoltar {
            background-color: #00BFFF;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            width: auto;
        }

        #btnVoltar:hover {
            background-color: #1E90FF;
        }
    </style>
</head>
<body>
    <h2>Adicionar Produto</h2>
    <?php
    include('ConexaoBD.php');
    $con = mysqli_connect($servidor, $usuario, $senha, $db);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $qtde_estoque = $_POST['qtde_estoque'];
        $preco = $_POST['preco'];
        $unidade_medida = $_POST['unidade_medida'];

        $query = "INSERT INTO produto (nome, qtde_estoque, preco, unidade_medida) 
                  VALUES ('$nome', '$qtde_estoque', '$preco', '$unidade_medida')";

        if (mysqli_query($con, $query)) {
            echo "<p class='success'>Produto cadastrado com sucesso!</p>";
        } else {
            echo "<p class='error'>Erro ao cadastrar produto: " . mysqli_error($con) . "</p>";
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        
        <label for="qtde_estoque">Quantidade em Estoque:</label>
        <input type="number" id="qtde_estoque" name="qtde_estoque">
        
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco">
        
        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida">
        
        <input type="submit" value="Adicionar Produto">
    </form>
    <input id="btnVoltar" type="button" value="Voltar" onclick="window.location.href='Produtos.php'">
</body>
</html>
