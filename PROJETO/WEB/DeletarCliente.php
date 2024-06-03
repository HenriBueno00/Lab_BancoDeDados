<?php
session_start();
include_once("ConexaoBD.php");

if(isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($con, $query);

    if(mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);

        if(isset($_POST['confirmar'])) {
            $query_excluir = "DELETE FROM clientes WHERE id = '$id'";
            $resultado_excluir = mysqli_query($con, $query_excluir);

            if($resultado_excluir) {
                $_SESSION['msg'] = "<p style='color:green;'>Cliente excluído com sucesso!</p>";
                header("Location: ConsultarCliente.php");
                exit();
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o cliente.</p>";
            }
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Cliente não encontrado.</p>";
        header("Location: ConsultarCliente.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>ID do cliente não foi fornecido.</p>";
    header("Location: ConsultarCliente.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
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
            width: 50%;
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
    <h1>Excluir Cliente</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST">
        <p>Deseja realmente excluir o cliente <?php echo $row['nome']; ?>?</p>
        <input type="submit" name="confirmar" value="Confirmar">
        <input type="button" value="Cancelar" onclick="window.location='ConsultarCliente.php'">
    </form>
</body>
</html>
