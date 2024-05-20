<?php
session_start();
include_once("ConexaoBD.php");

// Verifica se foi passado o parâmetro 'id' via GET ou POST
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Verifica se o ID é válido
    if ($id) {
        // Query para selecionar o cliente com o ID especificado
        $query = "SELECT nome FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($con, $query);

        // Verifica se encontrou o cliente
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $nome = $row['nome'];
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Cliente não encontrado.</p>";
            header("Location: ConsultarCliente.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>ID inválido.</p>";
        header("Location: ConsultarCliente.php");
        exit();
    }
} elseif (isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Verifica se o ID é válido
    if ($id) {
        // Query para excluir o cliente
        $query = "DELETE FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($con, $query);

        // Verifica se a exclusão foi bem-sucedida
        if ($resultado) {
            $_SESSION['msg'] = "<p style='color:green;'>Cliente excluído com sucesso.</p>";
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o cliente.</p>";
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>ID inválido.</p>";
    }

    // Redireciona de volta para a página de consulta de clientes
    header("Location: ConsultarCliente.php");
    exit();
} else {
    $_SESSION['msg'] = "<p style='color:red;'>ID não especificado.</p>";
    header("Location: ConsultarCliente.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
</head>
<body>
    <h2>Excluir Cliente</h2>
    <p>Tem certeza que deseja excluir o cliente <strong><?php echo htmlspecialchars($nome); ?></strong>?</p>
    <form method="post" action="DeletarCliente.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <input type="submit" value="Sim">
        <button type="button" onclick="window.history.back();">Não</button>
    </form>
</body>
</html>
