<!DOCTYPE html>
<html>
<body>

<form method="post">
    <label for="num1">Digite o valor de num1:</label>
    <input type="number" name="num1" id="num1"><br><br>
    <label for="num2">Digite o valor de num2:</label>
    <input type="number" name="num2" id="num2"><br><br>
    <label for="num3">Digite o valor de num3:</label>
    <input type="number" name="num3" id="num3"><br><br>
    <label for="num4">Digite o valor de num4:</label>
    <input type="number" name="num4" id="num4"><br><br>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];

    $media1 = ($num1 + $num2) / 2;
    $media2 = ($num3 + $num4) / 2;
    $soma = $media1 + $media2;

    if ($soma < 8) {
        echo "<strong>$soma</strong>";
    } else {
        echo $soma;
    }
}
?>

</body>
</html>
