<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Relatório de Comissão</title>
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

        .container button {
            display: block;
            width: 100%;
            padding: 20px 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .container button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relatório de Comissão de Vendedores</h1>
        <form action="gerar_relatorio_comissao.php" method="GET">
            <label for="start_date">Data de Início:</label>
            <input type="date" id="start_date" name="start_date" required>
            <label for="end_date">Data de Fim:</label>
            <input type="date" id="end_date" name="end_date" required>
            <button type="submit">Gerar Relatório</button>
        </form>
        <button id="btnVoltar" onclick="window.location='Index.php'">Voltar</button>
    </div>
</body>
</html>

