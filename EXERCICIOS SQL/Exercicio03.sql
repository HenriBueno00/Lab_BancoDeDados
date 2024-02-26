CREATE OR REPLACE FUNCTION encontrar_maior(numero1 integer, numero2 integer, numero3 integer)
RETURNS INTEGER AS $$
DECLARE
    maior INTEGER;
BEGIN
    IF numero1 >= numero2 AND numero1 >= numero3 THEN
        maior := numero1;
    ELSIF numero2 >= numero1 AND numero2 >= numero3 THEN
        maior := numero2;
    ELSE
        maior := numero3;
    END IF;

    RETURN maior;
END;
$$ LANGUAGE plpgsql;
