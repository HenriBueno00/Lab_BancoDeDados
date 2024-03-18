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

    // Verifica se o valor inicial é um número e par
    if (is_numeric($inicio) && $inicio % 2 == 0) {
        for ($i = $inicio; $i <= 100; $i += 2) {
            echo $i . "<br>";
        }
    } else {
        echo "Por favor, insira um número par.";
    }
}
?>

</body>
</html>
