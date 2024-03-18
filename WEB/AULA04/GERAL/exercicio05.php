<!DOCTYPE html>
<html>
<body>

<form method="post">
    <label for="inicio">Digite o valor inicial do loop:</label>
    <input type="number" name="inicio" id="inicio"><br><br>
    <input type="submit" value="Executar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inicio = $_POST["inicio"];

    // Verifica se o valor inicial é um número e maior que 10
    if (is_numeric($inicio) && $inicio > 10) {
        for ($i = $inicio; $i <= 100; $i += 3) {
            // Verifica se o número é realmente um múltiplo de 3
            if ($i % 3 == 0) {
                echo $i . "<br>";
            }
        }
    } else {
        echo "Por favor, insira um número válido maior que 10.";
    }
}
?>

</body>
</html>
