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
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            width: 200px;
            margin-right: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid black;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        a {
            text-decoration: none;
            color: #007bff;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            transition: color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
        #btnVoltar {
            background-color: #00BFFF;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            width: auto;
            transition: background-color 0.3s ease;
        }

        #btnVoltar:hover {
            background-color: #1E90FF;
        }
    </style>
</head>
<body>
    <h2>Pesquisa de Produtos</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
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
                <th>Promoção</th>
                <th colspan=2>Ações</th>
            </tr>
          <?php

            include('ConexaoBD.php');

            $search = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['nome'])) {
                    $search = mysqli_real_escape_string($con, $_POST['nome']);
                    $query = "SELECT * FROM produto WHERE nome LIKE '%$search%'";
                } else {
                    echo "<tr><td colspan='7'>Por favor, insira um nome para pesquisa.</td></tr>";
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
                    echo "<td>" . (($row['promocao'] == 1) ? 'Sim' : 'Não') . "</td>";
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
    <button id="btnVoltar" onclick="window.location.href='Produtos.php'">Voltar</button>
</body>
</html>
