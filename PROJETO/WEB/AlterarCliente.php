<?php
session_start();
include_once("Conexao.php");

// Verifica se foi passado o parâmetro 'matricula' via GET
if(isset($_GET['matricula'])) {
    $matricula = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    
    // Query para selecionar os dados do enfermeiro com a matrícula especificada
    $query = "SELECT * FROM enfermeiro WHERE matricula = '$matricula'";
    
    // Executa a query
    $resultado = mysqli_query($con, $query);

    // Verifica se encontrou o enfermeiro com a matrícula especificada
    if($resultado && mysqli_num_rows($resultado) > 0) {
        // Extrai os dados do enfermeiro
        $row = mysqli_fetch_assoc($resultado);
        $id_funcao = $row['id_funcao'];
    } else {
        // Se não encontrou o enfermeiro, redireciona para a página de listagem com uma mensagem de erro
        $_SESSION['msg'] = "<p style='color:red;'>Enfermeiro não encontrado.</p>";
        header("Location: AlterarCliente.php");
        exit();
    }
} else {
    // Se não foi passado o parâmetro 'matricula' via GET, redireciona para a página de listagem com uma mensagem de erro
    $_SESSION['msg'] = "<p style='color:red;'>Matrícula não especificada.</p>";
    header("Location: AlterarCliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Enfermeiro</title>
    <style>
        /* Estilos CSS aqui */
    </style>
</head>
<body>
    <h1>Alteração - Enfermeiro</h1>
    <?php
    // Exibe a mensagem de sessão, se houver
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_edit_enfermeiro.php">
        <input type="hidden" name="matricula" value="<?php echo $row['matricula']; ?>">
        <p><label>Nome: </label><input type="text" name="nome" size="100" value="<?php echo $row['nome']; ?>">
        <label>CPF: </label><input type="text" name="cpf" size="30" value="<?php echo $row['cpf']; ?>"></p>
        <!-- Restante do formulário aqui -->
        <p><input type="submit" value="Salvar">
        <input type="button" value="Cancelar" onclick="window.location.href='enfermeiro.php'"></p>
    </form>
</body>
</html>
