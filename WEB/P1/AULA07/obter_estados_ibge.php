<?php
// URL da API do IBGE para obter a lista de estados brasileiros
$url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';

// Faz a requisição para a API e obtém a resposta
$response = file_get_contents($url);

// Decodifica a resposta JSON em um array associativo
$estados = json_decode($response, true);

// Verifica se houve erro na requisição
if (!$estados || !is_array($estados)) {
    die('Erro ao obter a lista de estados.');
}

// Exibe a lista de estados em formato de menu suspenso
echo '<select name="estado" id="estado">';
echo '<option value="">Selecione o Estado</option>';
foreach ($estados as $estado) {
    echo '<option value="' . $estado['sigla'] . '">' . $estado['nome'] . '</option>';
}
echo '</select>';
?>
