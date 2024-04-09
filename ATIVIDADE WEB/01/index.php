<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
</head>
<body>
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
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 20px 40px;
            margin: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Clínica CRUD</h1>
    <div class="container">
        <a href="enfermeiro.php" class="btn">Gerenciar Enfermeiros</a>
        <a href="funcao.php" class="btn">Gerenciar Funções</a>
    </div>
</body>
</html>