<?php
session_start();
include_once("ConexaoBD.php");
$id_vendedor = filter_input(INPUT_GET, 'id_vendedor', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM vendedor WHERE id = '$id_vendedor'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Vendedor</title>
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
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="submit"] {
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
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <h1>Alteração - Vendedor</h1>
    <?php
    if (isset($_SESSION['msg'])){
        echo "<p>" . $_SESSION['msg'] . "</p>";
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="conf_edit_vendedor.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <p>
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $row['nome']; ?>">
        </p>

        <fieldset>
            <legend>Endereço</legend>
            <table width="100%">
                <tr>
                    <td>Endereço: </td>
                    <td><input type="text" name="endereco" value="<?php echo $row['endereco']; ?>"></td>
                    
                    <td>Cidade: </td>
                    <td><input type="text" name="cidade" value="<?php echo $row['cidade']; ?>"></td>
                </tr>
                <tr>
                    <td>Estado: </td>
                    <td colspan="3">
                        <select name="estado">
                            <option value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
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
                    </td>
                </tr>
            </table>
        </fieldset>

        <p>
            <label>Celular: </label>
            <input type="tel" name="celular" value="<?php echo $row['celular']; ?>">
        </p>
        <p>
            <label>Email: </label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>">
        </p>
        <p>
            <label>Percentual de Comissão: </label>
            <input type="text" name="perc_comissao" value="<?php echo $row['perc_comissao']; ?>">
        </p>

        <p><input type="submit" value="Salvar"></p>
    </form>
    <button id="btnVoltar" onclick="window.location.href='Vendedores.php'">Voltar</button>
</body>
</html>
