<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Nota 1: <input type="number" name="nota1"><br>
  Peso 1: <input type="number" name="peso1"><br>
  Nota 2: <input type="number" name="nota2"><br>
  Peso 2: <input type="number" name="peso2"><br>
  Nota 3: <input type="number" name="nota3"><br>
  Peso 3: <input type="number" name="peso3"><br>
  <input type="submit" value="Calcular Média">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota1 = $_POST["nota1"];
    $peso1 = $_POST["peso1"];
    $nota2 = $_POST["nota2"];
    $peso2 = $_POST["peso2"];
    $nota3 = $_POST["nota3"];
    $peso3 = $_POST["peso3"];

    $mediaPonderada = ($nota1 * $peso1 + $nota2 * $peso2 + $nota3 * $peso3) / ($peso1 + $peso2 + $peso3);

    if ($mediaPonderada >= 7) {
        echo "Aprovado";
    } elseif ($mediaPonderada < 3) {
        echo "Reprovado";
    } else {
        echo "Exame";
    }
}
?>

</body>
</html>
