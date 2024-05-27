<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
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
        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
        }
        a:hover {
            background-color: #0056b3;
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
    <h1>Consulta de Clientes</h1>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade">
        <input type="submit" value="Filtrar">
    </form>
    <div class="container">
        <h2>Clientes</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Email</th>
                <th>CPF/CNPJ</th>
                <th>RG</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Data de Nascimento</th>
                <th>Salário</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
                include('ConexaoBD.php');
                $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
                $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
                
                $query = "SELECT * FROM clientes WHERE 1=1";
                if (!empty($nome)) {
                    $query .= " AND nome LIKE '%$nome%'";
                }
                if (!empty($cidade)) {
                    $query .= " AND cidade LIKE '%$cidade%'";
                }
                $query .= " ORDER BY nome";
                
                $resu = mysqli_query($con, $query) or die(mysqli_error($con));
                
                while ($reg = mysqli_fetch_assoc($resu)) {
                    echo "<tr>";
                    foreach ($reg as $coluna => $valor) {
                        echo "<td>$valor</td>";
                    }
                    echo "<td><a href='AlterarCliente.php?id=". $reg['id'] . "'>Editar</a></td>"; 
                    echo "<td><a href='DeletarCliente.php?id=". $reg['id'] . "'>Excluir</a></td>"; 
                    echo "</tr>";
                }
                mysqli_close($con);
            ?>
        </table>
    </div>
    <button id="btnVoltar" onclick="window.location='Clientes.php'">Voltar</button>
</body>
</html>
