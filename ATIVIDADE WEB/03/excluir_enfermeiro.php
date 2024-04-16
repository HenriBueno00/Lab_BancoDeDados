<?php
session_start();
include_once("conexao.php");


if(isset($_GET['matricula'])) {
    $matricula = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT);

    
    $query = "SELECT * FROM enfermeiro WHERE matricula = '$matricula'";
    $resultado = mysqli_query($con, $query);
    
    
    if(mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);

        
        if(isset($_POST['confirmar'])) {
            $query_excluir = "DELETE FROM enfermeiro WHERE matricula = '$matricula'";
            $resultado_excluir = mysqli_query($con, $query_excluir);

            if($resultado_excluir) {
                $_SESSION['msg'] = "<p style='color:green;'>Enfermeiro excluído com sucesso!</p>";
                header("Location: consulta_enfermeiro.php");
                exit();
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o enfermeiro.</p>";
            }
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Enfermeiro não encontrado.</p>";
        header("Location: consulta_enfermeiro.php"); 
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>ID do enfermeiro não foi fornecido.</p>";
    header("Location: consulta_enfermeiro.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Enfermeiro</title>
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
            width: 50%;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #d32f2f;
        }
    </style>
    </style>
</head>
<body>
    <h1>Excluir Enfermeiro</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST">
        <p>Deseja realmente excluir o enfermeiro <?php echo $row['nome']; ?>?</p>
        <input type="submit" name="confirmar" value="Confirmar">
        <input type="button" value="Cancelar" onclick="window.location='consulta_enfermeiro.php'">
    </form>
</body>
</html>
