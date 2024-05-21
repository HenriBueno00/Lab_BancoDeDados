<?php
session_start();
include_once("ConexaoBD.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $salario = filter_input(INPUT_POST, 'salario', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if (!empty($id) && !empty($nome) && !empty($endereco) && !empty($numero) && !empty($bairro) &&
        !empty($cidade) && !empty($estado) && !empty($cpf_cnpj) && !empty($rg) &&
        !empty($celular) && !empty($data_nasc) && !empty($salario)) {
        
        $query = "UPDATE clientes SET 
            nome = '$nome', 
            endereco = '$endereco', 
            numero = '$numero', 
            bairro = '$bairro', 
            cidade = '$cidade', 
            estado = '$estado', 
            email = '$email', 
            cpf_cnpj = '$cpf_cnpj', 
            rg = '$rg', 
            telefone = '$telefone', 
            celular = '$celular', 
            data_nasc = '$data_nasc', 
            salario = '$salario' 
            WHERE id = '$id'";
        
        if (mysqli_query($con, $query)) {
            $_SESSION['msg'] = "<p style='color:green;'>Cliente atualizado com sucesso.</p>";
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o cliente.</p>";
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Preencha todos os campos obrigatórios.</p>";
    }
    
    header("Location: AlterarCliente.php?id=$id");
    exit();
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Requisição inválida.</p>";
    header("Location: ConsultarCliente.php");
    exit();
}
?>
