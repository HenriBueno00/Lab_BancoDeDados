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

// Exemplo de uso
echo verificaPrimo(7);
?>
