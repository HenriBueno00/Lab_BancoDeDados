<?php
include('conexao.php');

$query = "SELECT * FROM especialidade";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Descrição</th><th>Sigla</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['descricao']."</td>";
        echo "<td>".$row['sigla']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum dado encontrado na tabela.";
}

mysqli_close($con);
?>
