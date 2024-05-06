<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Paciente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
            margin-right: 10px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Pesquisa de Pacientes</h2>
    <form action="pesquisa_resultado.php" method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" size="50">
        <label>CPF: </label>
        <input type="text" name="cpf" maxlength="11">
        <p>
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="limpar" value="Limpar">
        </p>
    </form>
    <input type="button" value="Voltar" onclick="window.location.href='paciente.php'"></p>
</body>
</html>
