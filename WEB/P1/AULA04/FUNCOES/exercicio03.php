<!DOCTYPE html>
<html>
<head>
    <title>Verificador de Números Primos</title>
</head>
<body>

<form method="post">
    <label for="numero">Digite o número para verificar se é primo:</label>
    <input type="text" name="numero" id="numero"><br><br>
    <input type="submit" value="Verificar">
</form>

<?php
function verificaPrimo($numero) {
    if ($numero <= 1) {
        return "$numero não é primo.";
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return "$numero não é primo.";
        }
    }
    return "$numero é primo.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    echo verificaPrimo($numero);
}
?>

</body>
</html>
