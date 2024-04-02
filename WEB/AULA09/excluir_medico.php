<!DOCTYPE html>
<html lang="ept-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Medico</title>
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
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .button-container {
            text-align: center;
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
<h1>Excluir Médico</h1>
    <button id="btnVoltar" onclick="window.location='consulta_medico.php'">Voltar</button>
    
    <?php
    if (isset($_GET['id'])) {
        include('conexao.php');
        $id = $_GET['id'];
    
        
        $query_check = "SELECT * FROM medico WHERE id_medico = $id";
        $result_check = mysqli_query($con, $query_check);
    
        if (mysqli_num_rows($result_check) > 0) { 
          $row = mysqli_fetch_assoc($result_check);
    
          echo "<table>";
          echo "<tr><th>ID</th><th>Nome do Médico</th><th>CRM</th></tr>";
          echo "<tr><td>" . $row['id_medico'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['CRM'] . "</td></tr>";
          echo "</table>";
          echo "<p>Confirma a exclusão?</p>";
    
          
          echo "<form method='POST'>";
          echo "<input type='hidden' name='id_medico' value='" . $row['id_medico'] . "'>";
          echo "<div class='button-container'>";
          echo "<input type='submit' name='excluir' value='Excluir'>";
          echo "<input type='submit' name='cancelar' value='Cancelar'>";
          echo "</div></form>";
        } else {
          echo "Médico não encontrado!"; 
        }
      }
    
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['excluir'])) {
          include('conexao.php');
          $id_medico = $_POST['id_medico']; 
    
        
          $id_medico = mysqli_real_escape_string($con, $id_medico);
    
          $query_excluir = "DELETE FROM medico WHERE id_medico = '$id_medico'";
    
          if (mysqli_query($con, $query_excluir)) {
            echo "Médico excluído com sucesso.";
          } else {
            echo "Erro ao excluir médico: " . mysqli_error($con);
          }
    
          mysqli_close($con);
          exit;
        } elseif (isset($_POST['cancelar'])) {
          header("Location: consulta_medico.php");
          exit;
        }
      }
      ?>
      <button id="btnVoltar" onclick="window.location='consulta_medico.php'">Voltar</button>
</body>
</html>