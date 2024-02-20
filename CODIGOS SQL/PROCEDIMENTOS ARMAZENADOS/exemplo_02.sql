CREATE OR REPLACE FUNCTION inserir_dados(nome text,
idade integer) RETURNS void AS $$
INSERT INTO tabela_exemplo (nome, idade) VALUES
(nome, idade);
$$ LANGUAGE SQL