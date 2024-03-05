CREATE OR REPLACE FUNCTION verifica_quantidade_estoque() 
RETURNS TRIGGER AS $$
BEGIN
    -- Obtém a quantidade em estoque do produto
    DECLARE
        estoque_atual INTEGER;
    BEGIN
        SELECT quantidade_estoque INTO estoque_atual
        FROM produtos
        WHERE id = NEW.produto_id;

        -- Verifica se a quantidade em estoque é suficiente para o pedido
        IF NEW.quantidade > estoque_atual THEN
            -- Se a quantidade vendida for maior que a quantidade em estoque, exibe uma mensagem e cancela a inserção
            RAISE EXCEPTION 'Quantidade insuficiente em estoque para o produto selecionado';
        END IF;

        RETURN NEW;
    END;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER verifica_quantidade_estoque_trigger
BEFORE INSERT ON pedidos
FOR EACH ROW
EXECUTE FUNCTION verifica_quantidade_estoque();
