<?php
session_start();
include_once("ConexaoBD.php");

// Verifica se foi passado o parâmetro 'id' via GET
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Query para selecionar os dados do cliente com o ID especificado
    $query = "SELECT * FROM clientes WHERE id = '$id'";
    
    // Executa a query
    $resultado = mysqli_query($con, $query);

    // Verifica se encontrou o cliente com o ID especificado
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Extrai os dados do cliente
        $row = mysqli_fetch_assoc($resultado);
        $nome = $row['nome'];
    } else {
        // Se não encontrou o cliente, redireciona para a página de listagem com uma mensagem de erro
        $_SESSION['msg'] = "<p style='color:red;'>Cliente não encontrado.</p>";
        header("Location: ConsultarClientes.php");
        exit();
    }
} else {
    // Se não foi passado o parâmetro 'id' via GET, redireciona para a página de listagem com uma mensagem de erro
    $_SESSION['msg'] = "<p style='color:red;'>ID não especificado.</p>";
    header("Location: ConsultarClientes.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Cliente</title>
    <style>
        /* Estilos CSS aqui */
    </style>
</head>
<body>
    <h1>Alteração - Cliente</h1>
    <?php
    // Exibe a mensagem de sessão, se houver
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_edit_cliente.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p><label>Nome: </label><input type="text" name="nome" size="100" value="<?php echo $row['nome']; ?>"></p>
        <!-- Restante do formulário aqui -->
        <p>
            <input type="submit" value="Salvar">
            <input type="button" value="Cancelar" onclick="window.location.href='ConsultarCliente.php'">
            <input type="button" value="Voltar" onclick="window.location.href='ConsultarCliente.php'">
        </p>
    </form>
</body>
</html>
