<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Função</title>
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
        #btnVoltar {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Consulta Função</h1>
        <table border="1" width="100%">
        <?php
            include('conexao.php');
            $query="SELECT * FROM funcao ORDER BY descricao";
            $resu=mysqli_query($con,$query) or die(mysql_connect_error());
            echo "<tr><th>Descrição</th><th>Editar</th><th>Excluir</th></tr>";     
            while ($reg = mysqli_fetch_array($resu)){
                echo "<tr><td>" . $reg['descricao'] . "</td>"; 
                echo "<td><a href='alterar_funcao.php?id=". $reg['id'] . "'>Editar</a></td>"; 
                echo "<td><a href='excluir_funcao.php?id=". $reg['id'] . "'>Excluir</a></td></tr>"; 
            }
        ?>
        </table>
    </form>
    <?php
        mysqli_close($con);
    ?>
    <button id="btnVoltar" onclick="window.location='funcao.php'">Voltar</button>
</body>
</html>
