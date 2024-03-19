<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULA 05</title>
</head>
<body>
    <p class="">
        <h1>Especialidade Medica</h1>
    </p>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include('conexao.php');
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];

        $query = "INSERT INTO especialidade(descricao,sigla) VALUES ('$nome','$sigla')";
        $resu=mysqli_query($con,$query);

        if (mysqli_insert_id($con)){
            echo "Inclusão feita com sucesso";
        }else{
            echo "Erro ao inserir os dados".mysqli_connect_error();
        }
        mysqli_close($con);
    }
    ?>
    <form method="post">
        <div>
            <p><label for="">Nome:</label></p>
            <input type="text" name="nome" id="nome" size="100" maxlength="100" required>
        </div>
        <div>
            <p><label for="">Sigla</label></p>
            <input type="text" name="sigla" id="sigla" size="3" maxlength="3" required>
        </div>
        <div>
            <p><input type="submit" value="Enviar"></p>
            <p><input type="reset" value="Limpar"></p>
        </div>
    </form>
    <form action="exibir_tabela.php" method="post">
        <input type="submit" value="Exibir Tabela">
    </form>
</body>
</html>