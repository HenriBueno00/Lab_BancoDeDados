<!DOCTYPE html>
<html>
<body>

<?php
$meses = [
    1 => "Janeiro",
    2 => "Fevereiro",
    3 => "Março",
    4 => "Abril",
    5 => "Maio",
    6 => "Junho",
    7 => "Julho",
    8 => "Agosto",
    9 => "Setembro",
    10 => "Outubro",
    11 => "Novembro",
    12 => "Dezembro",
];

// Usando FOR
for ($i = 1; $i <= count($meses); $i++) {
    echo $meses[$i] . "<br>";
}

// Usando FOREACH
foreach ($meses as $numero => $nome) {
    echo "$numero: $nome<br>";
}
?>

</body>
</html>
