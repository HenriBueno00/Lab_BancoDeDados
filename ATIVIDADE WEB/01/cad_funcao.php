<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Função do Enfermeiro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
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
            width: 5rem;
            float: left;
            margin-left: 20px;
            margin-top: 20px;

        }
    </style>
</head>
<body>
    <h1>Cadastro de Função do Enfermeiro</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('conexao.php');

        // Recuperar os dados do formulário
        $descricao = $_POST["descricao"];

        // Montar a query SQL para inserir os dados na tabela
        $query = "INSERT INTO funcao (descricao) VALUES ('$descricao')";

        // Executar a query
        if (mysqli_query($con, $query)) {
            echo "Função do enfermeiro cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar função do enfermeiro: " . mysqli_error($con);
        }

        // Fechar a conexão
        mysqli_close($con);
    }
    ?>

    <button id="btnVoltar" onclick="window.location.href = 'funcao.php'">Voltar</button>

    <form method="post">
        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" size="100" maxlength="100" required>
        </div>
        <div>
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
        </div>
    </form>
</body>
</html>
