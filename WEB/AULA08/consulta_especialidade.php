<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Especialidade</title>
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
        a {
            text-decoration: none;
            color: #007bff;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Especialidade Medica</h1>
        <table border="1" width="100%">
        <?php
            include('conexao.php');
            $query="Select *  from especialidade order by descricao";
            $resu=mysqli_query($con,$query) or die(mysql_connect_error());
            echo "<tr><td><b> Descrição               </td><td><b> Sigla </td></tr>";     
            while ($reg = mysqli_fetch_array($resu)){
                echo "<tr><td>" . $reg['descricao'] . "</td>"; 
                echo "<td>" . $reg['sigla'] . "</td>"; 
                echo "<td><a href='alterar_especialidade.php?id=". $reg['id'] . "'>Editar</a></td>"; 
                echo "<td><a href='excluir_especialidade.php?id=". $reg['id'] . "'>Excluir</a></td>"; 
            }
        ?>
        </table>
    </form>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>