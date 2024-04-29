    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta Enfermeiro</title>
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
            <h1>Enfermeiros</h1>
            <table border="1" width="100%">
            <?php
                include('conexao.php');
                $query = "SELECT nome, matricula FROM enfermeiro ORDER BY nome";
                $resu = mysqli_query($con, $query) or die(mysqli_error($con));
                echo "<tr><th>Nome</th><th>Editar</th><th>Excluir</th></tr>";     
                while ($reg = mysqli_fetch_array($resu)){
                    echo "<tr>";
                    echo "<td>" . $reg['nome'] . "</td>"; 
                    echo "<td><a href='editar_enfermeiro.php?matricula=". $reg['matricula'] . "'>Editar</a></td>"; 
                    echo "<td><a href='excluir_enfermeiro.php?matricula=". $reg['matricula'] . "'>Excluir</a></td>"; 
                    echo "</tr>";
                }
            ?>
            </table>
        </form>
        <?php
            mysqli_close($con);
        ?>
        <button id="btnVoltar" onclick="window.location='enfermeiro.php'">Voltar</button>
    </body>
    </html>
