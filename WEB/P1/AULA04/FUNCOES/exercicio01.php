<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body>

<form method="post">
    <label for="num1">Digite o primeiro número:</label>
    <input type="text" name="num1" id="num1"><br><br>

    <label for="num2">Digite o segundo número:</label>
    <input type="text" name="num2" id="num2"><br><br>

    <label for="opcao">Escolha a operação:</label>
    <select name="opcao" id="opcao">
        <option value="1">Soma</option>
        <option value="2">Subtração</option>
        <option value="3">Multiplicação</option>
        <option value="4">Divisão</option>
        <option value="5">Raiz Quadrada</option>
    </select><br><br>

    <input type="submit" value="Calcular">
</form>

<?php
function calculadora($num1, $num2, $opcao) {
    switch ($opcao) {
        case 1: 
            return $num1 + $num2;
        case 2: 
            return $num1 - $num2;
        case 3: 
            return $num1 * $num2;
        case 4: 
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Erro: Divisão por zero!";
            }
        case 5: 
            return sqrt($num1);
        default:
            return "Opção inválida.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $opcao = $_POST["opcao"];

    $resultado = calculadora($num1, $num2, $opcao);
    echo "Resultado: $resultado";
}
?>

</body>
</html>

