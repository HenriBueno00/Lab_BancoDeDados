<html>
    <head>
        <meta charset="UTF-8"><title>Consulta de Forma de Pagamento</title>
    </head>
    <body>
        <button onclick="location.href='formapgto.php'" type="button">Voltar</button>
        <form method="POST">
            <p><center><h1>Formas de Pagamento</center><h1>
            <table border="1" width="100%">
            <?php
                include("ConexaoBD.php");
                $query= "SELECT * FROM forma_pagto ORDER BY nome";
                $resultado=mysqli_query($con,$query) or die (mysqli_connect_error());
                echo "<tr><td><b>Nome</td></tr>";
                while ($reg = mysqli_fetch_array($resultado)){
                    echo "<tr><td>".$reg['nome']."</td>";
                    echo "<td><a href='AlterarFormaPgto.php?id=".$reg['id']."'>Editar</a></td>";
                    echo "<td><a href='DeletarFormaPgto.php?id=".$reg['id']."'>Excluir</a></td></tr>";
                }
              ?>      
            </table>
        </form>
        <?php
            mysqli_close($con);
        ?>
    </body>
</html>