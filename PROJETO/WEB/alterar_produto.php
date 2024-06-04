<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
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
        input[type="checkbox"] {
            margin-top: 5px;
        }
        input[type="submit"], button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        button {
            background-color: #f44336;
            color: white;
        }
        button:hover {
            background-color: #e53935;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        a.button:hover {
            background-color: #1976D2;
        }
        p.success {
            color: green;
            text-align: center;
        }
        p.error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Alterar Produto</h2>

    <?php
        include_once('ConexaoBD.php');

        $id = $nome = $qtde_estoque = $preco = $unidade_medida = '';

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT nome, qtde_estoque, preco, unidade_medida, promocao FROM produto WHERE id = ?";
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $nome, $qtde_estoque, $preco, $unidade_medida, $promocao);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
            } else {
                echo "<p class='error'>Erro ao preparar a query: " . mysqli_error($con) . "</p>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $qtde_estoque = $_POST['qtde_estoque'];
            $preco = $_POST['preco'];
            $unidade_medida = $_POST['unidade_medida'];
            $promocao = isset($_POST['promocao']) ? 1 : 0;

            if (!empty($id) && !empty($nome) && isset($qtde_estoque) && isset($preco) && !empty($unidade_medida)) {
                $sql = "UPDATE produto SET nome = ?, qtde_estoque = ?, preco = ?, unidade_medida = ?, promocao = ? WHERE id = ?";
                $stmt = mysqli_prepare($con, $sql);
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sidsii", $nome, $qtde_estoque, $preco, $unidade_medida, $promocao, $id);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<p class='success'>Produto alterado com sucesso.</p>";
                    } else {
                        echo "<p class='error'>Erro ao alterar produto: " . mysqli_error($con) . "</p>";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "<p class='error'>Erro ao preparar a query: " . mysqli_error($con) . "</p>";
                }
            } else {
                echo "<p class='error'>Todos os campos são obrigatórios.</p>";
            }

            mysqli_close($con);
        }
?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
        
        <label for="qtde_estoque">Quantidade em Estoque:</label>
        <input type="number" id="qtde_estoque" name="qtde_estoque" value="<?php echo htmlspecialchars($qtde_estoque); ?>">
        
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo htmlspecialchars($preco); ?>">
        
        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida" value="<?php echo htmlspecialchars($unidade_medida); ?>">
        
        <label for="promocao">Em Promoção:</label>
        <input type="checkbox" id="promocao" name="promocao" value="1" <?php if($promocao) echo 'checked'; ?>>
        
        <input type="submit" value="Alterar Produto">
        <button type="button" onclick="history.back()">Cancelar</button>
        <a href="consultar_produtos.php" class="button">Voltar</a>
    </form>
</body>
</html>
