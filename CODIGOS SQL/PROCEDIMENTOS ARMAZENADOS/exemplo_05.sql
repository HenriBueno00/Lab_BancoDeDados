CREATE FUNCTION retorna_idade(int) RETURNS varchar AS
$$
SELECT TO_CHAR(AGE(CURRENT_DATE,data_nasc), 'YY') as
intervalo FROM aluno WHERE ra = $1
$$
LANGUAGE SQL;