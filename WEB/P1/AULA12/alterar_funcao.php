<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Função</title>
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"], input[type="submit"], input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="reset"] {
            background-color: #f44336;
        }
        input[type="reset"]:hover {
            background-color: #da190b;
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
    <h1>Editar Função</h1>

    <?php
    include('conexao.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $descricao = $_POST["descricao"];

        $query = "UPDATE funcao SET descricao='$descricao' WHERE id='$id'";
        $resu = mysqli_query($con, $query);

        if ($resu) {
            echo "Função atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar função: " . mysqli_error($con);
        }
    } else {
        $id = $_GET["id"];
        $query = "SELECT * FROM funcao WHERE id='$id'";
        $resu = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($resu);
    }
    ?>

    <button id="btnVoltar" onclick="window.location='consulta_funcao.php'">Voltar</button>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao" value="<?php echo isset($row['descricao']) ? $row['descricao'] : ''; ?>" required><br>

        <input type="submit" value="Atualizar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
