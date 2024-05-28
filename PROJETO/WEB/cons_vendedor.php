<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Vendedores</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h3>Filtrar por:</h3><br>
    <form action="" method="POST">
        <label>Nome:</label><input type="text" name="nome" size="50"/>
        <label>Endereco:</label><input type="text" name="endereco" size="30" />
        <label>PERC_COMISSAO:</label><input type="text" name="perc_comissao" size="10" />
        <p><input type="submit" name="SendPesq" value="Pesquisar">
        <button id="btnVoltar" type="button" onclick="window.location.href='Vendedores.php'">Voltar</button>
    </form>

    <?php
    include("ConexaoBD.php");

    $SendPesq = filter_input(INPUT_POST, 'SendPesq', FILTER_SANITIZE_STRING);
    if ($SendPesq) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
        $perc_comissao = filter_input(INPUT_POST, 'perc_comissao', FILTER_SANITIZE_STRING);
        
        $query = "SELECT * FROM vendedor WHERE 1=1";

        if (!empty($nome)) {
            $query .= " AND nome LIKE '%$nome%'";
        }
        if (!empty($endereco)) {
            $query .= " AND endereco = '$endereco'";
        }
        if(!empty($perc_comissao)) {
            $query .= " AND perc_comissao = '$perc_comissao'";
        }

        $resultado = mysqli_query($con, $query) or die("Erro ao retornar dados");
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "Nome: " . $row['nome'] . "<br>";

            
            if (isset($row['endereco'])) {
                echo "Endereco: " . $row['endereco'] . "<br>";
            }
            
            if (isset($row['perc_comissao'])) {
                echo "perc_comissao: " . $row['perc_comissao'] . "<br>";
            }

            echo "<br>";
        }
    }
    ?>
</body>
</html>





