<?php
session_start();
include("conexao.php");
$id_medico=$_POST['id_medico'];
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$endereco=$_POST['endereco'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cod_esp=$_POST['cod_esp'];

$result = "UPDATE medico SET nome='$nome', cpf='$cpf', endereco='$endereco', numero='$numero', cidade='$cidade', estado='$estado', cod_esp='$cod_esp' WHERE id_medico='$id_medico'";
$resultado= mysqli_query($con,$result) or die (mysqli_connect_error());

if(mysqli_affected_rows($con)){
     $_SESSION['msg'] = "<p style='color:green;'>Medico alterado com sucesso</p>";
    header("Location: alter_medico.php");
} else{
     $_SESSION['msg'] = "<p style='color:green;'>Medico nao foi alterado, verifique</p>";
    header("Location: alter_medico.php");
}
mysqli_close($con);
?>