<?php
session_start();
include_once("ConexaoBD.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf_cnpj = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
    $salario = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_STRING);

    $query_cliente = "UPDATE clientes SET 
                nome='$nome', 
                endereco='$endereco', 
                numero='$numero', 
                bairro='$bairro', 
                cidade='$cidade', 
                estado='$estado', 
                email='$email', 
                cpf_cnpj='$cpf_cnpj', 
                rg='$rg', 
                telefone='$telefone', 
                celular='$celular', 
                data_nasc='$data_nasc', 
                salario='$salario' 
              WHERE id='$id'";

    $resultado_cliente = mysqli_query($con, $query_cliente);

    if ($resultado_cliente && mysqli_affected_rows($con) > 0) {
        $_SESSION['msg'] = "<p style='color:green;'>Dados atualizados com sucesso.</p>";
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar os dados.</p>";
    }

    header("Location: ConsultarCliente.php");
    exit();
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Requisição inválida.</p>";
    header("Location: ConsultarClientez.php");
    exit();
}
?>
