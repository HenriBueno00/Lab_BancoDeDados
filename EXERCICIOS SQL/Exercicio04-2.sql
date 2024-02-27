CREATE OR REPLACE FUNCTION calcular_fatorial(numero integer)
RETURNS INTEGER AS $$
DECLARE
    resultado INTEGER := 1;
BEGIN
    IF numero < 0 THEN
        RAISE EXCEPTION 'O número deve ser não negativo';
    END IF;

    FOR i IN 1..numero LOOP
        resultado := resultado * i;
    END LOOP;

    RETURN resultado;
END;
$$ LANGUAGE plpgsql;

SELECT calcular_fatorial(5); -- Retorna 120 (5!)
SELECT calcular_fatorial(0); -- Retorna 1 (0! é definido como 1)
SELECT calcular_fatorial(10); -- Retorna 3628800 (10!)
