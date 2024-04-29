<?php
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

// Exemplo de uso
$num1 = 3;
$num2 = 7;
$resultado = somaEntreNumeros($num1, $num2);
echo "A soma dos números inteiros entre $num1 e $num2 (inclusive) é: $resultado";
?>
