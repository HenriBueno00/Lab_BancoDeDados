<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adição de forma de pagamento</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
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
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"], #btnVoltar {
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover, #btnVoltar:hover {
            background-color: #218838;
        }
        .success {
            color: green;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
    </head>
    <body>
        <h1>Adição de forma de pagamento</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            include("ConexaoBD.php");
            $nome = $_POST['nome'];
            $query = "INSERT INTO forma_pagto (nome) VALUES ('$nome')";
            $resultado=mysqli_query($con,$query);
            if (mysqli_insert_id($con)){
                echo "Inclusão da forma de pagamento realizada com sucesso!";
            }else{
                echo "Erro ao inserir os dados:".mysql_connect_error();
            }
            mysqli_close($con); 
        }
        ?>
        <form method="POST">
            <label>Forma de pagamento</label>
            <input type="text" name="nome" size="100" maxlength="100" required>
            <input type="submit" value="Enviar">
            <input type="reset" value="Limpar">
            <button id="btnVoltar" type="button" onclick="window.location.href='formapgto.php'">Voltar</button>
        </form>
    </body>
</html>