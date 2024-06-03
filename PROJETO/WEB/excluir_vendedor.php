<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title> Vendedor </title>
</head>
<body>
    <h1> Exclusao</h1>
    <?php

    if(isset($_GET['id'])){
        include('ConexaoBD.php');
        $id = $_GET['id'];

        $query = "SELECT * FROM vendedor WHERE id= $id";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);

        if ($row){
            echo "<p>ID: " .$row['id'] ."</p>";
            echo "<p> Confirmar a exclusao? </p>";
            echo "<form method='POST'>";
            echo "<input type= 'hidden' name='id' value='" .$row['id'] . "'>";
            echo "<input type= 'submit' name='confirmar' value='SIM'>";
            echo "<input type= 'submit' name='cancelar' value='NAO'>";
            echo "</form>";
        } else {
            echo " ID nao encontrado.";
        }

        mysqli_close($con);
}
?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])){
    include('ConexaoBD.php');

    $id_vendedor = $_POST['id'];
    $query = "DELETE FROM vendedor WHERE id = '$id_vendedor'";
    $resultado = mysqli_query($con, $query) or die(mysqli_error($con));
        
    if ($result) {
       echo " Vendedor excluído com sucesso!";
    } else{
        echo "Erro ao excluir vendedor. Verifique!" . mysqli_error($con);
    }

    mysqli_close($con);
    header("Location: cons_vendedor.php");
} elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
    
    header("Location: cons_vendedor.php");
    exit;
}

?>

</body>
</html>
