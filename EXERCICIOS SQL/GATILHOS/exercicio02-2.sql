CREATE TRIGGER emp_audit AFTER INSERT OR
UPDATE OR DELETE ON empregados FOR EACH
ROW EXECUTE PROCEDURE processa_emp_audit();

INSERT INTO empregados (nome, salario) VALUES ('João',1000);
INSERT INTO empregados (nome, salario) VALUES ('José',1500);
INSERT INTO empregados (nome, salario) VALUES ('Maria',250);
UPDATE empregados SET salario = 2500 WHERE nome = 'Maria';
DELETE FROM empregados WHERE nome = 'João';
SELECT * FROM empregados;
SELECT * FROM empregados_audit;