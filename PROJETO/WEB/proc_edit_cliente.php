<?php
session_start();
include_once("ConexaoBD.php");

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    // Verifica se os campos estão preenchidos
    if (!empty($id) && !empty($nome)) {
        // Query para atualizar os dados do cliente
        $query = "UPDATE clientes SET nome = '$nome' WHERE id = '$id'";
        
        // Executa a query
        if (mysqli_query($con, $query)) {
            $_SESSION['msg'] = "<p style='color:green;'>Cliente atualizado com sucesso.</p>";
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o cliente.</p>";
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Preencha todos os campos.</p>";
    }
    
    // Redireciona para a página de edição
    header("Location: AlterarCliente.php?id=$id");
    exit();
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Requisição inválida.</p>";
    header("Location: ConsultarCliente.php");
    exit();
}
?>
