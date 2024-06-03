<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <h1>Cadastro de Clientes</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include('ConexaoBD.php');

            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $email = $_POST['email'];
            $cpf_cnpj = $_POST['cpf_cnpj'];
            $rg = $_POST['rg'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $data_nasc = $_POST['data_nasc'];
            $salario = $_POST['salario'];

            $query = "INSERT INTO clientes (nome, endereco, numero, bairro, cidade, estado, email, cpf_cnpj, rg, telefone, celular, data_nasc, salario) 
                      VALUES ('$nome', '$endereco', '$numero', '$bairro', '$cidade', '$estado', '$email', '$cpf_cnpj', '$rg', '$telefone', '$celular', '$data_nasc', '$salario')";

            $resultado = mysqli_query($con, $query);

            if ($resultado) {
                echo "<p class='message'>Cliente cadastrado com sucesso!</p>";
            } else {
                echo "<p class='message'>Erro ao cadastrar cliente: " . mysqli_error($con) . "</p>";
            }

            mysqli_close($con); 
        }
        ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required>

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

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" required>

        <label for="rg">RG:</label>
        <input type="text" id="rg" name="rg" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone">

        <label for="celular">Celular:</label>
        <input type="tel" id="celular" name="celular" required>

        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" required>

        <label for="salario">Salário:</label>
        <input type="number" id="salario" name="salario" step="0.01" required>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
        <button id="btnVoltar" onclick="window.location='clientes.php'">Voltar</button>
    </form>
</body>
</html>
