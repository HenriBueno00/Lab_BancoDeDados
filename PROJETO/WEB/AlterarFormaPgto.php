<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Alterar forma de pagamento existente</title>
</head>
<body>
    <h1>Alteração</h1>
    <?php
        if ($_SERVER ["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])){
            include ("ConexaoBD.php");

            $id = $_POST["id"];
            $nome = $_POST["nome"];

            $query= "UPDATE forma_pagto SET nome='$nome' WHERE id=$id";

            $resultado1=mysqli_query($con,$query);

            if ($resultado1) {
                echo "Atualização de forma de pagamento realizada com sucesso!";
            } else{
                echo "Erro ao atualizar informações de pagamento: ".mysqli_error($con);
            }
            mysqli_close($con);
            header("Location: ConsultaFormaPgto.php");
        }
        elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
            header("Location: ConsultaFormaPgto.php");
        }
    ?>
    <?php
        if(isset($_GET['id'])){
            include("ConexaoBD.php");
            $id = $_GET['id'];
            $query = "SELECT * FROM forma_pagto WHERE id = $id";
            $resultado2 = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($resultado2);
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Descrição da forma de pagamento:</label>
            <input type="text" name="nome" size="100" maxlength="100" required value="<?php echo $row['nome']; ?>">
            <p>
            <input type="submit" name="atualizar" value="Atualizar">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>
    <?php
        }
    ?>
 </body>
 </html>
    


    