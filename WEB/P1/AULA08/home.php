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
        }
        .block {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            float: left;
            margin-right: 20px;
        }
        .block:last-child {
            margin-right: 0;
        }
        .block-title {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
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
            display: block;
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
            <button class="button" onclick="window.location='cadastrar_especialidade.php'">Cadastrar</button>
            <button class="button" onclick="window.location='consulta_especialidade.php'">Consultar</button>
        </div>
    </div>
    
    <div class="block">
        <div class="block-title">Outro Bloco</div>
        <div class="button-container">
            <!-- Adicione os botões para outro recurso aqui -->
        </div>
    </div>
    
    <div class="block">
        <div class="block-title">Mais um Bloco</div>
        <div class="button-container">
            <!-- Adicione os botões para outro recurso aqui -->
        </div>
    </div>
</body>
</html>
