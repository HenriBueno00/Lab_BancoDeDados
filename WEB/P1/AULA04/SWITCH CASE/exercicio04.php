<!DOCTYPE html>
<html>
<head>
    <title>Verificador de Letra</title>
</head>
<body>

<form method="post">
    <label for="letra">Digite uma letra:</label>
    <input type="text" name="letra" id="letra" maxlength="1"><br><br>
    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letra = strtolower($_POST["letra"]); // Convertendo a letra para minúscula

    switch ($letra) {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
            echo "$letra é uma vogal.";
            break;
        default:
            if (ctype_alpha($letra)) {
                echo "$letra é uma consoante.";
            } else {
                echo "Por favor, insira apenas uma letra do alfabeto.";
            }
    }
}
?>

</body>
</html>
