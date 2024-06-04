<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulta de Forma de Pagamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        #btnVoltar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 20px;
        }

        #btnVoltar:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }

        center {
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <button id="btnVoltar" type="button" onclick="window.location.href='formapgto.php'">Voltar</button>
    <form method="POST">
        <h1>Formas de Pagamento</h1>
        <table>
            <tr>
                <th>Nome</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php
                include("ConexaoBD.php");
                $query= "SELECT * FROM forma_pagto ORDER BY nome";
                $resultado=mysqli_query($con,$query) or die (mysqli_connect_error());
                while ($reg = mysqli_fetch_array($resultado)){
                    echo "<tr>";
                    echo "<td>".$reg['nome']."</td>";
                    echo "<td><a href='AlterarFormaPgto.php?id=".$reg['id']."'>Editar</a></td>";
                    echo "<td><a href='DeletarFormaPgto.php?id=".$reg['id']."'>Excluir</a></td>";
                    echo "</tr>";
                }
              ?>      
        </table>
    </form>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>
