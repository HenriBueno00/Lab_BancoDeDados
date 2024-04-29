<!DOCTYPE html>
<html>
<body>

<?php
for ($i = 12; $i <= 100; $i += 3) {
    // Verifica se o número é realmente um múltiplo de 3 e maior que 10
    if ($i % 3 == 0 && $i > 10) {
        echo $i . "<br>";
    }
}
?>

</body>
</html>
