CREATE TABLE funcao (
    id integer AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100)
) engine INNODB;

CREATE TABLE enfermeiro(
    matricula integer AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(100),
    numero CHAR(10),
    bairro VARCHAR(50),
    cidade VARCHAR(80),
    estado CHAR(2),
    cpf VARCHAR(11),
    rg VARCHAR(9),
    telefone VARCHAR(15),
    celular VARCHAR(15),
    email VARCHAR(100),
    salario numeric (12,2),
    turno_trabalho varchar(15),
    id_funcao integer REFERENCES função (id)
 ) engine INNODB;

 INSERT INTO enfermeiro (nome, endereco, numero, bairro, cidade, estado, cpf, rg, telefone, celular, email, salario, turno_trabalho, id_funcao) VALUES
('Ana Silva', 'Rua das Flores', '123', 'Centro', 'São Paulo', 'SP', '12345678901', '123456789', '(11) 1234-5678', '(11) 98765-4321', 'ana@email.com', 3500.00, 'Diurno', 1),
('Carlos Santos', 'Av. Principal', '456', 'Bela Vista', 'Rio de Janeiro', 'RJ', '98765432109', '987654321', '(21) 9876-5432', '(21) 1234-5678', 'carlos@email.com', 3200.00, 'Noturno', 1),
('Mariana Oliveira', 'Rua dos Ipês', '789', 'Jardim Botânico', 'Curitiba', 'PR', '45678901234', '456789012', '(41) 3456-7890', '(41) 8765-4321', 'mariana@email.com', 3800.00, 'Diurno', 1),
('Pedro Mendes', 'Av. Central', '101', 'Centro', 'Belo Horizonte', 'MG', '34567890123', '345678901', '(31) 8901-2345', '(31) 6543-2109', 'pedro@email.com', 3300.00, 'Noturno', 1),
('Sandra Lima', 'Rua das Palmeiras', '222', 'Jardim América', 'Brasília', 'DF', '56789012345', '567890123', '(61) 2345-6789', '(61) 9012-3456', 'sandra@email.com', 3600.00, 'Diurno', 1),
('Lucas Fernandes', 'Av. das Águias', '333', 'Alto da Boa Vista', 'Salvador', 'BA', '67890123456', '678901234', '(71) 4567-8901', '(71) 8901-2345', 'lucas@email.com', 3400.00, 'Noturno', 1),
('Fernanda Souza', 'Rua das Orquídeas', '444', 'Centro', 'Porto Alegre', 'RS', '89012345678', '890123456', '(51) 6789-0123', '(51) 2345-6789', 'fernanda@email.com', 3700.00, 'Diurno', 1),
('Gustavo Santos', 'Av. das Palmeiras', '555', 'Jardim das Flores', 'Fortaleza', 'CE', '01234567890', '012345678', '(85) 9012-3456', '(85) 6789-0123', 'gustavo@email.com', 3500.00, 'Noturno', 1),
('Camila Costa', 'Rua das Margaridas', '666', 'Centro', 'Recife', 'PE', '23456789012', '234567890', '(81) 3456-7890', '(81) 0123-4567', 'camila@email.com', 3900.00, 'Diurno', 1),
('Rafaela Oliveira', 'Av. dos Girassóis', '777', 'Jardim das Flores', 'Goiânia', 'GO', '34567890123', '345678901', '(62) 9012-3456', '(62) 3456-7890', 'rafaela@email.com', 3200.00, 'Noturno', 1);

INSERT INTO funcao (descricao) VALUES
('Enfermeiro(a)'),
('Médico(a)'),
('Auxiliar de Enfermagem'),
('Técnico de Enfermagem'),
('Fisioterapeuta'),
('Nutricionista'),
('Psicólogo(a)'),
('Assistente Social'),
('Farmacêutico(a)'),
('Biomédico(a)');
