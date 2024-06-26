<?php
session_start();
include_once("conexao.php");
$id_medico = filter_input(INPUT_GET, 'id_medico', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM medico WHERE id_medico = '$id_medico'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
$cod_esp = $row['cod_esp'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Médico</title>
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
            width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"], input[type="number"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-left: 10px;
        }
        select {
            cursor: pointer;
        }
        input[type="submit"], input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(50% - 22px);
            margin-left: 10px;
            float: left;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }
        input[type="button"] {
            background-color: #f44336;
        }
        input[type="button"]:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Alteração - Médico</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="proc_edit_medico.php">
        <input type="hidden" name="id_medico" value="<?php echo $row['id_medico']; ?>">
        <p><label>Nome: </label><input type="text" name="nome" size="100" value="<?php echo $row['nome']; ?>">
        <label>CPF: </label><input type="text" name="cpf" size="30" value="<?php echo $row['cpf']; ?>"></p>
        <fieldset><legend>Endereço</legend>
            <table width="80%">
                <tr>
                    <td>Endereço: </td><td><input type="text" name="endereco" size="100" value="<?php echo $row['endereco']; ?>"></td>
                    <td>Número: </td><td><input type="text" name="numero" size="10" value="<?php echo $row['numero']; ?>"></td>
                </tr>
                <tr>
                    <td>Bairro: </td><td><input type="text" name="bairro" size="60" value="<?php echo $row['bairro']; ?>"></td>
                    <td>Cidade: </td><td><input type="text" name="cidade" size="80" value="<?php echo $row['cidade']; ?>"></td>
                </tr>
                <tr>
                    <td>Estado: </td><td><input type="text" name="estado" size="2" value="<?php echo $row['estado']; ?>"></td>
                    <td>CRM: </td><td><input type="text" name="crm" size="20" value="<?php echo $row['CRM']; ?>"></td>
                </tr>
                <tr>
                    <td>Salário: </td><td><input type="text" name="salario" size="15" value="<?php echo $row['salario']; ?>"></td>
                    <td>Celular: </td><td><input type="text" name="celular" size="15" value="<?php echo $row['celular']; ?>"></td>
                </tr>
            </table>
        </fieldset>
        <p><label>Especialidade: </label>
        <select name="cod_esp">
            <?php
                $query= "SELECT * from especialidade WHERE id= $cod_esp;";
                $resu= mysqli_query($con,$query) or die(mysqli_connect_error());
                $reg= mysqli_fetch_assoc($resu);
            ?>
            <option value="<?php echo $row['cod_esp']; ?>">
                <?php echo $reg['descricao']; ?></option>
            <?php
                $query2 = "SELECT * from especialidade ORDER BY descricao;";
                $resu2 = mysqli_query($con, $query2) or die (mysqli_connect_error());
                while ($reg2 = mysqli_fetch_array($resu2)) {
            ?>
                <option value="<?php echo $reg2['id']; ?>"><?php echo $reg2['descricao']; ?></option>
            <?php
                }
                mysqli_close($con);
            ?>
        </select>
        <p><input type="submit" value="Salvar">
        <input type="button" value="Cancelar" onclick="window.location.href='alter_medico.php'"></p>
    </form>
</body>
</html>
