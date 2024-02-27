CREATE FUNCTION empregados_gatilho() RETURNS trigger AS $$
BEGIN
--verificar se foi fornecido o nome e o salário do empregado
	IF NEW.nome IS NULL THEN
 		RAISE EXCEPTION 'O nome do empregado não pode ser nulo';
	END IF;
	IF NEW.salario IS NULL THEN
 		RAISE EXCEPTION '% não pode ter um salário nulo',
		NEW.nome;
	END IF;
	IF NEW.salario < 0 THEN
 		RAISE EXCEPTION '% não pode ter um salário negativo',
		NEW.nome;
	END IF;
--Registrar quem alterou a folha de pagamento e quando
	NEW.ultima_data := 'now';
	NEW.ultimo_usuario := current_user;
	RETURN NEW;
	END;
$$ LANGUAGE plpgsql;





