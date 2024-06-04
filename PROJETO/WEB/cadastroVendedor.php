<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vendedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            color: #333;
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
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="reset"],
        button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="reset"],
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover,
        button:hover {
            background-color: #218838;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="submit"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
        #btnVoltar {
            background-color: #00BFFF;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            width: auto;
        }

        #btnVoltar:hover {
            background-color: #1E90FF;
        }
        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
        legend {
            font-weight: bold;
        }
        table {
            width: 100%;
        }
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Inclusão de Vendedores</h1>
    <?php
    include('ConexaoBD.php'); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];
        $perc_comissao = $_POST["perc_comissao"];

        $query = "INSERT INTO vendedor (nome, endereco, cidade, estado, celular, email, perc_comissao) VALUES ('$nome', '$endereco', '$cidade', '$estado', '$celular', '$email', '$perc_comissao')";
        $resu = mysqli_query($con, $query);
    
        if ($resu) {
            echo "Inclusão realizada com sucesso!!";
        } else {
            echo "ERRO ao inserir os dados.";
        }

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
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="">Selecione o Estado</option>
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
        </select>
        <p><label>Celular:</label>
        <input type="tel" maxlength="12" name="celular"><br>
        <p><label>Email:</label>
        <input type="email" size="80" maxlength="100" name="email"><br>
        <p><label>Percentual de Comissão:</label>
        <input type="number" min="0" max="100" step="0.01" name="perc_comissao" required><br><p>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
        <button id="btnVoltar" type="button" onclick="window.location.href='Vendedores.php'">Voltar</button>
    </form>
</body>
</html>
