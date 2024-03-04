-- Inserindo dados na tabela de produtos
INSERT INTO produtos (nome, quantidade_estoque) VALUES ('Produto A', 100);
INSERT INTO produtos (nome, quantidade_estoque) VALUES ('Produto B', 150);
INSERT INTO produtos (nome, quantidade_estoque) VALUES ('Produto C', 200);

-- Inserindo dados na tabela de pedidos
INSERT INTO pedidos (produto_id, quantidade, valor_total) VALUES (1, 50, 500.00);
INSERT INTO pedidos (produto_id, quantidade, valor_total) VALUES (2, 30, 300.00);
INSERT INTO pedidos (produto_id, quantidade, valor_total) VALUES (3, 20, 400.00);
