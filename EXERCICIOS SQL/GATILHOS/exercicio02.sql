CREATE FUNCTION processa_emp_audit()
RETURNS TRIGGER AS $$
BEGIN
	IF (TG_OP = 'DELETE') THEN
		INSERT INTO empregados_audit SELECT 'E', user, now(), OLD.*;
		RETURN OLD;
	ELSIF (TG_OP = 'UPDATE') THEN
		INSERT INTO empregados_audit SELECT 'A', user, now(), NEW.*;
		RETURN NEW;
	ELSIF (TG_OP = 'INSERT') THEN
		INSERT INTO empregados_audit SELECT 'I', user, now(), NEW.*;
		RETURN NEW;
	END IF;
	RETURN NULL;
	END;
$$ language plpgsql;