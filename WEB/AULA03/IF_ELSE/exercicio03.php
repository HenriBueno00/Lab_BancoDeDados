<!DOCTYPE html>
<html>
<body>

<?php
$valorCompra = 150; // Altere para o valor de compra do produto

if ($valorCompra < 200) {
    $lucro = $valorCompra * 0.45;
} else {
    $lucro = $valorCompra * 0.30;
}
$valorVenda = $valorCompra + $lucro;

echo "O valor da venda é R$ " . number_format($valorVenda, 2, ',', '.');
?>

</body>
</html>
