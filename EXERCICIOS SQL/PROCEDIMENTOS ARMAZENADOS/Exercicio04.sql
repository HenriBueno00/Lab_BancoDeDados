CREATE OR REPLACE FUNCTION calcular_fatorial(numero integer)
RETURNS INTEGER AS $$
DECLARE
    resultado INTEGER := 1;
    i INTEGER := 1;
BEGIN
    IF numero < 0 THEN
        RAISE EXCEPTION 'O número deve ser não negativo';
    END IF;

    WHILE i <= numero LOOP
        resultado := resultado * i;
        i := i + 1;
    END LOOP;

    RETURN resultado;
END;
$$ LANGUAGE plpgsql;

SELECT calcular_fatorial(5);
SELECT calcular_fatorial(0); 
SELECT calcular_fatorial(10); 
