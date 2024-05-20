<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
</head>
<body>
    <h2>Alterar Produto</h2>

    <?php
    // Inclui o arquivo de conexão
    include_once 'ConexaoBD.php';

    // Inicializa variáveis
    $id = $nome = $qtde_estoque = $preco = $unidade_medida = '';

    // Verifica se o ID do produto foi passado via GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para obter os dados do produto
        $sql = "SELECT nome, qtde_estoque, preco, unidade_medida FROM produto WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $nome, $qtde_estoque, $preco, $unidade_medida);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo "Erro ao preparar a query: " . mysqli_error($con);
        }
    }

    // Processamento da alteração do produto
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $qtde_estoque = $_POST['qtde_estoque'];
        $preco = $_POST['preco'];
        $unidade_medida = $_POST['unidade_medida'];

        // Atualiza os dados do produto no banco de dados
        if (!empty($id) && !empty($nome) && !empty($qtde_estoque) && !empty($preco) && !empty($unidade_medida)) {
            $sql = "UPDATE produto SET nome = ?, qtde_estoque = ?, preco = ?, unidade_medida = ? WHERE id = ?";
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sidsi", $nome, $qtde_estoque, $preco, $unidade_medida, $id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Produto alterado com sucesso.";
                    echo '<br><form action="consultar_produtos.php"><input type="submit" value="Voltar"></form>';
                } else {
                    echo "Erro ao alterar produto: " . mysqli_error($con);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Erro ao preparar a query: " . mysqli_error($con);
            }
        } else {
            echo "Todos os campos são obrigatórios.";
        }

        // Fechar a conexão
        mysqli_close($con);
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br><br>
        Quantidade em Estoque: <input type="number" name="qtde_estoque" value="<?php echo htmlspecialchars($qtde_estoque); ?>"><br><br>
        Preço: <input type="number" step="0.01" name="preco" value="<?php echo htmlspecialchars($preco); ?>"><br><br>
        Unidade de Medida: <input type="text" name="unidade_medida" value="<?php echo htmlspecialchars($unidade_medida); ?>"><br><br>
        <button type="button" onclick="history.back()">Cancelar</button>
        <input type="submit" value="Alterar Produto">
    </form>
</body>
</html>
