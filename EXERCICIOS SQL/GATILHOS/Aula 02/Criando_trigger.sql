CREATE TRIGGER atualizacao_estoque
AFTER INSERT ON pedidos
FOR EACH ROW
EXECUTE FUNCTION atualizar_estoque();