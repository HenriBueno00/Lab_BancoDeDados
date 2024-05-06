<?php
session_start();
include("conexao.php");

$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$salario = $_POST['salario'];
$turno_trabalho = $_POST['turno_trabalho'];
$id_funcao = $_POST['id_funcao'];


$result = "UPDATE enfermeiro SET nome='$nome', cpf='$cpf', endereco='$endereco', numero='$numero', cidade='$cidade', estado='$estado', telefone='$telefone', celular='$celular', email='$email', salario='$salario', turno_trabalho='$turno_trabalho', id_funcao='$id_funcao' WHERE matricula='$matricula'";
$resultado = mysqli_query($con, $result);

if($resultado) {
    $_SESSION['msg'] = "<p style='color:green;'>Enfermeiro alterado com sucesso</p>";
    header("Location: enfermeiro.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao alterar enfermeiro</p>";
    header("Location: editar_enfermeiro.php?matricula=$matricula");
}

mysqli_close($con);
?>
