<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
        }
        input[type="text"] {
            padding: 8px;
            width: 200px;
            margin-right: 10px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
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
            background-color: #4CAF50;
            color: white;
        }
        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
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
    <h2>Pesquisa de Produtos</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" size="50">
        <p>
            <input type="submit" name="enviar" value="Pesquisar">
            <input type="reset" name="limpar" value="Limpar">
        </p>
    </form>

    <div class="container">
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

            include('ConexaoBD.php');

            $search = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['nome'])) {
                    $search = mysqli_real_escape_string($con, $_POST['nome']);
                    $query = "SELECT * FROM produto WHERE nome LIKE '%$search%'";
                } else {
                    echo "<p>Por favor, insira um nome para pesquisa.</p>";
                    $query = "SELECT * FROM produto";
                }
            } else {
                $query = "SELECT * FROM produto";
            }
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['qtde_estoque'] . "</td>";
                    echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
                    echo "<td>" . $row['unidade_medida'] . "</td>";
                    echo "<td><a href='alterar_produto.php?id=" . $row['id'] . "'>Editar</a></td>";
                    echo "<td><a href='excluir_produto.php?id=" . $row['id'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum produto encontrado.</td></tr>";
            }
            mysqli_close($con);
            ?>
        </table>
    </div>
    <input type="button" value="Voltar" onclick="window.location.href='index.php'">
</body>
</html>
