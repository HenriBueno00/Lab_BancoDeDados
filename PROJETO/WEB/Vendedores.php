<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Vendedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        button {
            padding: 20px 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size:20px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        #btnVoltar {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Página de Vendedores</h1>
        <a href="cadastroVendedor.php"><button>Cadastrar Vendedor</button></a>
        <a href="cons_vendedor.php"><button>Consultar Vendedores</button></a>
        <button id="btnVoltar" onclick="window.location='Index.php'">Voltar</button>
    </div>
   
</body>
</html>
