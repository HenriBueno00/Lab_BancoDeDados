<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Adição de forma de pagamento</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
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