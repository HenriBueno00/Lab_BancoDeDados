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
$tel_1 = $_POST["tel_1"];
$tel_2 = $_POST["tel_2"];
$tel_3 = $_POST["tel_3"];
$tel_4 = $_POST["tel_4"];
$tel_5 = $_POST["tel_5"];
$tel_6 = $_POST["tel_6"];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include('conexao.php');
mysqli_begin_transaction($con) or die(mysqli_connect_error());

try {
    $query = "INSERT INTO paciente (cpf, rg, nome, endereco, numero, complemento, bairro, cidade, estado) VALUES ('$cpf', '$rg', '$nome', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";
    $resu = mysqli_query($con, $query);
    $id_paciente = mysqli_insert_id($con);

    if (!empty($tel_1)) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel_1', '$id_paciente')";
        $resu_tel_1 = mysqli_query($con, $query_tel);
    }

    if (!empty($tel_2)) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel_2', '$id_paciente')";
        $resu_tel_2 = mysqli_query($con, $query_tel);
    }

    if (!empty($tel_3)) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel_3', '$id_paciente')";
        $resu_tel_3 = mysqli_query($con, $query_tel);
    }

    if (!empty($tel_4)) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel_4', '$id_paciente')";
        $resu_tel_4 = mysqli_query($con, $query_tel);
    }

    if (!empty($tel_5)) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel_5', '$id_paciente')";
        $resu_tel_5 = mysqli_query($con, $query_tel);
    }

    if (!empty($tel_6)) {
        $query_tel = "INSERT INTO telefone (numero, id_paciente) VALUES ('$tel_6', '$id_paciente')";
        $resu_tel_6 = mysqli_query($con, $query_tel);
    }

    mysqli_commit($con);
    $_SESSION['msg'] = "<p style='color:green;'>Paciente cadastrado com sucesso</p>";
    header("Location: cad_paciente.php");
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($con);
    $_SESSION['msg'] = "<p style='color:red;'>Paciente não foi cadastrado, verifique</p>";
    header("Location: cad_paciente.php");
}

mysqli_close($con);
?>
