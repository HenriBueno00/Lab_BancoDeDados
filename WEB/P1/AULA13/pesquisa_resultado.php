<?php
include("conexao.php");
$pesq_1 = $_POST['nome'];
$pesq_2 = $_POST['cpf'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Da Pesquisa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        a, input[type="submit"] {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            display: inline-block;
        }
        a:hover, input[type="submit"]:hover {
            background-color: #0056b3;
        }
        #btnVoltar {
            background-color: #4CAF50;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>CONSULTA DE PACIENTES</h2>
    <table border="1" width="100%">
        <tr>
            <th>NOME</th>
            <th>CPF</th>
            <th>RG</th>
            <th>ENDEREÇO</th>
            <th>NÚMERO</th>
            <th>BAIRRO</th>
            <th>CIDADE</th>
            <th>ESTADO</th>
            <th>E-MAIL</th>
        </tr>
        <?php
        include_once("conexao.php");
        $sql = "SELECT * FROM paciente";
        $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
        // Obtendo os dados por meio de um loop while
        while ($registro = mysqli_fetch_array($resultado)) {
            $id_paciente = $registro['id'];
            echo "<tr>";
            echo "<td>" . $registro['nome'] . "</td>";
            echo "<td>" . $registro['cpf'] . "</td>";
            echo "<td>" . $registro['rg'] . "</td>";
            echo "<td>" . $registro['endereco'] . "</td>";
            echo "<td>" . $registro['numero'] . "</td>";
            echo "<td>" . $registro['bairro'] . "</td>";
            echo "<td>" . $registro['cidade'] . "</td>";
            echo "<td>" . $registro['estado'] . "</td>";
            echo "<td>" . $registro['email'] . "</td>";
            echo "</tr>";

            $sql2 = "SELECT numero FROM telefone WHERE id_paciente = '$id_paciente'";
            $resu2 = mysqli_query($con, $sql2) or die("Erro ao retornar dados");
            while ($rows = mysqli_fetch_array($resu2)) {
                echo "<tr>";
                echo "<td colspan='8'>Telefone: " . $rows['numero'] . "</td>";
                echo "</tr>";
            }
        }
        mysqli_close($con);
        ?>
    </table>
    <a href="consulta_paciente.php">Voltar</a>
</body>
</html>
