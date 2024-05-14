<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exclusão de forma de pagamento</title>
    </head>
    <body>
        <h1>Exclusão</h1>
        <?php
        if(isset($_GET['id'])){
            include("ConexaoBD.php");
            $id = $_GET['id'];
            $query = "SELECT * FROM forma_pagto WHERE id = $id";
            $resultado = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($resultado);
            if ($row) {
                echo "<p>ID: ". $row['id'] . "</p>";
                echo "<p>Nome: ".$row['nome'] . "</p>";
                echo "<p>Confirma a exclusão?</p>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                echo "<input type='submit' name='confirmar' value='Sim'>";
                echo "<input type='submit' name='cancelar' value='Não'>";
                echo "</form>";
            }else{
                echo "Forma de pagamento não encontrada.";
            }
            mysqli_close($con);
        } else{
            echo "ID da forma de pagamento não especificado.";
        }
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])){
            include("ConexaoBD.php");
            $id = $_POST["id"];
            $query = "DELETE FROM forma_pagto WHERE id = $id";
            $result = mysqli_query($con, $query);
            if ($result){
                echo "Forma de pagamento excluida com sucesso!";
            } else{
                echo "Erro ao excluir a forma de pagamento: ".mysqli_error($con);
            }
            mysqli_close($con);
            header("Location: forma_pagto.php");
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
            header("Location: forma_pagto.php");
            exit;
        }   
        ?>
    </body>
</html>

    
