<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médico</title>
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
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        select {
            cursor: pointer;
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
    <h1>Cadastro de Médico</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('conexao.php');

        // Recuperar os dados do formulário
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $crm = $_POST["crm"];
        $salario = $_POST["salario"];
        $celular = $_POST["celular"];
        $cod_esp = $_POST["cod_esp"];

        // Montar a query SQL para inserir os dados na tabela
        $query = "INSERT INTO medico (nome, cpf, endereco, numero, bairro, cidade, estado, CRM, salario, celular, cod_esp) 
        VALUES ('$nome', '$cpf', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$crm', '$salario', '$celular', '$cod_esp')";

        // Executar a query
        if (mysqli_query($con, $query)) {
            echo "Médico cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar médico: " . mysqli_error($con);
        }

        // Fechar a conexão
        mysqli_close($con);
    }
    ?>
    <button id="btnVoltar" onclick="history.back()">Voltar</button>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" maxlength="11" pattern="\d{11}"  required><br>

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

        <label for="crm">CRM:</label><br>
        <input type="text" id="crm" name="crm" maxlength="20" required><br>

        <label for="salario">Salário:</label><br>
        <input type="text" id="salario" name="salario" required><br>

        <label for="celular">Celular:</label><br>
        <input type="text" id="celular" name="celular" maxlength="11" pattern="\d{11}" placeholder="(XX)XXXXX-XXXX" required><br>

        <label for="cod_esp">Especialidade:</label><br>
        <select id="cod_esp" name="cod_esp" required>
            <option value="">Selecione uma especialidade</option>
            <?php
            include('conexao.php');
            $query_especialidades = "SELECT id, descricao FROM especialidade";
            $result_especialidades = mysqli_query($con, $query_especialidades);

            while ($row_especialidade = mysqli_fetch_assoc($result_especialidades)) {
                echo "<option value='" . $row_especialidade['id'] . "'>" . $row_especialidade['descricao'] . "</option>";
            }
            ?>
        </select><br>

        <input id="submitBtn"type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
