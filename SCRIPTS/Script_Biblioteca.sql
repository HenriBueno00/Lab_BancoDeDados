CREATE TABLE socios (

codigo SERIAL NOT NULL PRIMARY KEY,

nome VARCHAR(30) NOT NULL,

endereco VARCHAR(25) NOT NULL,

cidade VARCHAR(20) NOT NULL,

uf CHAR(2) NOT NULL,

telefone VARCHAR(15) );

CREATE TABLE funcionarios (

codigo SERIAL NOT NULL PRIMARY KEY,

nome VARCHAR(30) NOT NULL,

endereco VARCHAR(25) NOT NULL,

cidade VARCHAR(20) NOT NULL,

uf CHAR(2) NOT NULL,

telefone VARCHAR(15) );

CREATE TABLE livros (

codigo SERIAL NOT NULL PRIMARY KEY ,

titulo VARCHAR(30) NOT NULL,

qtde_exemplares INTEGER NOT NULL,

preco_unit NUMERIC(10,2) NOT NULL );

CREATE TABLE emprestimos (

num SERIAL NOT NULL PRIMARY KEY,

data DATE NOT NULL,

cod_socio INTEGER REFERENCES socios (codigo),

cod_func INTEGER REFERENCES funcionarios (codigo),

data_devol DATE NOT NULL);

CREATE TABLE itens_emprestimos (

numero INTEGER REFERENCES emprestimos(num),

cod_livro INTEGER REFERENCES livros(codigo),

PRIMARY KEY(numero,cod_livro) );

INSERT INTO socios (nome,endereco,cidade,uf,telefone) VALUES ('Andreia Casare', 'Rua x','Tietê','SP','(15)3282-1010');

INSERT INTO socios (nome,endereco,cidade,uf,telefone) VALUES ('Aline Casare', 'Rua x','Cerquilho','SP','(15)3282-1010');

INSERT INTO socios (nome,endereco,cidade,uf,telefone) VALUES ('Luis da Silva', 'Rua 15 Novembro','Tietê','SP','(15)3282-1010');

INSERT INTO socios (nome,endereco,cidade,uf,telefone) VALUES ('Lana Moraes', 'Rua x','Tietê','SP','(15)3285-1212');

INSERT INTO socios (nome,endereco,cidade,uf,telefone) VALUES ('Tania Sousa', 'Rua x','Tietê','SP','(15)3282-1010');

INSERT INTO funcionarios (nome,endereco,cidade,uf,telefone) VALUES ('João Grillo', 'Rua x','Tietê','SP','(15)3282-1010');

INSERT INTO funcionarios (nome,endereco,cidade,uf,telefone) VALUES ('Fernando Cruz', 'Rua x','Cerquilho','SP','(15)3282-1010');

INSERT INTO funcionarios (nome,endereco,cidade,uf,telefone) VALUES ('Luiss da Silva', 'Rua 15 Novembro','Tietê','SP','(15)3282-1010');

INSERT INTO funcionarios (nome,endereco,cidade,uf,telefone) VALUES ('Lauro Moraes', 'Rua Santina','Piracicaba','SP','(15)3285-1212');

INSERT INTO funcionarios (nome,endereco,cidade,uf,telefone) VALUES ('Tania Sousa', 'Rua x','Tietê','SP','(15)3282-1010');

INSERT INTO livros (titulo,qtde_exemplares,preco_unit) VALUES ('Python ',5, 230.99);

INSERT INTO livros (titulo,qtde_exemplares,preco_unit) VALUES ('Sociologia ',3, 135.99);

INSERT INTO livros (titulo,qtde_exemplares,preco_unit) VALUES ('Mysql 5.0',7, 190.99);

INSERT INTO livros (titulo,qtde_exemplares,preco_unit) VALUES ('Lógica de Programação ',10, 230.99);

INSERT INTO livros (titulo,qtde_exemplares,preco_unit) VALUES ('Estatítica Aplicada ',5, 230.99);

INSERT INTO livros (titulo,qtde_exemplares,preco_unit) VALUES ('Banco de Dados ',12, 389.99);

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('10-07-2021',1, 2, '25-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('10-07-2021',2, 2, '25-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('30-06-2021',1, 2, '20-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('01-05-2021',2, 2, '25-5-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('01-06-2021',2, 3, '25-6-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('10-07-2021',2, 2, '25-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('10-07-2021',3, 2, '25-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('10-07-2021',4, 2, '25-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('30-06-2021',5, 2, '20-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('01-05-2021',3, 3, '25-5-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('01-06-2021',2, 3, '25-6-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('10-07-2021',2, 2, '25-7-2021');

INSERT INTO emprestimos (data,cod_socio, cod_func, data_devol) VALUES ('08-07-2021',4, 4, '25-7-2021');

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (1,2);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (1,3);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (1,4);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (2,3);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (2,4);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (2,5);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (3,3);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (3,4);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (3,5);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (3,2);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (4,1);

INSERT INTO itens_emprestimos (numero,cod_livro) VALUES (4,5);