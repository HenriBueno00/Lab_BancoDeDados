CREATE FUNCTION fun_verifica_agendamentos() RETURNS "trigger" AS $$
BEGIN
 	-- Verificar se a data de início é maior que a data de fim
 	IF NEW.data_inicio > NEW.data_fim THEN
 		RAISE EXCEPTION 'A data de início não pode ser maior que a data de fim';
 	END IF;
 	-- Verificar se há sobreposição com agendamentos existentes
 	IF EXISTS (
 		SELECT * FROM agendamentos WHERE nome = NEW.nome
 			AND ((data_inicio, data_fim) OVERLAPS
 				(NEW.data_inicio, NEW.data_fim))
 	)
 	THEN
 		RAISE EXCEPTION 'impossível agendar - existe outro compromisso';
 	END IF;
 	RETURN NEW;
 END;
$$ LANGUAGE plpgsql;