<?php
session_start();
include_once("conexao.php");
$id_medico = filter_input(INPUT_GET, 'id_medico', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM medico WHERE id_medico = '$id_medico'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
$cod_esp = $row['cod_esp']; // Correção: faltou um ponto e vírgula ao final desta linha
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Medico</title> <!-- Correção: "Medico" alterado para "Médico" -->
</head>
<body>
    <h1>Alteração - Médico</h1> <!-- Correção: "Medico" alterado para "Médico" -->
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']); // Correção: Removido espaço em excesso entre "unset" e "($_SESSION['msg'])"
    }
    ?>
    <form method="POST" action="proc_edit_medico.php">
        <input type="hidden" name="id_medico" value="<?php echo $row['id_medico']; ?>">
        <p><label>Nome: </label><input type="text" name="nome" size="100" value="<?php echo $row['nome']; ?>">
        <label>CPF: </label><input type="text" name="cpf" size="30" value="<?php echo $row['cpf']; ?>">
        <fieldset><legend>Endereço</legend> <!-- Correção: "Endereço" substituído por "Endereço" -->
            <table width="80%">
                <tr>
                    <td>Endereço: </td><td><input type="text" name="endereco" size="100" value="<?php echo $row['endereco']; ?>"></td>
                    <td>Número: </td><td><input type="number" name="numero" value="<?php echo $row['numero']; ?>"></td>
                </tr>
                <tr>
                    <td>Cidade: </td><td><input type="text" name="cidade" value="<?php echo $row['cidade']; ?>"></td>
                    <td>Estado: </td><td><select name="estado">
                        <option value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
                        <option value="SP">SP</option>
                        <option value="BA">BA</option>
                        <option value="RJ">RJ</option>
                        <option value="MG">MG</option>
                        <option value="PR">PR</option>
                    </select></td>
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
                $resu2 = mysqli_query($con, $query2) or die (mysqli_connect_error()); // Correção: "mysql_connect_error()" alterado para "mysqli_connect_error()"
                while ($reg2 = mysqli_fetch_array($resu2)) {
            ?>
                <option value="<?php echo $reg2['id']; ?>"><?php echo $reg2['descricao']; ?></option>
            <?php
                }
                mysqli_close($con);
            ?>
        </select>
        <p><input type="submit" value="Salvar"></p> <!-- Correção: Tag de fechamento da tag <p> adicionada -->
    </form>
</body>
</html>
