<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <style>
        /* Seus estilos CSS aqui */
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
        input[type="text"], select, input[type="email"] {
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
<h1>Cadastro de Paciente</h1>

<button id="btnVoltar" onclick="history.back()">Voltar</button>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php');

    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];


    $query = "INSERT INTO paciente (nome, endereco, numero, complemento, bairro, cidade, estado, cpf, rg, telefone, celular, email) 
    VALUES ('$nome', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cpf', '$rg', '$telefone', '$celular', '$email')";


    if (mysqli_query($con, $query)) {
        echo "Paciente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar paciente: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" maxlength="100" required>

    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" maxlength="100" required>

    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" maxlength="10" required>

    <label for="complemento">Complemento:</label>
    <input type="text" id="complemento" name="complemento" maxlength="50" required>

    <label for="bairro">Bairro:</label>
    <input type="text" id="bairro" name="bairro" maxlength="50" required>

    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" maxlength="80" required>

    <label for="estado">Estado:</label>
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
    </select>

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" maxlength="11" pattern="\d{11}" required>

    <label for="rg">RG:</label>
    <input type="text" id="rg" name="rg" maxlength="9" pattern="\d{9}" required>

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" maxlength="15" pattern="\d{15}" placeholder="(XX) XXXXX-XX" required>

    <label for="celular">Celular:</label>
    <input type="text" id="celular" name="celular" maxlength="15"  placeholder="(XX) XXXXX-XX" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" maxlength="100" required>

    <input type="submit" value="Cadastrar">
    <input type="reset" value="Limpar">
</form>
</body>
</html>