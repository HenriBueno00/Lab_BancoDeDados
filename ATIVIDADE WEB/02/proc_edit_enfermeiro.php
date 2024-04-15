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
$id_funcao = $_POST['id_funcao'];

$result = "UPDATE enfermeiro SET nome='$nome', cpf='$cpf', endereco='$endereco', numero='$numero', cidade='$cidade', estado='$estado', id_funcao='$id_funcao' WHERE matricula='$matricula'";
$resultado = mysqli_query($con, $result) or die(mysqli_connect_error());

if(mysqli_affected_rows($con) > 0) {
    $_SESSION['msg'] = "<p style='color:green;'>Enfermeiro alterado com sucesso</p>";
    header("Location: enfermeiro.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Enfermeiro não foi alterado, verifique</p>";
    header("Location: enfermeiro.php");
}

mysqli_close($con);
?>
