<!DOCTYPE html>
<html>
<head>
    <title>Exibição dos Meses</title>
</head>
<body>

<form method="post">
    <label for="mes">Digite o número do mês (1 a 12):</label>
    <input type="number" name="mes" id="mes" min="1" max="12"><br><br>
    <input type="submit" value="Exibir">
</form>

<?php
$meses = array(
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',   
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_mes = $_POST["mes"];

    if ($numero_mes >= 1 && $numero_mes <= 12) {
        echo "Mês selecionado: $meses[$numero_mes]";
    } else {
        echo "Por favor, insira um número válido de mês (1 a 12).";
    }
}
?>

</body>
</html>
