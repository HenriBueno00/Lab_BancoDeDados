<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title> Vendedor </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
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
            text-align: center; 
        }
        p {
            text-align: center;
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
        }
        a.button:hover {
            background-color: #1976D2;
        }
        p.success {
            color: green;
            text-align: center;
        }
        p.error {
            color: red;
            text-align: center;
        }
        .popup, .overlay {
            display: none;
        }
    </style>
</head>
<body>
    <h1> Exclusao</h1>
    <?php

    if(isset($_GET['id'])){
        include('ConexaoBD.php');
        $id = $_GET['id'];

        $query = "SELECT * FROM vendedor WHERE id= $id";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);

        if ($row){
            echo "<p>Nome do Vendedor: " .$row['nome'] ."</p>";
            echo "<p>Confirmar a exclusão?</p>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='id' value='" .$row['id'] . "'>";
            echo "<input type='submit' name='confirmar' value='SIM'>";
            echo "<input type='submit' name='cancelar' value='NÃO'>";
            echo "</form>";
        } else {
            echo "<p>ID não encontrado.</p>";
        }

        mysqli_close($con);
}
?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])){
    include('ConexaoBD.php');

    $id_vendedor = $_POST['id'];
    $query = "DELETE FROM vendedor WHERE id = '$id_vendedor'";
    $resultado = mysqli_query($con, $query) or die(mysqli_error($con));
        
    if ($resultado) {
       echo "<p class='success'>Vendedor excluído com sucesso!</p>";
    } else{
        echo "<p class='error'>Erro ao excluir vendedor. Verifique!" . mysqli_error($con) . "</p>";
    }

    mysqli_close($con);
    header("Location: cons_vendedor.php");
} elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
    
    header("Location: cons_vendedor.php");
    exit;
}

?>

</body>
</html>
