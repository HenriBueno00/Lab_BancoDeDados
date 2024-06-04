<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exclusão de Pedido</title>
</head>
<body>
    <h1>Exclusão de Pedido</h1>
    <?php
    if(isset($_GET['excluir'])){
        include("ConexaoBD.php");
        $id = $_GET['excluir'];
        $query = "SELECT * FROM pedidos WHERE id = $id";
        $resultado = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($resultado);
        if ($row) {
            echo "<p>ID: ". $row['id'] . "</p>";
            echo "<p>Data: ".$row['data'] . "</p>";
            echo "<p>Observação: ".$row['observacao'] . "</p>";
            echo "<p>Prazo de Entrega: ".$row['prazo_entrega'] . "</p>";
            echo "<p>ID do Vendedor: ".$row['id_vendedor'] . "</p>";
            echo "<p>Confirma a exclusão?</p>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<input type='submit' name='confirmar' value='Sim'>";
            echo "<input type='submit' name='cancelar' value='Não'>";
            echo "</form>";
        }else{
            echo "Pedido não encontrado.";
        }
        mysqli_close($con);
    } else{
        echo "ID do pedido não especificado.";
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])){
        include("ConexaoBD.php");
        $id = $_POST["id"];
        $query_delete_itens = "DELETE FROM itens_pedido WHERE id_pedido = $id";
        $result_delete_itens = mysqli_query($con, $query_delete_itens);
        if ($result_delete_itens){
            $query_delete_pedido = "DELETE FROM pedidos WHERE id = $id";
            $result_delete_pedido = mysqli_query($con, $query_delete_pedido);
            if ($result_delete_pedido){
                echo "Pedido excluído com sucesso!";
                // Redirecionar para a página de exclusão de pedido após 3 segundos
                echo "<meta http-equiv='refresh' content='3;url=pedido_ex.php'>";
            } else{
                echo "Erro ao excluir o pedido: ".mysqli_error($con);
            }
        } else{
            echo "Erro ao excluir os itens do pedido: ".mysqli_error($con);
        }
        mysqli_close($con);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){
        header("Location: pedido_ex.php");
        exit;
    }   
    ?>
</body>
</html>
