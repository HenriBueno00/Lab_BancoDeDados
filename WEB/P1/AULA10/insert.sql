-- Inserindo especialidades
INSERT INTO especialidade (descricao, sigla) VALUES 
('Clínica Geral', 'CG'),
('Pediatria', 'PED'),
('Cardiologia', 'CAR'),
('Ortopedia', 'ORT'),
('Dermatologia', 'DER'),
('Ginecologia', 'GIN'),
('Neurologia', 'NEU'),
('Oftalmologia', 'OFT'),
('Oncologia', 'ONC'),
('Urologia', 'URO');

-- Inserindo médicos
INSERT INTO medico (nome, cpf, endereco, numero, bairro, cidade, estado, CRM, salario, celular, cod_esp) VALUES 
('João Silva', '12345678901', 'Rua A, 123', '123', 'Centro', 'São Paulo', 'SP', '12345-SP', 8000.00, '999999999', 1),
('Maria Santos', '98765432109', 'Avenida B, 456', '456', 'Barra', 'Rio de Janeiro', 'RJ', '54321-RJ', 8500.00, '888888888', 2),
('José Oliveira', '45612378902', 'Rua C, 789', '789', 'Copacabana', 'Rio de Janeiro', 'RJ', '98765-RJ', 7800.00, '777777777', 3),
('Ana Costa', '65432198703', 'Av. D, 987', '987', 'Centro', 'São Paulo', 'SP', '65432-SP', 8200.00, '666666666', 1),
('Luiz Ferreira', '78945612304', 'Rua E, 654', '654', 'Barra', 'Rio de Janeiro', 'RJ', '45678-RJ', 8300.00, '555555555', 2),
('Fernanda Lima', '32165498705', 'Av. F, 321', '321', 'Copacabana', 'Rio de Janeiro', 'RJ', '32109-RJ', 7900.00, '444444444', 3),
('Pedro Santos', '15975346806', 'Rua G, 852', '852', 'Centro', 'São Paulo', 'SP', '15975-SP', 8100.00, '333333333', 1),
('Mariana Oliveira', '35795148607', 'Av. H, 741', '741', 'Barra', 'Rio de Janeiro', 'RJ', '35798-RJ', 8400.00, '222222222', 2),
('Rafaela Costa', '95175385208', 'Rua I, 369', '369', 'Copacabana', 'Rio de Janeiro', 'RJ', '75312-RJ', 7950.00, '111111111', 3),
('Carlos Souza', '85236974109', 'Av. J, 147', '147', 'Centro', 'São Paulo', 'SP', '85236-SP', 8050.00, '000000000', 1);

-- Inserindo pacientes
INSERT INTO paciente (nome, endereco, numero, complemento, bairro, cidade, estado, cpf, rg, telefone, celular, email) VALUES 
('Ana Souza', 'Rua X, 321', '321', 'Apto 101', 'Centro', 'São Paulo', 'SP', '98765432101', '123456789', '11111111', '999999999', 'ana@example.com'),
('Pedro Oliveira', 'Av. Y, 654', '654', 'Casa 2', 'Barra', 'Rio de Janeiro', 'RJ', '12345678902', '987654321', '22222222', '888888888', 'pedro@example.com'),
('Carla Costa', 'Rua Z, 987', '987', '', 'Copacabana', 'Rio de Janeiro', 'RJ', '98765432103', '654987321', '33333333', '777777777', 'carla@example.com'),
('Felipe Santos', 'Av. W, 753', '753', 'Bloco B', 'Centro', 'São Paulo', 'SP', '98765432104', '321654987', '44444444', '666666666', 'felipe@example.com'),
('Luciana Lima', 'Rua V, 852', '852', 'Casa 3', 'Barra', 'Rio de Janeiro', 'RJ', '98765432105', '789456123', '55555555', '555555555', 'luciana@example.com'),
('Bruno Ferreira', 'Av. U, 369', '369', 'Apto 201', 'Copacabana', 'Rio de Janeiro', 'RJ', '98765432106', '357951486', '66666666', '444444444', 'bruno@example.com'),
('Juliana Costa', 'Rua T, 741', '741', '', 'Centro', 'São Paulo', 'SP', '98765432107', '951753852', '77777777', '333333333', 'juliana@example.com'),
('Gustavo Oliveira', 'Av. S, 147', '147', 'Casa 4', 'Barra', 'Rio de Janeiro', 'RJ', '98765432108', '852369741', '88888888', '222222222', 'gustavo@example.com'),
('Carolina Souza', 'Rua R, 963', '963', 'Bloco C', 'Copacabana', 'Rio de Janeiro', 'RJ', '98765432109', '123987654', '99999999', '111111111', 'carolina@example.com'),
('Rodrigo Santos', 'Av. Q, 852', '852', '', 'Centro', 'São Paulo', 'SP', '98765432110', '456123789', '00000000', '000000000', 'rodrigo@example.com');
