<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Especialidade</title>
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
        input[type="text"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-left: 10px;
        }
        select {
            cursor: pointer;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 22px);
            margin-left: 10px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
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
    <h1>Editar Especialidade Médica</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])){
        include('conexao.php');

        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];

        $query= "UPDATE especialidade SET descricao='$nome', sigla='$sigla' WHERE id=$id";

        $resu= mysqli_query($con, $query);

        if ($resu) {
            echo "Atualização realizada com sucesso";
        } else {
            echo "Erro ao atualizar dados: ". mysqli_error($con);
        }

        mysqli_close($con);
        header("Location: consulta_especialidade.php");
    }elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
        header("Location: consulta_especialidade.php");
    }
    ?>
    <?php
    if(isset($_GET['id'])){
        include('conexao.php');
        $id = $_GET['id'];

        $query= "SELECT * FROM especialidade WHERE id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
    }
    ?>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="">Descrição da Especialidade</label>
        <input type="text" name="nome" size="100" maxlength="100" required value="<?php echo $row['descricao']; ?>">
        <p><label for="">Sigla</label></p>
        <input type="text" name="sigla" size="3" maxlength="3" required value="<?php echo $row['sigla']; ?>">
        <p><input type="submit" name="atualizar" value="Atualizar"></p>
            <input type="submit" name="cancelar" value="Cancelar">
    </form>

    <button id="btnVoltar" onclick="history.back()">Voltar</button>

    <?php
    
    ?>

</body>
</html>
