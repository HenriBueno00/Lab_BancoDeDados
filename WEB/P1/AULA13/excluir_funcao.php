<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Função</title>
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
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
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
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .button-container {
            text-align: center;
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
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Excluir Função</h1>
    
    <?php
    if(isset($_GET['id'])) {
        include('conexao.php');
        $id = $_GET['id'];

        $query = "SELECT * FROM funcao WHERE id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Descrição da Função</th></tr>";
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['descricao'] . "</td></tr>";
            echo "</table>";
            echo "<p>Confirma a exclusão?</p>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<div class='button-container'>";
            echo "<input type='submit' name='excluir' value='Excluir'>";
            echo "<input type='submit' name='cancelar' value='Cancelar'>";
            echo "</div></form>";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['excluir'])) {
            include('conexao.php');
            $id = $_POST['id'];

            // Exclui a função
            $query_excluir = "DELETE FROM funcao WHERE id = $id";
            if (mysqli_query($con, $query_excluir)) {
                echo "<div id='myModal' class='modal'>
                        <div class='modal-content'>
                            <span class='close'>&times;</span>
                            <p>Função excluída com sucesso.</p>
                        </div>
                    </div>
                    <script>
                        var modal = document.getElementById('myModal');
                        var span = document.getElementsByClassName('close')[0];
                        modal.style.display = 'block';
                        span.onclick = function() {
                            modal.style.display = 'none';
                            window.location = 'consulta_funcao.php';
                        }
                        window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = 'none';
                                window.location = 'consulta_funcao.php';
                            }
                        }
                    </script>";
            } else {
                echo "<p>Erro ao excluir função: " . mysqli_error($con) . "</p>";
            }

            mysqli_close($con);
            exit;
        } elseif (isset($_POST['cancelar'])) {
            header("Location: consulta_funcao.php");
            exit;
        }
    }
    ?>
    <button id="btnVoltar" onclick="window.location='consulta_funcao.php'">Voltar</button>
</body>
</html>
