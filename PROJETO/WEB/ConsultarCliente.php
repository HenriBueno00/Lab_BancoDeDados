<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
    <style>
        /* Estilos CSS aqui */
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
                $query = "SELECT nome FROM clientes ORDER BY nome";

                // Executando a query
                $result = mysqli_query($con, $query);

                // Verificando se há resultados
                if (mysqli_num_rows($result) > 0) {
                    // Iterando sobre os resultados e exibindo na tabela
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>"; 
                        echo "<td><a href='AlterarCliente.php'>Alterar</a></td>"; // Link para alterar cliente (substitua com o link correto)
                        echo "<td><a href='DeletarCliente.php'>Excluir</a></td>"; // Link para excluir cliente (substitua com o link correto)
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
