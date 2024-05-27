<?php
if (session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Vendedores </title>
</head>
<body>
    <?php
    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="">
        <center><h1> Vendedores</h1></center>
        <table border="1" width="100%">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <p><th colspan="2">Ações</th>
            </tr>
            <?php
            include('conexao.php');
            $sql = "SELECT * FROM vendedor ORDER BY nome";
            $resu = mysqli_query($con, $sql) or die(mysqli_connect_error());
            while ($reg = mysqli_fetch_array($resu)){
                echo "<tr>";
                echo "<td>" . $reg['id'] . "</td>";
                echo "<td>" . $reg['nome'] . "</td>";
                echo "<td><a href='edit_vendedor.php?id_vendedor=" . $reg['id'] . "'>Editar</a></td>";
                echo "<td><a href='excluir_vendedor.php?id=" . $reg['id'] . "'>Excluir</a></td>";
                echo "</tr>";
            } 
            ?>
        </table>
    </form>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>
