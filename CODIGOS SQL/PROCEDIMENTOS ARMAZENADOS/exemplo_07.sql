CREATE FUNCTION retorna_maior(anyelement,
anyelement) RETURNS boolean AS
$$
SELECT $1 > $2;
$$ LANGUAGE SQL;