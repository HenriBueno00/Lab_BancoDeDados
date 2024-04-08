<?php
    if (session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar medico</title>
</head>
<body>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="" method="post">
        <p><center><h1> Medicos</h1></center>
        <table border="1" width="100%">
        <?php
            include('conexao.php');
            $sql="select * from medico order by nome";
            $resu=mysqli_query($con,$sql) or die(mysqli_connect_error());
            while ($reg = mysqli_fetch_array($resu)){
                echo "<tr><td>" . $reg['id_medico'] . "</td>"; 
                echo "<td>" . $reg['nome'] . "</td>"; 
                echo "<td><a href='edit_medico.php?id_medico=". $reg['id_medico'] . "'>Editar</a></td>"; 
                echo "<td><a href='del_medico.php?id_medico=". $reg['id_medico'] . "'>Excluir</a></td></tr>"; 
            }
        ?>
        </table></form>
        <?php
            mysqli_close($con);
        ?>
</body>
</html>
