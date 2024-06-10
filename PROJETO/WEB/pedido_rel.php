<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Relatório de Pedidos</title>
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
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="date"],
        input[type="submit"],
        .button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            display: block;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .button {
            background-color: #45a049;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Gerar Relatório de Pedidos</h1>
    <form action="relatorio_pedidos_por_periodo.php" method="GET" id="reportForm">
        <label for="start_date">Data Inicial:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br>
        <label for="end_date">Data Final:</label>
        <input type="date" id="end_date" name="end_date" required>
        <br><br>
        <input type="submit" value="Gerar Relatório">
        <a href="Pedidos.php" class="button">Voltar</a>
    </form>
</body>
</html>
