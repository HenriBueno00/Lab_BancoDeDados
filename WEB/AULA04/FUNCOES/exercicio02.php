<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Fatorial</title>
</head>
<body>

<form method="post">
    <label for="numero">Digite o número para calcular o fatorial:</label>
    <input type="text" name="numero" id="numero"><br><br>
    <input type="submit" value="Calcular">
</form>

<?php
function fatorial($numero) {
    $fatorial = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $fatorial *= $i;
    }
    echo "Fatorial de $numero é $fatorial";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    fatorial($numero);
}
?>

</body>
</html>
