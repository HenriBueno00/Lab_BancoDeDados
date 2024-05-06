<?php
include_once("conexao.php");
$sql = "SELECT * FROM paciente";
$resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
// Obtendo os dados por meio de um loop while
echo "<h1><p align='center'>Consulta de Pacientes</h1>";
while ($registro = mysqli_fetch_array($resultado)) {
    $id_paciente = $registro['id'];
    echo "Paciente: " . $registro['nome'] . " CPF: " . $registro['cpf'] . " RG: " . $registro['rg'] . "<br>";
    echo "Endereço: " . $registro['endereco'] . " " . $registro['numero'] . " - Bairro: " . $registro['bairro'];
    echo "- Cidade: " . $registro['cidade'] . "/" . $registro['estado'] . "<br>";
    
    $sql2 = "SELECT numero FROM telefone WHERE id_paciente = '$id_paciente'";
    $resu2 = mysqli_query($con, $sql2) or die("Erro ao retornar dados");
    while ($rows = mysqli_fetch_array($resu2)) {
        echo "Telefone: " . $rows['numero'] . "<br>";
    }
    echo "<hr>";
}
mysqli_close($con);
?>
