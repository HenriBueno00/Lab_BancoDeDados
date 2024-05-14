<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Produtos</title>
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
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Consultar Produtos</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Quantidade em Estoque</th>
                <th>Preço</th>
                <th>Unidade de Medida</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
            // Incluir arquivo de conexão
            include_once 'conexao.php';

            // Consulta os produtos no banco de dados
            $query = "SELECT * FROM produto";
            $result = mysqli_query($con, $query);

            // Verifica se há resultados
            if (mysqli_num_rows($result) > 0) {
                // Loop através de cada linha da consulta
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['qtde_estoque'] . "</td>";
                    echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
                    echo "<td>" . $row['unidade_medida'] . "</td>";
                    echo "<td><a href='editar_produto.php?id=" . $row['id'] . "'>Editar</a></td>";
                    echo "<td><a href='excluir_produto.php?id=" . $row['id'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum produto encontrado.</td></tr>";
            }

            // Fechar conexão
            mysqli_close($con);
            ?>
        </table>
    </div>
</body>
</html>
