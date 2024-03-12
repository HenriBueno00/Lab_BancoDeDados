<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Digite um número: <input type="number" name="numero">
  <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];

    if ($numero > 0) {
        echo "O número é maior que zero.";
    } elseif ($numero < 0) {
        echo "O número é menor que zero.";
    } else {
        echo "O número é igual a zero.";
    }
}
?>

</body>
</html>
