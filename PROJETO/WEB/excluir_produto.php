<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
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
            width: 400px;
            margin: 0 auto;
            text-align: center; 
        }
        p {
            text-align: center;
        }
        input[type="submit"], input[type="button"] {
            background-color: #f44336;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 50%;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #d32f2f;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
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
        .popup, .overlay {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Excluir Produto</h2>
    <?php
    session_start();
    include_once ('ConexaoBD.php');
    $id = $nome = '';
    $produtoExcluido = false;

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "SELECT nome FROM produto WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $nome);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo "<p class='error'>Erro ao preparar a query: " . mysqli_error($con) . "</p>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($id)) {
            $sql_delete_related = "DELETE FROM itens_pedido WHERE id_produto = ?";
            $stmt_related = mysqli_prepare($con, $sql_delete_related);
            if ($stmt_related) {
                mysqli_stmt_bind_param($stmt_related, "i", $id);
                if (!mysqli_stmt_execute($stmt_related)) {
                    echo "<p class='error'>Erro ao excluir itens relacionados: " . mysqli_error($con) . "</p>";
                }
                mysqli_stmt_close($stmt_related);
            } else {
                echo "<p class='error'>Erro ao preparar a query para excluir itens relacionados: " . mysqli_error($con) . "</p>";
            }

            $sql = "DELETE FROM produto WHERE id = ?";
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<p class='success'>Produto excluído com sucesso.</p>";
                    echo '<button onclick="window.location.href=\'consultar_produtos.php\'">Ok</button>';
                    $produtoExcluido = true;
                } else {
                    echo "<p class='error'>Erro ao excluir produto: " . mysqli_error($con) . "</p>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<p class='error'>Erro ao preparar a query: " . mysqli_error($con) . "</p>";
            }
        } else {
            echo "<p class='error'>ID do produto é obrigatório.</p>";
        }
        mysqli_close($con);
    }
    ?>
    <?php if (!$produtoExcluido) { ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <?php if (!empty($nome)) { ?>
                <p>Tem certeza que deseja excluir o produto: <?php echo htmlspecialchars($nome); ?>?</p>
                <input type="submit" value="Excluir Produto" onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                <input type="button" value="Cancelar" onclick="window.location='consultar_produtos.php'">
            <?php } else { ?>
                <p>Produto não encontrado.</p>
                <a href="consultar_produtos.php" class="button">Voltar</a>
            <?php } ?>
        </form>
    <?php } ?>
</body>
</html>
