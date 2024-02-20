CREATE FUNCTION qtde_disciplinas_curso(integer)
RETURNS bigint AS $$
 SELECT COUNT(cod_curso) FROM curso_disciplina
WHERE cod_curso= $1
$$ LANGUAGE SQL;