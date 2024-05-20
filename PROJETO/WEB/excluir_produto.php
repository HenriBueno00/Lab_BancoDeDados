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

    // Processamento da exclusão do produto
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

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
            echo "ID do produto não foi fornecido.";
        }

        // Fechar a conexão
        mysqli_close($con);

        echo '<br><a href="consultar_produtos.php">Voltar à lista de produtos</a>';
    } else {
        // Formulário de confirmação de exclusão
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            echo '
            <form method="post" action="">
                <input type="hidden" name="id" value="' . $id . '">
                Tem certeza que deseja excluir este produto?<br><br>
                <input type="submit" value="Sim">
                <button type="button" onclick="window.history.back();">Não</button>
            </form>';
        } else {
            echo "ID do produto não foi fornecido.";
        }
    }
    ?>
</body>
</html>
