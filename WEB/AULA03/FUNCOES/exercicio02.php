<?php
function fatorial($numero) {
    $fatorial = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $fatorial *= $i;
    }
    echo "Fatorial de $numero é $fatorial";
}

// Exemplo de uso
fatorial(5);
?>
