CREATE TABLE produtos(
	id SERIAL PRIMARY KEY,
	nome VARCHAR(100),
	quantidade_estoque INTEGER
);
CREATE TABLE pedidos(
	id SERIAL PRIMARY KEY,
	produto_id INTEGER REFERENCES produtos(id),
	quantidade INTEGER,
	valor_total DECIMAL(10, 2)
);