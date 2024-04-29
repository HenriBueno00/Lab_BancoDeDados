<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pacientes</title>
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
        .container {
            display: flex;
            position: absolute;
            left: 50%;
            transform:  translate(-50%);
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn:hover {
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
            width: 5rem;
            float: left;
            margin-left: 20px;
            margin-top: 20px;

        }
    </style>
</head>
<body>
    <h1>Gerenciar Pacientes</h1>
    <button id="btnVoltar" onclick="window.location.href = 'index.php'">Voltar</button>
    <div class="container">
        <a href="cad_paciente.php" class="btn">Cadastrar Paciente</a>
        <a href="consulta_funcao.php" class="btn">Consultar Função</a>
    </div>
</body>
</html>
