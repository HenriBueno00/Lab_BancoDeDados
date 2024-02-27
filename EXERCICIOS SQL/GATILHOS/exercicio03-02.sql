CREATE TRIGGER trg_agendamentos_ins
BEFORE INSERT ON agendamentos
FOR EACH ROW EXECUTE PROCEDURE
fun_verifica_agendamentos();
CREATE TRIGGER trg_agendamentos_upd
BEFORE UPDATE ON agendamentos
FOR EACH ROW EXECUTE PROCEDURE
fun_verifica_agendamentos();

INSERT INTO agendamentos VALUES (DEFAULT,'Joana','Congresso',’2005-08-23',’2005-08-25')
INSERT INTO agendamentos VALUES (DEFAULT,'Joana','Viagem','2005-08-24','2005-08-26');
INSERT INTO agendamentos VALUES (DEFAULT,'Joana','Palestra','2005-08-23','2005-08-26');
SELECT * from agendamentos

INSERT INTO agendamentos VALUES
(DEFAULT,'Maria','Cabeleireiro','2005-08-23
14:00:00','2005-08-23 15:00:00');
INSERT INTO agendamentos VALUES
(DEFAULT,'Maria','Manicure','2005-08-23
15:00:00','2005-08-23 16:00:00');INSERT INTO agendamentos VALUES
(DEFAULT,'Maria','Médico','2005-08-23
14:30:00','2005-08-23 15:00:00');SELECT * from agendamentos
