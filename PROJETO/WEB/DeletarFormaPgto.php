<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exclusão de forma de pagamento</title>
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
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            text-align: center; 
        }
        p {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="submit"], input[type="button"] {
            background-color: #f44336;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            display: block;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #d32f2f;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        a.button:hover {
            background-color: #1976D2;
        }
        p.success {
            color: green;
        }
        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Exclusão</h1>
    <?php
    if(isset($_GET['id'])){
        include("ConexaoBD.php");
        $id = $_GET['id'];
        $query = "SELECT * FROM forma_pagto WHERE id = $id";
        $resultado = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($resultado);
        if ($row) {
            echo "<p>ID: ". $row['id'] . "</p>";
            echo "<p>Nome: ".$row['nome'] . "</p>";
            echo "<p>Confirma a exclusão?</p>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<input type='submit' name='confirmar' value='Confirmar'>";
            echo "<input type='submit' name='cancelar' value='Cancelar'>";
            echo "</form>";
        } else {
            echo "<p>Forma de pagamento não encontrada.</p>";
        }
        mysqli_close($con);
    } else {
        echo "<p>ID da forma de pagamento não especificado.</p>";
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])){
        include("ConexaoBD.php");
        $id = $_POST["id"];
        $query = "DELETE FROM forma_pagto WHERE id = $id";
        $result = mysqli_query($con, $query);
        if ($result){
            echo "<p>Forma de pagamento excluída com sucesso!</p>";
        } else{
            echo "<p>Erro ao excluir a forma de pagamento: ".mysqli_error($con)."</p>";
        }
        mysqli_close($con);
        header("Location: ConsultaFormaPgto.php");
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
        header("Location: ConsultaFormaPgto.php");
        exit;
    }
    ?>
</body>
</html>
