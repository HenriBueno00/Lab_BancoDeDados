<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alterar forma de pagamento existente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"], input[type="button"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }

        input[type="submit"][name="cancelar"] {
            background-color: #00BFFF;
        }

        input[type="submit"][name="cancelar"]:hover {
            background-color: #1E90FF;
        }

        a {
            text-decoration: none;
            color: #00BFFF;
        }

        a:hover {
            text-decoration: underline;
        }
        #btnVoltar {
            background-color: #00BFFF;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            width: auto;
        }

        #btnVoltar:hover {
            background-color: #1E90FF;
        }
    </style>
</head>
<body>
    <h1>Alteração</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])){
            include ("ConexaoBD.php");

            $id = $_POST["id"];
            $nome = $_POST["nome"];

            $query= "UPDATE forma_pagto SET nome='$nome' WHERE id=$id";

            $resultado1=mysqli_query($con,$query);

            if ($resultado1) {
                echo "Atualização de forma de pagamento realizada com sucesso!";
            } else{
                echo "Erro ao atualizar informações de pagamento: ".mysqli_error($con);
            }
            mysqli_close($con);
            header("Location: ConsultaFormaPgto.php");
        }
        elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
            header("Location: ConsultaFormaPgto.php");
        }
    ?>
    <?php
        if(isset($_GET['id'])){
            include("ConexaoBD.php");
            $id = $_GET['id'];
            $query = "SELECT * FROM forma_pagto WHERE id = $id";
            $resultado2 = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($resultado2);
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Descrição da forma de pagamento:</label>
            <input type="text" name="nome" size="100" maxlength="100" required value="<?php echo $row['nome']; ?>">
            <p>
            <input type="submit" name="atualizar" value="Atualizar">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>
    <?php
        }
    ?>
    <button id="btnVoltar" type="button" onclick="window.location.href='ConsultaFormaPgto.php'">Voltar</button>
</body>
</html>
