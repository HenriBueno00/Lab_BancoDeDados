CREATE TABLE curso (
    cod serial PRIMARY KEY,
    sigla char(3) NOT NULL,
    nome varchar(50) NOT NULL,
    area varchar(30) );

CREATE TABLE turma(
    cod serial PRIMARY KEY,
    periodo varchar(15) NOT NULL,
    cod_curso integer REFERENCES curso(cod) );
    
CREATE TABLE aluno (
    ra integer PRIMARY KEY,
    nome varchar(50) NOT NULL,
    endereco varchar(60) NOT NULL,
    cidade varchar(40) NOT NULL,
    uf char(2) NOT NULL,
    telefone varchar(15),
    celular varchar(15) NOT NULL,
    cod_turma integer REFERENCES turma(cod),
    data_nasc date );


CREATE TABLE professor (
    matricula serial  PRIMARY KEY,
    nome varchar(50) NOT NULL,
    endereco varchar(60) NOT NULL,
    cidade varchar(40) NOT NULL,
    estado char(2) NOT NULL,
    telefone varchar(15),
    celular varchar(15) NOT NULL,
    titulacao varchar(20) );

CREATE TABLE disciplina (
    cod serial PRIMARY KEY,
    nome varchar(60) NOT NULL,
    sigla char(5) NOT NULL,
    cod_prof integer REFERENCES professor(matricula),
    carga_hor integer);

CREATE TABLE curso_disciplina(
    cod_curso integer  REFERENCES curso(cod),
    cod_discip integer REFERENCES disciplina (cod),
    PRIMARY KEY(cod_curso,cod_discip));


CREATE TABLE disciplinas_aluno(
    cod_aluno integer REFERENCES aluno(ra),
    cod_discip integer REFERENCES disciplina(cod),
    nota numeric(4,2),
    PRIMARY KEY (cod_aluno, cod_discip) );

CREATE TABLE bibliografia (
    cod serial PRIMARY KEY,
    descricao varchar(200) NOT NULL );

CREATE TABLE disciplina_biblio (
    cod_discip integer REFERENCES disciplina(cod),
    cod_biblio integer REFERENCES bibliografia (cod),
    PRIMARY KEY (cod_discip, cod_biblio)) ;


INSERT INTO curso(sigla, nome, area)
	VALUES ('ADS','Analise e Desenvolvimento Sistemas','Exatas');
    
INSERT INTO curso(sigla, nome, area)
	VALUES ('AGR','Agronegocio','Aplicada');

INSERT INTO curso(sigla, nome, area)
	VALUES ('CMX','Comercio Exterior','Humanas');

INSERT INTO curso(sigla, nome, area)
	VALUES ('GPI','Gestao Producao Industrial','Humanas');

INSERT INTO curso(sigla, nome, area)
	VALUES ('ADM','Administração de Empresas','Humanas');

INSERT INTO curso(sigla, nome, area)
	VALUES ('DIR','Direito','Humanas');

INSERT INTO turma(periodo, cod_curso)
	VALUES ('Matutino', 1);
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Noturno', 1);
    
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Matutino', 2);
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Noturno', 2);
    
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Matutino', 3);
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Noturno', 3);
    
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Matutino', 4);
    
INSERT INTO turma(periodo, cod_curso)
	VALUES ('Noturno', 4);

INSERT INTO turma(periodo, cod_curso)
	VALUES ('Noturno', 5);

INSERT INTO turma(periodo, cod_curso)
	VALUES ('Matutino', 5);

INSERT INTO turma(periodo, cod_curso)
	VALUES ('Noturno', 6);




INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2013001,'Jose Antonio ilva','Rua X - 10','Tiete','SP','(15)3345-1010','(15)99716-1910',1, '1994-10-02');
    
INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2013012,'Maria Clara','Rua X - 10','Tiete','SP','(15)3345-1010','(15)99716-1910',1, '1994-11-02');    
    
INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2014010,'Luiz Henrique','Rua X - 10','Tiete','SP','(15)3345-1010','(15)99716-1910',2, '1994-11-02');    
    
INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2015001,'Mariana Lucia','Rua X - 10','Tiete','SP','(15)3345-1010','(15)99716-1910',1, '1995-03-02');
    
INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2016012,'Henrique','Rua X - 10','Tiete','SP','(15)3345-1010','(15)99716-1910',3, '1996-01-12');
    
INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2016013,'Rafael Luis Sandei','Rua XV - 12','Tatui','SP','(15)3345-1010','(15)99716-1910',4, '1995-01-12');
    
INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2016020,'Rafael Jose Sandei','Rua Joao Barth - 12','Tatui','SP','(15)3345-1010','(15)99716-1910',4, '2000-01-12');

INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2022030,'Rafael Henrique Sandei','Rua XV de Novembro - 20','Itapetininga','SP','(15)3345-1010','(15)99716-1910',4, '2002-01-12');


INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2016022,'Gustavo Jose Rodrigues','Rua Jair Barth - 12','Itapetininga','SP','(15)3345-1010','(15)99716-1910',4, '2000-01-12');

INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2021022,'Gustavo Matheus Rodrigues','Rua Joser Barth - 30','Itapetininga','SP','(15)3345-1010','(15)99718-1910',4, '2005-02-12');

INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2021023,'Matheus Henrique','Rua  Soares Hungria - 30','Tatui','SP','(15)3345-1010','(15)99718-1910',4, '2005-02-12');

INSERT INTO aluno(ra, nome, endereco, cidade, uf, telefone, celular, cod_turma, data_nasc)
	VALUES (2021025,'Luna Rodrigues da Silva','Av. Brasil - 200','Tatui','SP','(15)3345-1010','(15)99718-1910',4, '2007-02-12');



INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Sandra','Rua X','Itapetininga','SP','(15)99999-8888','(15)78669-1010','Mestre');
    
INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Andressa','Rua ZZ','Itapetininga','SP','(15)99999-8888','(15)78669-1010','Doutora');
    
INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Marli','Rua ZZ','Itapetininga','SP','(15)99999-8888','(15)78669-1010','Especialista');
    
INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Roberto','Rua ZZ','Boituva','SP','(15)99999-8888','(15)78669-1010','Mestre');
    
INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Danilo','Rua ZZ','Itapetininga','SP','(15)99999-8888','(15)78669-1010','Especialista');
    
    
INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Andreia','Rua ZZ','Tiete','SP','(15)99999-8888','(15)78669-1010','Mestre');
    
INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Marcus Vinicius','Rua AAA','Itapetininga','SP','(15)99999-1212','(15)78669-1010','Mestre');

INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Andre Fernando','Rua AAA','Tatui','SP','(15)99999-1212','(15)78669-1010','Doutor');

INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('João Luiz','Rua AAA','Tiete','SP','(15)99999-1212','(15)78669-1010','Doutor');

INSERT INTO professor(nome, endereco, cidade, estado, telefone, celular, titulacao)
	VALUES ('Samuel Rosa','Rua BBBBB','Tietei','SP','(15)99999-1212','(15)78669-1010','Especialista');


INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Banco de Dados','BD', 4, 80);
    
INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Linguagem de Programação','LP', 4, 80);    
    
INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Estrutura de Dados','ED', 5, 80);
    
INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Administracao','ADM', 3, 80);
    
INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Gestao de Equipes','GE', 2, 40);
    
INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Inteligência Artificial','IA', 3, 80);


INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Topicos especiais','TP', 6, 80);

INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Engenharia de Software','EN', 6, 80);

INSERT INTO disciplina(nome, sigla, cod_prof, carga_hor)
	VALUES ('Estatistica','ES', 4, 80);


INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2013001, 1, 6);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2014010, 2, 7);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2013001, 3, 5);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2014010, 1, 4);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2015001, 2, 7);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2015001, 3, 7);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2016020, 4, 6);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2016020, 5, 8);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2013012, 1, 7);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2013012, 3, 9);

INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2013012, 5, 6);
    
INSERT INTO disciplinas_aluno(Cod_aluno, cod_discip, nota)
	VALUES (2013012, 4, 8);


INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (1, 1);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (1, 2);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (1, 3);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (1, 4);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (1, 5);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (2, 1);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (2, 2);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (2, 3);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (2, 4);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (2, 5);
    
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (3, 1);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (3, 2);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (3, 3);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (3, 4);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (3, 5);
    
INSERT INTO curso_disciplina(cod_curso, cod_discip)
	VALUES (4, 1);

INSERT INTO bibliografia(descricao)
	VALUES ('Banco de dados');
    
INSERT INTO bibliografia(descricao)
	VALUES ('Introducao Linguagem de Programacao');
    
INSERT INTO bibliografia(descricao)
	VALUES ('Introdução HTML');
    
INSERT INTO bibliografia(descricao)
	VALUES ('PHP e MySQL');
    
INSERT INTO bibliografia(descricao)
	VALUES ('Lógica de Programação');
    
INSERT INTO bibliografia(descricao)
	VALUES ('Matemática Aplicada');

INSERT INTO bibliografia(descricao)
	VALUES ('Inteligência Artifical');
    
INSERT INTO bibliografia(descricao)
	VALUES ('Conceitos e Aplicação Mineração de Dados');
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (1, 1);
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (1, 2);
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (1, 4);
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (2, 2);
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (2, 1);
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (3, 3);
    
INSERT INTO disciplina_biblio(cod_discip, cod_biblio)
	VALUES (4, 2);

