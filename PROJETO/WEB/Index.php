<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        button {
            padding: 18px 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 25px;
            margin-bottom: 10px;
            width: 250px;
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
    </style>
</head>
<body>
    <h1>Página Inicial</h1>
    <a href="Clientes.php"><button>Clientes</button></a>
    <a href="Vendedores.php"><button>Vendedores</button></a>
    <a href="Produtos.php"><button>Produtos</button></a>
    <a href="FormaPgto.php"><button>Forma de Pagamento</button></a>
    <a href="Pedidos.php"><button>Pedidos</button></a>
</body>
</html>
