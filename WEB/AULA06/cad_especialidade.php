<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULA 05</title>
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
    </style>
</head>
<body>
    <p class="">
        <h1>Especialidade Medica</h1>
    </p>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include('conexao.php');
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];

        $query = "INSERT INTO especialidade(descricao,sigla) VALUES ('$nome','$sigla')";
        $resu=mysqli_query($con,$query);

        if (mysqli_insert_id($con)){
            echo "Inclusão feita com sucesso";
        }else{
            echo "Erro ao inserir os dados".mysqli_connect_error();
        }
        mysqli_close($con);
    }
    ?>
    <form method="post">
        <div>
            <p><label for="">Nome:</label></p>
            <input type="text" name="nome" id="nome" size="100" maxlength="100" required>
        </div>
        <div>
            <p><label for="">Sigla</label></p>
            <input type="text" name="sigla" id="sigla" size="3" maxlength="3" required>
        </div>
        <div>
            <p><input type="submit" value="Enviar"></p>
            <p><input type="reset" value="Limpar"></p>
        </div>
    </form>
</body>
</html>