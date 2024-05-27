<?php
session_start();
include_once("conexao.php");
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
</head>
<body>
    <h1>Alteração - Vendedor</h1>
    <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="conf_edit_vendedor.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <p>
            <label>Nome: </label>
            <input type="text" name="nome" size="100" value="<?php echo $row['nome']; ?>">
        </p>

        <fieldset>
            <legend>Endereço</legend>
            <table width="80%">
                <tr>
                    <td>Endereço: </td>
                    <td><input type="text" name="endereco" size="100" value="<?php echo $row['endereco']; ?>"></td>
                    
                <tr>
                    <td>Cidade: </td>
                    <td><input type="text" name="cidade" value="<?php echo $row['cidade']; ?>"></td>
                    <td>Estado: </td>
                    <td>
                        <select name="estado">
                            <option value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
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
                    </td>
                </tr>
            </table>
        </fieldset>
        <p>
            <label>Celular: </label>
            <input type="tel" name="celular" size="15" value="<?php echo $row['celular']; ?>">
        </p>
        <p>
            <label>Email: </label>
            <input type="email" name="email" size="30" value="<?php echo $row['email']; ?>">
        </p>
        <p>
            <label>Percentual de Comissão: </label>
            <input type="text" name="perc_comissao" value="<?php echo $row['perc_comissao']; ?>">
        </p>

        <p><input type="submit" value="Salvar"></p>
    </form>
</body>
</html>
