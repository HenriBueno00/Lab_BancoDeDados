<?php
include_once("ConexaoBD.php");

// Parâmetros de data de início e data final
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '2024-01-01';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '2024-12-31';

// Consulta para buscar pedidos e itens de pedidos
$sql = "
    SELECT p.id, p.data, p.observacao, p.prazo_entrega, c.nome AS nome_cliente, v.nome AS nome_vendedor, f.nome AS forma_pagto, 
           ip.id_item, pr.nome AS nome_produto, ip.qtde
    FROM pedidos p
    LEFT JOIN itens_pedido ip ON p.id = ip.id_pedido
    LEFT JOIN produto pr ON ip.id_produto = pr.id
    LEFT JOIN clientes c ON p.id_cliente = c.id
    LEFT JOIN vendedor v ON p.id_vendedor = v.id
    LEFT JOIN forma_pagto f ON p.id_forma_pagto = f.id
    WHERE p.data BETWEEN '$startDate' AND '$endDate'
    ORDER BY p.id, ip.id_item
";

$resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");

$linha = "";
$lastOrderId = null;

while ($registro = mysqli_fetch_array($resultado)) {
    if ($lastOrderId != $registro['id']) {
        if ($lastOrderId !== null) {
            $linha .= "</table></td></tr>";
        }
        $linha .= "<tr>";
        $linha .= "<td>" . $registro['id'] . "</td>";
        $linha .= "<td>" . date("d/m/Y", strtotime($registro['data'])) . "</td>";
        $linha .= "<td>" . $registro['nome_cliente'] . "</td>";
        $linha .= "<td>" . $registro['nome_vendedor'] . "</td>";
        $linha .= "<td>" . $registro['forma_pagto'] . "</td>";
        $linha .= "<td>" . $registro['observacao'] . "</td>";
        $linha .= "<td>" . $registro['prazo_entrega'] . "</td>";
        $linha .= "<td><table border='1' cellspacing='0' cellpadding='5'>";
        $linha .= "<tr><th>ID Item</th><th>Produto</th><th>Quantidade</th></tr>";
    }
    $linha .= "<tr>";
    $linha .= "<td>" . $registro['id_item'] . "</td>";
    $linha .= "<td>" . $registro['nome_produto'] . "</td>";
    $linha .= "<td>" . $registro['qtde'] . "</td>";
    $linha .= "</tr>";
    
    $lastOrderId = $registro['id'];
}

if ($lastOrderId !== null) {
    $linha .= "</table></td></tr>";
}

mysqli_close($con);

use Dompdf\Dompdf;
use Dompdf\Options;

require_once("dompdf/autoload.inc.php");

$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');

$dompdf = new Dompdf($options);
$dompdf->load_html('
<h1 style="text-align: center;">Relatório de Pedidos</h1>
<hr>
<p>Período: ' . htmlspecialchars($startDate) . ' até ' . htmlspecialchars($endDate) . '</p>
<table border="1" width="100%" cellspacing="0" cellpadding="5">
<tr>
    <th>ID Pedido</th>
    <th>Data</th>
    <th>Cliente</th>
    <th>Vendedor</th>
    <th>Forma de Pagamento</th>
    <th>Observação</th>
    <th>Prazo de Entrega</th>
    <th>Itens</th>
</tr>
' . $linha . '
</table>
');

$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("relatorio_pedidos.pdf", array("Attachment" => false));
?>
