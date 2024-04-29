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
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
            padding: 6px 12px;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
        }
        a:hover {
            background-color: #45a049;
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
                echo "<td><a href='excluir_medico.php?id_medico=". $reg['id_medico'] . "'>Excluir</a></td></tr>"; 
            }
        ?>
        </table></form>
        <?php
            mysqli_close($con);
        ?>
        <button id="btnVoltar" onclick="window.location='home.php'">Voltar</button>
</body>
</html>
