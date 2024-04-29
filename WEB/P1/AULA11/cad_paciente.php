<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
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
            width: 1300px; /* Aumento da largura do formulário */
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"], input[type="number"], select, input[type="tel"], input[type="email"] {
            width: calc(100% - 22px); /* Ajuste para a largura do input */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <p><h1>Inclusão de Pacientes</h1></p>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="inc_paci.php" method="post">
        <table width="100%">
            <tr>
                <td>Nome:</td><td><input type="text" name="nome" id="" size="100" required></td>
            </tr>
            <tr>
                <td>E-Mail:</td><td><input type="text" name="email" id="" size="100" required></td>
                <td>CPF:</td><td><input type="text" name="cpf" id="" size="20" maxlength="11" required></td>
            </tr>
            <tr>
                <td>RG:</td><td><input type="text" name="rg" id="" size="20" maxlength="9" required></td>
            </tr>
        </table>
        <fieldset><legend>Endereço</legend>
            <table width="80%">
                <tr>
                    <td>Rua:</td><td><input type="text" name="rua" id="" size="100" maxlength="100" required></td>
                    <td>Numero:</td><td><input type="number" name="numero" id="" required></td>
                </tr>
                <tr>
                    <td>Complemento:</td><td><input type="text" name="complemento" size="100" maxlength="100" id="" required></td>
                    <td>Bairro:</td><td><input type="text" name="bairro" maxlength="50" id="" required></td>
                </tr>
                <tr>
                    <td> Cidade: </td><td><input type="text" size="100" maxlength="80" name="cidade" required></td>
                    <td> Estado: </td><td><select name="estado" required>
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
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset> <legend> Telefones </legend>
            <table width="100%">
                <tr>
                    <td> Telefone: </td><td><input type="tel" placeholder=" (XX) XXXXX-XXXX" name="tel_1"></td>
                    <td><td>Telefone: </td><td><input type="tel" placeholder=" (XX) XXXXX-XXXX" name="tel_2"></td> 
                    <td><td> Telefone: </td><td><input type="tel" placeholder=" (XX) XXXXX-XXXX" name="tel_3"></td> 
                </tr>
                <tr>
                    <td> Telefone: </td><td><input type="tel" placeholder=" (XX) XXXXX-XXXX" name="tel_4"></td>
                    <td><td> Telefone: </td><td><input type="tel" placeholder=" (XX) XXXXX-XXXX" name="tel_5"></td>
                    <td><td> Telefone: </td><td><input type="tel" placeholder=" (XX) XXXXX-XXXX" name="tel_6"></td>
                </tr>
            </table>
        </fieldset>
        <p> <input type="submit" value="Cadastrar"> <input type="reset" value="Limpar">
    </form>
</body>
</html>
