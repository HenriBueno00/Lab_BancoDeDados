<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Número 1: <input type="number" name="num1">
  Número 2: <input type="number" name="num2">
  <input type="submit" value="Calcular Soma">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    function somaEntreNumeros($num1, $num2) {
        $soma = 0;
        // Garantir que $num1 seja sempre menor que $num2
        if ($num1 > $num2) {
            // Troca os valores de $num1 e $num2
            $temp = $num1;
            $num1 = $num2;
            $num2 = $temp;
        }
        for ($i = $num1; $i <= $num2; $i++) {
            $soma += $i;
        }
        return $soma;
    }

    $resultado = somaEntreNumeros($num1, $num2);
    echo "A soma dos números inteiros entre $num1 e $num2 (inclusive) é: $resultado";
}
?>

</body>
</html>
