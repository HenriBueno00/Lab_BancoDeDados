<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$db = 'Clinica';
$con = mysqli_connect($servidor,$usuario,$senha,$db);
if (!$con){
    print("erro na conexao com mysql");
    print("ERRO: ".mysqli_connect_error());
    exit;
}
?>