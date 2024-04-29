<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Médico</title>
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-left: 10px;
        }
        select {
            cursor: pointer;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: calc(100% - 22px);
            margin-left: 10px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
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
    include('estados.php'); // Inclui a lista de estados
    ?>
    <h1>Editar Médico</h1>
    <?php
  // Start session if not already started
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) {
    include('conexao.php'); 

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $crm = $_POST["crm"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $salario = $_POST["salario"];
    $celular = $_POST["celular"];
    $cod_esp = $_POST["cod_esp"];

    $query = "UPDATE medico SET 
      nome='$nome', 
      CRM='$crm', 
      cpf='$cpf', 
      endereco='$endereco', 
      numero='$numero', 
      bairro='$bairro', 
      cidade='$cidade', 
      estado='$estado', 
      salario='$salario', 
      celular='$celular', 
      cod_esp='$cod_esp' 
    WHERE id_medico=$id";

    $result = mysqli_query($con, $query);

    if ($result) {
      echo "Atualização realizada com sucesso";
      $_SESSION['atualizacao_sucesso'] = true; // Store success message in session
    } else {
      echo "Erro ao atualizar dados: " . mysqli_error($con);
    }

    mysqli_close($con);
    header("Location: editar_medico.php?id=" . $id); // Redirect back to edit page with same ID
  } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {
    header("Location: consulta_medico.php");
  }
  ?>

  <?php
  if (isset($_GET['id'])) {
    include('conexao.php');
    $id = $_GET['id'];

    $query = "SELECT * FROM medico WHERE id_medico = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      ?>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id_medico']; ?>">
        <label for="">Nome do Médico</label>
        <input type="text" name="nome" size="100" maxlength="100" required value="<?php echo $row['nome']; ?>">
        <label for="">CRM</label>
        <input type="text" name="crm" size="10" maxlength="10" required value="<?php echo $row['CRM']; ?>">
        <label for="">CPF</label>
        <input type="text" name="cpf" size="11" maxlength="11" required value="<?php echo $row['cpf']; ?>">
        <label for="">Endereço</label>
        <input type="text" name="endereco" size="100" maxlength="100" required value="<?php echo $row['endereco']; ?>">
        <label for="">Número</label>
        <input type="text" name="numero" size="10" maxlength="10" required value="<?php echo $row['numero']; ?>">
        <label for="">Bairro</label>
        <input type="text" name="bairro" size="60" maxlength="60" required value="<?php echo $row['bairro']; ?>">
        <label for="">Cidade</label>
        <input type="text" name="cidade" size="80" maxlength="80" required value="<?php echo $row['cidade']; ?>">
        <label for="">Estado</label>
        <select name="estado" required>
            <?php
            foreach ($estados as $sigla => $nome) {
                echo "<option value='$sigla' ";
                if ($row['estado'] === $sigla) {
                    echo "selected";
                }
                echo ">$nome</option>";
            }
            ?>
        </select>
        <p><input type="submit" name="atualizar" value="Atualizar"></p>
        <input type="submit" name="cancelar" value="Cancelar">
    </form>
    <?php
        } else {
            echo "Médico não encontrado.";
        }
    }
    ?>

    

    <?php
    
    ?>
    <button id="btnVoltar" onclick="window.location='consulta_medico.php'">Voltar</button>
</body>
</html>
