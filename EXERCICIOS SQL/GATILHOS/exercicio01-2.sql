CREATE TRIGGER empregados_gatilho BEFORE
INSERT OR UPDATE ON empregados FOR EACH ROW
	EXECUTE PROCEDURE empregados_gatilho();
		
INSERT INTO empregados (codigo,nome, salario) VALUES (5,'João',1000);
INSERT INTO empregados (codigo,nome, salario) VALUES (6,'José',1500);
INSERT INTO empregados (codigo,nome, salario) VALUES (7,'Maria',2500);

SELECT * FROM empregados;
INSERT INTO empregados (codigo,nome, salario) VALUES (5,NULL,1000);
INSERT INTO empregados (codigo,nome, salario) VALUES (5,'Andréia',NULL);