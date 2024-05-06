<?php
session_start();

$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$nome = $_POST["nome"];
$rua = $_POST["rua"]; 
$numero = $_POST["numero"]; 
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"]; 
$estado = $_POST["estado"];
$telefones = $_POST["telefones"];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include('conexao.php');
mysqli_begin_transaction($con) or die(mysqli_connect_error());

try {
    $query = "INSERT INTO paciente (cpf, rg, nome, endereco, numero, complemento, bairro, cidade, estado) VALUES ('$cpf', '$rg', '$nome', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
    $resu = mysqli_query($con, $query);
    $id_paciente = mysqli_insert_id($con);

    foreach ($telefones as $tel) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel', '$id_paciente')";
        $resul = mysqli_query($con, $query_tel);
    }

    mysqli_commit($con);
    $_SESSION['msg'] = "<p style='color:green;'>Paciente cadastrado com sucesso</p>";
    header("Location: cad_paciente_js.php");
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($con);
    throw $exception;
    $_SESSION['msg'] = "<p style='color:green;'>Paciente não foi cadastrado, verifique</p>";
    header("Location: cad_paciente_js.php");
}

mysqli_close($con);
?>
