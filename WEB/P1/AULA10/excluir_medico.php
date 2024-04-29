<?php
session_start();
include_once("conexao.php");

// Verifica se o ID do médico foi enviado pela URL
if(isset($_GET['id_medico'])) {
    $id_medico = filter_input(INPUT_GET, 'id_medico', FILTER_SANITIZE_NUMBER_INT);

    // Query para selecionar os dados do médico a ser excluído
    $query = "SELECT * FROM medico WHERE id_medico = '$id_medico'";
    $resultado = mysqli_query($con, $query);
    
    // Verifica se o médico foi encontrado
    if(mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);

        // Verifica se o formulário de confirmação de exclusão foi enviado
        if(isset($_POST['confirmar'])) {
            $query_excluir = "DELETE FROM medico WHERE id_medico = '$id_medico'";
            $resultado_excluir = mysqli_query($con, $query_excluir);

            if($resultado_excluir) {
                $_SESSION['msg'] = "<p style='color:green;'>Médico excluído com sucesso!</p>";
                header("Location: consulta_medico.php"); // Redireciona para a página de consulta de médicos
                exit();
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao excluir o médico.</p>";
            }
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Médico não encontrado.</p>";
        header("Location: consulta_medico.php"); // Redireciona para a página de consulta de médicos
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>ID do médico não foi fornecido.</p>";
    header("Location: consulta_medico.php"); // Redireciona para a página de consulta de médicos
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Médico</title>
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
</head>
<body>
    <h1>Excluir Médico</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST">
        <p>Deseja realmente excluir o médico <?php echo $row['nome']; ?>?</p>
        <input type="submit" name="confirmar" value="Confirmar">
        <input type="button" value="Cancelar" onclick="window.location='consulta_medico.php'">
    </form>
</body>
</html>
