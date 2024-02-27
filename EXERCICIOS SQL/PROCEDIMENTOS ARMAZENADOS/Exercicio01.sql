CREATE OR REPLACE FUNCTION contar_disciplinas_por_professor(codigo_professor integer)
RETURNS INTEGER AS $$
DECLARE
    total_disciplinas INTEGER;
BEGIN
    SELECT COUNT(*) INTO total_disciplinas
    FROM disciplina
    WHERE cod_prof = codigo_professor;

    RETURN total_disciplinas;
END;
$$ LANGUAGE plpgsql;
