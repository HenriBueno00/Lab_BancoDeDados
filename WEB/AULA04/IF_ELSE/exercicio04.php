<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Digite um número: <input type="number" name="numero" step="0.01">
  <input type="submit" value="Calcular Raiz Quadrada">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];

    $raizQuadrada = sqrt($numero);

    echo "A raiz quadrada de $numero é " . $raizQuadrada;
}
?>

</body>
</html>
