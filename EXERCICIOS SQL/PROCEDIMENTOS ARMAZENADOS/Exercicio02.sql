CREATE OR REPLACE FUNCTION verificar_positivo(numero integer)
RETURNS BOOLEAN AS $$
DECLARE
    positivo BOOLEAN;
BEGIN
    IF numero > 0 THEN
        positivo := TRUE;
    ELSE
        positivo := FALSE;
    END IF;

    RETURN positivo;
END;
$$ LANGUAGE plpgsql;
