<?php
include_once("ConexaoBD.php");

// Parâmetros de data de início e data final
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '2024-01-01';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '2024-12-31';

// Consulta para buscar pedidos e itens de pedidos
$sql = "
    SELECT 
        v.id,
        v.nome AS nome_vendedor,
        SUM(ip.qtde * pr.preco) AS total_vendido,
        SUM(ip.qtde * pr.preco * v.perc_comissao / 100) AS comissao
    FROM 
        vendedor v
    LEFT JOIN 
        pedidos p ON v.id = p.id_vendedor
    LEFT JOIN 
        itens_pedido ip ON p.id = ip.id_pedido
    LEFT JOIN 
        produto pr ON ip.id_produto = pr.id
    WHERE 
        p.data BETWEEN '$startDate' AND '$endDate'
    GROUP BY 
        v.id
    ORDER BY 
        v.nome
";

$resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");

$linha = "";

while ($registro = mysqli_fetch_array($resultado)) {
    $linha .= "<tr>";
    $linha .= "<td>" . $registro['nome_vendedor'] . "</td>";
    $linha .= "<td>" . number_format($registro['total_vendido'], 2, ',', '.') . "</td>";
    $linha .= "<td>" . number_format($registro['comissao'], 2, ',', '.') . "</td>";
    $linha .= "</tr>";
}

mysqli_close($con);

use Dompdf\Dompdf;
use Dompdf\Options;

require_once("dompdf/autoload.inc.php");

$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');

$dompdf = new Dompdf($options);
$dompdf->load_html('
<h1 style="text-align: center;">Relatório de Comissão de Vendedores</h1>
<hr>
<p>Período: ' . htmlspecialchars($startDate) . ' até ' . htmlspecialchars($endDate) . '</p>
<table border="1" width="100%" cellspacing="0" cellpadding="5">
<tr>
    <th>Vendedor</th>
    <th>Total Vendido</th>
    <th>Comissão Recebida</th>
</tr>
' . $linha . '
</table>
');

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("relatorio_comissao_vendedores.pdf", array("Attachment" => false));
?>
