<!DOCTYPE html>
<html>
<body>

<?php
// Exemplo de valores
$num1 = 4;
$num2 = 6;
$num3 = 8;
$num4 = 10;

$media1 = ($num1 + $num2) / 2;
$media2 = ($num3 + $num4) / 2;
$soma = $media1 + $media2;

if ($soma < 8) {
    echo "<strong>$soma</strong>";
} else {
    echo $soma;
}
?>

</body>
</html>
