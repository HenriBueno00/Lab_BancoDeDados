<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Especialidade</title>
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
    </style>
</head>
<body>
    <h1>Excluir Especialidade Médica</h1>
    
    
    <?php
    if(isset($_GET['id'])) {
        include('conexao.php');
        $id = $_GET['id'];

        $query = "SELECT * FROM especialidade WHERE id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Descrição da Especialidade</th><th>Sigla</th></tr>";
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['descricao'] . "</td><td>" . $row['sigla'] . "</td></tr>";
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

            // Exclui a especialidade
            $query_excluir = "DELETE FROM especialidade WHERE id = $id";
            if (mysqli_query($con, $query_excluir)) {
                echo "Especialidade excluída com sucesso.";
            } else {
                echo "Erro ao excluir especialidade: " . mysqli_error($con);
            }

            mysqli_close($con);
            exit;
        } elseif (isset($_POST['cancelar'])) {
            header("Location: consulta_especialidade.php");
            exit;
        }
    }
    ?>
    <button id="btnVoltar" onclick="window.location='consulta_especialidade.php'">Voltar</button>
</body>
</html>
