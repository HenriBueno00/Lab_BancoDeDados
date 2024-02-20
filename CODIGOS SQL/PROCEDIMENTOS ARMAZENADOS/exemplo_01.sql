CREATE OR REPLACE FUNCTION
add_numeros(nr1 int, nr2 int) RETURNS int AS
$$
SELECT $1 + $2;
$$
LANGUAGE SQL;