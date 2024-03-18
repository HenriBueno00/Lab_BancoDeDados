<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Valor da compra: <input type="number" name="valorCompra" step="0.01"><br>
  <input type="submit" value="Calcular Valor de Venda">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valorCompra = $_POST["valorCompra"];

    if ($valorCompra < 200) {
        $lucro = $valorCompra * 0.45;
    } else {
        $lucro = $valorCompra * 0.30;
    }
    $valorVenda = $valorCompra + $lucro;

    echo "O valor da venda é R$ " . number_format($valorVenda, 2, ',', '.');
}
?>

</body>
</html>
