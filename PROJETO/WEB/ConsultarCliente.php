<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
    <style>
        /* Estilos CSS para tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Consultar Clientes</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
            <?php
                // Incluindo o arquivo de conexão com o banco de dados
                include('ConexaoBD.php');

                // Query para selecionar todos os clientes
                $query = "SELECT id, nome FROM clientes ORDER BY nome";

                // Executando a query
                $result = mysqli_query($con, $query);

                // Verificando se há resultados
                if (mysqli_num_rows($result) > 0) {
                    // Iterando sobre os resultados e exibindo na tabela
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td><a href='AlterarCliente.php?id=" . htmlspecialchars($row['id']) . "'>Alterar</a></td>";
                        echo "<td><a href='DeletarCliente.php?id=" . htmlspecialchars($row['id']) . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum cliente encontrado.</td></tr>";
                }

                // Fechando a conexão com o banco de dados
                mysqli_close($con);
            ?>
        </table>
    </div>
</body>
</html>
