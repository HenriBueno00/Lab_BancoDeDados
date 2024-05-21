<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Produto</title>
</head>
<body>
    <h2>Excluir Produto</h2>

    <?php
    // Inclui o arquivo de conexão
    include_once 'ConexaoBD.php';

    // Inicializa as variáveis
    $id = $nome = '';

    // Verifica se o ID do produto foi passado via GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para obter os dados do produto
        $sql = "SELECT nome FROM produto WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $nome);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        } else {
            echo "Erro ao preparar a query: " . mysqli_error($con);
        }
    }

    // Processamento da exclusão do produto
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        // Exclui o produto do banco de dados
        if (!empty($id)) {
            $sql = "DELETE FROM produto WHERE id = ?";
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Produto excluído com sucesso.";
                } else {
                    echo "Erro ao excluir produto: " . mysqli_error($con);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Erro ao preparar a query: " . mysqli_error($con);
            }
        } else {
            echo "ID do produto é obrigatório.";
        }

        // Fechar a conexão
        mysqli_close($con);
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <?php if (!empty($nome)) { ?>
            <p>Tem certeza que deseja excluir o produto: <?php echo htmlspecialchars($nome); ?>?</p>
        <?php } else { ?>
            <p>Produto não encontrado.</p>
        <?php } ?>
        <button type="button" onclick="history.back()">Cancelar</button>
        <a href="consultar_produtos.php"><button type="button">Voltar</button></a>
        <input type="submit" value="Excluir Produto">
    </form>
</body>
</html>
