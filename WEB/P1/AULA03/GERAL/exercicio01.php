<!DOCTYPE html>
<html>
<body>

<?php
$numero = 5; // Substitua 5 pelo número que deseja calcular o fatorial
$fatorial = 1;

for ($i = 1; $i <= $numero; $i++) {
    $fatorial *= $i;
}

echo "O fatorial de $numero é $fatorial.";
?>

</body>
</html>
