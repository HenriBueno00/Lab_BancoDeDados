CREATE FUNCTION add_ponto(disciplinas_aluno)
RETURNS numeric AS $$
 SELECT $1.nota + 0.5 AS nota;
$$ LANGUAGE SQL;
select * from disciplinas_aluno where cod_aluno = 1