<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .block {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 50px;
            margin-bottom: 20px;
            width: calc(20% - 20px);
            margin-right: 20px;
            display: block;
        }
        .block:last-child {
            margin-right: 0;
        }
        .block-title {
            text-align: center;
            margin-bottom: 50px;
            font-weight: bold;
            font-size: 20px;
        }
        .button-container {
            text-align: center;
            margin-top: 10px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 5px;
            display: inline-block;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="block">
        <div class="block-title">Especialidade</div>
        <div class="button-container">
            <button class="button" onclick="window.location='cad_especialidade.php'">Cadastrar</button>
            <button class="button" onclick="window.location='consulta_especialidade.php'">Consultar</button>
        </div>
    </div>
    
    <div class="block">
        <div class="block-title">Medico</div>
        <div class="button-container">
            <button class="button" onclick="window.location='cad_medico.php'">Cadastrar</button>
            <button class="button" onclick="window.location='consulta_medico.php'">Consultar</button>
        </div>
    </div>
    
    <div class="block">
        <div class="block-title">Paciente</div>
        <div class="button-container">
            <button class="button" onclick="window.location='cad_paciente.php'">Cadastrar</button>
            <button class="button" onclick="window.location='consulta_paciente.php'">Consultar</button>
        </div>
    </div>
</body>
</html>
