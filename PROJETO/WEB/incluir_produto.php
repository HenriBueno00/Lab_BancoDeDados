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
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        label {
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            padding: 8px;
            width: 300px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p.success {
            color: green;
            text-align: center;
        }
        p.error {
            color: red;
            text-align: center;
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
    <input type="button" value="Voltar" onclick="window.location.href='index.php'">
</body>
</html>
