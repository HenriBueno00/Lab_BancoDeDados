<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pedidos</title>
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

        .button {
            display: block;
            width: 80%;
            padding: 20px 40px;
            margin-bottom: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 20px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        .button:hover {
            background-color: #45a049;
        }

        #btnVoltar {
            display: inline-block;
            background-color: #00BFFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            margin-top: 20px;
        }

        #btnVoltar:hover {
            background-color: #1E90FF;
        }

        a {
            text-decoration: none;
            color: white; /* Mantém o texto do botão branco */
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Página de Pedidos</h1>
        <a href="pedido_ad.php" class="button">Cadastrar Pedido</a>
        <a href="pedido_cons_periodo.php" class="button">Consultar Pedido por Período</a>
        <a href="pedido_cons_cliente.php" class="button">Consultar Pedido por Cliente</a>
        <a href="pedido_ex.php" class="button">Excluir Pedido</a>
        <a href="pedido_rel.php" class="button">Gerar Relatório de Pedido</a>
        <a href="Index.php" id="btnVoltar">Voltar</a>
    </div>
</body>
</html>
