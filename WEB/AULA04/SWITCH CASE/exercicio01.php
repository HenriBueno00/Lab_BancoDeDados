<!DOCTYPE html>
<html>
<head>
    <title>Formatador de Nomes</title>
</head>
<body>

<form method="post">
    <label for="nome">Seu nome:</label>
    <input type="text" name="nome" id="nome"><br><br>
    <label for="cores">Cores (separadas por vírgula):</label>
    <input type="text" name="cores" id="cores"><br><br>
    <input type="submit" value="Formatar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cores = explode(",", $_POST["cores"]);

    if (!empty($nome) && count($cores) >= 5) {
        for ($i = 0; $i < 5; $i++) {
            $cor = trim($cores[$i % count($cores)]); // Alternar entre as cores
            echo "<font color='$cor'>$nome</font><br>";
        }
    } else {
        echo "Por favor, insira seu nome e pelo menos 5 cores separadas por vírgula.";
    }
}
?>

</body>
</html>
