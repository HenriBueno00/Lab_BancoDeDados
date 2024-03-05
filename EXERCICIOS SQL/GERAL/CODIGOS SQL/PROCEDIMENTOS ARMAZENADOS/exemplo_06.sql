CREATE OR REPLACE FUNCTION
obter_dados_por_id(id integer) RETURNS TABLE
(nome text, idade integer) AS $$
SELECT nome, idade FROM tabela_exemplo
WHERE id = id;
$$ LANGUAGE SQL;