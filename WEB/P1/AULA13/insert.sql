-- Inserts para a tabela especialidade
INSERT INTO especialidade (descricao, sigla) VALUES ('Cardiologia', 'CAR');
INSERT INTO especialidade (descricao, sigla) VALUES ('Dermatologia', 'DER');
INSERT INTO especialidade (descricao, sigla) VALUES ('Ginecologia', 'GIN');
INSERT INTO especialidade (descricao, sigla) VALUES ('Ortopedia', 'ORT');
INSERT INTO especialidade (descricao, sigla) VALUES ('Pediatria', 'PED');

-- Inserts para a tabela medico
INSERT INTO medico (nome, cpf, endereco, numero, bairro, cidade, estado, CRM, salario, celular, cod_esp)
VALUES ('João Silva', '12345678901', 'Rua A', '100', 'Centro', 'Cidade A', 'SP', '12345', 10000.00, '999999999', 1);
INSERT INTO medico (nome, cpf, endereco, numero, bairro, cidade, estado, CRM, salario, celular, cod_esp)
VALUES ('Maria Santos', '98765432109', 'Rua B', '200', 'Centro', 'Cidade B', 'RJ', '54321', 9000.00, '888888888', 2);
INSERT INTO medico (nome, cpf, endereco, numero, bairro, cidade, estado, CRM, salario, celular, cod_esp)
VALUES ('Pedro Oliveira', '45678901234', 'Rua C', '300', 'Centro', 'Cidade C', 'MG', '67890', 11000.00, '777777777', 3);

-- Inserts para a tabela paciente
INSERT INTO paciente (nome, endereco, numero, complemento, bairro, cidade, estado, cpf, rg, telefone, celular, email)
VALUES ('Ana Souza', 'Rua X', '50', 'Ap. 101', 'Centro', 'Cidade X', 'SP', '12345678901', '987654321', '111111111', '999999999', 'ana@example.com');
INSERT INTO paciente (nome, endereco, numero, complemento, bairro, cidade, estado, cpf, rg, telefone, celular, email)
VALUES ('Carlos Oliveira', 'Rua Y', '60', '', 'Centro', 'Cidade Y', 'RJ', '23456789012', '876543210', '222222222', '888888888', 'carlos@example.com');
INSERT INTO paciente (nome, endereco, numero, complemento, bairro, cidade, estado, cpf, rg, telefone, celular, email)
VALUES ('Mariana Santos', 'Rua Z', '70', 'Ap. 202', 'Centro', 'Cidade Z', 'MG', '34567890123', '765432109', '333333333', '777777777', 'mariana@example.com');

-- Inserts para a tabela telefone
INSERT INTO telefone (numero, id_paciente) VALUES ('555555555', 1);
INSERT INTO telefone (numero, id_paciente) VALUES ('666666666', 2);
INSERT INTO telefone (numero, id_paciente) VALUES ('777777777', 3);

-- Inserts para a tabela função
INSERT INTO funcao (descricao) VALUES ('Enfermeiro');
INSERT INTO funcao (descricao) VALUES ('Técnico de Enfermagem');
INSERT INTO funcao (descricao) VALUES ('Auxiliar de Enfermagem');

-- Inserts para a tabela enfermeiro
INSERT INTO enfermeiro (nome, endereco, numero, bairro, cidade, estado, cpf, rg, telefone, celular, email, salario, turno_trabalho, id_funcao)
VALUES ('Fernanda Oliveira', 'Rua M', '10', 'Centro', 'Cidade M', 'SP', '12345678901', '987654321', '444444444', '999999999', 'fernanda@example.com', 5000.00, 'Diurno', 1);
INSERT INTO enfermeiro (nome, endereco, numero, bairro, cidade, estado, cpf, rg, telefone, celular, email, salario, turno_trabalho, id_funcao)
VALUES ('Rafaela Santos', 'Rua N', '20', 'Centro', 'Cidade N', 'RJ', '23456789012', '876543210', '555555555', '888888888', 'rafaela@example.com', 4800.00, 'Noturno', 2);
INSERT INTO enfermeiro (nome, endereco, numero, bairro, cidade, estado, cpf, rg, telefone, celular, email, salario, turno_trabalho, id_funcao)
VALUES ('Carlos Souza', 'Rua O', '30', 'Centro', 'Cidade O', 'MG', '34567890123', '765432109', '666666666', '777777777', 'carlos@example.com', 5200.00, 'Diurno', 3);
