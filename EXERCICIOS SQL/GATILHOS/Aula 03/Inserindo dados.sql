-- Inserindo um produto na tabela produtos
INSERT INTO produtos (nome, quantidade_estoque)
VALUES ('Produto A', 100);

-- Inserindo um pedido na tabela pedidos
-- Este pedido não irá disparar a exceção, pois a quantidade inserida é menor do que a quantidade em estoque do Produto A
INSERT INTO pedidos (produto_id, quantidade, valor_total)
VALUES (1, 50, 250.00);

-- Inserindo outro pedido na tabela pedidos
-- Este pedido irá disparar a exceção, pois a quantidade inserida é maior do que a quantidade em estoque do Produto A
INSERT INTO pedidos (produto_id, quantidade, valor_total)
VALUES (1, 200, 1000.00);
