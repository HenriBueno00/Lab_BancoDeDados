<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vendedores</title>
</head>
<body>
    <h1>Inclusão de Vendedores</h1>
    <?php
    include('conexao.php'); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $perc_comissao = $_POST["perc_comissao"];

        
        $query = "INSERT INTO vendedor (nome, endereco, cidade, estado, celular, email, perc_comissao) VALUES (?, ?, ?, ?, ?, ?, ?)";

        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $nome, $endereco, $cidade, $estado, $celular, $email, $perc_comissao);
        $resu = mysqli_stmt_execute($stmt);

        if ($resu) {
            echo "Inclusão realizada com sucesso!!";
        } else {
            echo "ERRO ao inserir os dados.";
            
        }

        
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
    ?>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" size="80" maxlength="100" name="nome" required><br>
        <p><label>Endereço:</label>
        <input type="text" size="80" maxlength="100" name="endereco" required><br>
        <p><label>Cidade:</label>
        <input type="text" size="40" maxlength="50" name="cidade" required><br><p>
        <label> Estado: </label>
            <select name="estado">
                <option value="SP"> São Paulo </option>
                <option value="MG"> Minas Gerais </option>
                <option value="PR"> Paraná </option>
                <option value="RJ"> Rio de Janeiro </option>
                <option value="BA"> Bahia</option>
                <option value="SC"> Santa Catarina</option>
                <option value="RS"> Rio Grande do Sul</option>
                <option value="CE"> Ceara</option>
                <option value="PE"> Pernambuco</option>
                <option value="AM"> Amazonas</option>
            </select>
        <p><label>Celular:</label>
        <input type="tel" maxlength="12" name="celular"><br>
        <p><label>Email:</label>
        <input type="email" size="80" maxlength="100" name="email"><br>
        <p><label>Percentual de Comissão:</label>
        <input type="number" min="0" max="100" step="0.01" name="perc_comissao" required><br><p>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
