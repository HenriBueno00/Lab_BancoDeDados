<!DOCTYPE html>
<html>
<body>

<form method="post">
    <label for="numero">Digite o número para calcular o fatorial:</label>
    <input type="number" name="numero" id="numero"><br><br>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $fatorial = 1;

    if ($numero >= 0) {
        for ($i = 1; $i <= $numero; $i++) {
            $fatorial *= $i;
        }
        echo "O fatorial de $numero é $fatorial.";
    } else {
        echo "Por favor, insira um número não negativo.";
    }
}
?>

</body>
</html>
