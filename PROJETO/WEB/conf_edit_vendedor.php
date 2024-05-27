<?php
session_start();
include("conexao.php");
$id=$_POST["id"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$perc_comissao = $_POST["perc_comissao"];

$result= "UPDATE vendedor SET nome='$nome', endereco='$endereco',";
$result.= "cidade='$cidade', estado='$estado', email='$email', celular='$celular', perc_comissao='$perc_comissao' WHERE id='$id'";
echo $result;
$resultado = mysqli_query($con, $result) or die(mysqli_connect_error());

if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Vendedor alterado com sucesso</p>";
    header("Location: alter_vendedor.php");
}else{
    $_SESSION['msg'] = "<p style='color:green;'>Vendedor não foi alterado, verifique!</p>";
    header("Location: alter_vendedor.php");
}
msyqli_close($con);

?>