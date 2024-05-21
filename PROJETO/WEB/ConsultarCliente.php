<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
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
    <form action="" method="post"></form>
        <div class="container">
            <h2>Consultar Clientes</h2>
            <table> 
                <?php
                    include('ConexaoBD.php');
                    $query = "SELECT id, nome FROM clientes ORDER BY nome";

                    $resu = mysqli_query($con, $query) or die(mysqli_error($con));

                    echo "<tr><th>Nome</th><th>Editar</th><th>Excluir</th></tr>";     
                    while ($reg = mysqli_fetch_array($resu)){
                        echo "<tr>";
                        echo "<td>" . $reg['nome'] . "</td>"; 
                        echo "<td><a href='AlterarCliente.php?id=". $reg['id'] . "'>Editar</a></td>"; 
                        echo "<td><a href='DeletarCliente.php?id=". $reg['id'] . "'>Excluir</a></td>"; 
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </form>
        <?php
            mysqli_close($con);
        ?>
    <button id="btnVoltar" onclick="window.location='Clientes.php'">Voltar</button>
</body>
</html>
