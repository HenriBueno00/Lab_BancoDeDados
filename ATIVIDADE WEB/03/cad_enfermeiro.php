<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Enfermeiro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="reset"]:hover {
            background-color: #45a049;
        }
        #btnVoltar {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 5rem;
            float: left;
            margin-left: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Cadastro de Enfermeiro</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('conexao.php');
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $salario = $_POST["salario"];
        $turno_trabalho = $_POST["turno_trabalho"];
        $id_funcao = $_POST["id_funcao"];

        $query = "INSERT INTO enfermeiro (nome, endereco, numero, bairro, cidade, estado, cpf, rg, telefone, celular, email, salario, turno_trabalho, id_funcao) 
        VALUES ('$nome', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$cpf', '$rg', '$telefone', '$celular', '$email', '$salario', '$turno_trabalho', '$id_funcao')";

        if (mysqli_query($con, $query)) {
            echo "Enfermeiro cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar enfermeiro: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
    ?>
<button id="btnVoltar" onclick="window.location.href = 'enfermeiro.php'">Voltar</button>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <label for="endereco">Endereço:</label><br>
        <input type="text" id="endereco" name="endereco" required><br>
        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero"><br>
        <label for="bairro">Bairro:</label><br>
        <input type="text" id="bairro" name="bairro"><br>
        <label for="cidade">Cidade:</label><br>
        <input type="text" id="cidade" name="cidade" required><br>
        <label for="estado">Estado:</label><br>
        <select id="estado" name="estado" required>
            <option value="">Selecione um estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" maxlength="11" pattern="\d{11}" required><br>
        <label for="rg">RG:</label><br>
        <input type="text" id="rg" name="rg" maxlength="9" required><br>
        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" maxlength="15"><br>
        <label for="celular">Celular:</label><br>
        <input type="text" id="celular" name="celular" maxlength="11" pattern="\d{11}" placeholder="(XX)XXXXX-XXXX" required><br>
        <label for="email">Email:</label>
    <input type="email" id="email" name="email" required style="width: 100%;
    padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: 
    border-box; font-size: 16px; display: inline-block;"> <br>
        <label for="salario">Salário:</label><br>
        <input type="text" id="salario" name="salario" required><br>
        <label for="turno_trabalho">Turno de Trabalho:</label><br>
        <select id="turno_trabalho" name="turno_trabalho" required>
            <option value="">Selecione o turno de trabalho</option>
            <option value="Manhã">Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
        </select><br>
        <label for="id_funcao">Função:</label><br>
        <select id="id_funcao" name="id_funcao" required>
            <option value="">Selecione a função</option>
            <?php
            include('conexao.php');
            $query_funcoes = "SELECT id, descricao FROM funcao";
            $result_funcoes = mysqli_query($con, $query_funcoes);
            while ($row_funcao = mysqli_fetch_assoc($result_funcoes)) {
                echo "<option value='" . $row_funcao['id'] . "'>" . $row_funcao['descricao'] . "</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
