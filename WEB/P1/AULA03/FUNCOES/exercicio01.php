<?php
function calculadora($num1, $num2, $opcao) {
    switch ($opcao) {
        case 1: // Soma
            return $num1 + $num2;
        case 2: // Subtração
            return $num1 - $num2;
        case 3: // Multiplicação
            return $num1 * $num2;
        case 4: // Divisão
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Erro: Divisão por zero!";
            }
        case 5: // Raiz Quadrada do primeiro número
            return sqrt($num1);
        default:
            return "Opção inválida.";
    }
}

// Exemplo de uso
$num1 = 25;
$num2 = 5;
$opcao = 5; // Altere aqui para testar as diferentes operações

$resultado = calculadora($num1, $num2, $opcao);
echo "Resultado: $resultado";
?>
