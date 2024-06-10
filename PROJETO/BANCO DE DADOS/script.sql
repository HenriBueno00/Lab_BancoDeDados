CREATE TABLE clientes (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  numero VARCHAR(10) NOT NULL,
  bairro VARCHAR(50) NOT NULL,
  cidade VARCHAR(80) NOT NULL,
  estado CHAR(2) NOT NULL,
  email VARCHAR(100),
  cpf_cnpj VARCHAR(14) NOT NULL,
  rg VARCHAR(11) NOT NULL,
  telefone VARCHAR(15),
  celular VARCHAR(15) NOT NULL,
  data_nasc DATE NOT NULL,
  salario NUMERIC(10,2) NOT NULL
) ENGINE INNODB;

CREATE TABLE vendedor(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  cidade VARCHAR(80) NOT NULL,
  estado CHAR(2) NOT NULL,
  celular VARCHAR(15) NOT NULL,
  email VARCHAR(100),
  perc_comissao NUMERIC(5,2) NOT NULL
) ENGINE INNODB;

CREATE TABLE produto(
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  qtde_estoque INTEGER NOT NULL,
  preco NUMERIC(10,2) NOT NULL,
  unidade_medida VARCHAR(5) NOT NULL,
  promocao BOOLEAN
) ENGINE INNODB;

CREATE TABLE forma_pagto (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL
);

CREATE TABLE pedidos (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  data DATE NOT NULL,
  id_cliente INTEGER NOT NULL,
  observacao VARCHAR(200),
  id_forma_pagto INTEGER,
  prazo_entrega VARCHAR(25),
  id_vendedor INTEGER,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id),
  FOREIGN KEY (id_vendedor) REFERENCES vendedor(id),
  FOREIGN KEY (id_forma_pagto) REFERENCES forma_pagto(id)
) ENGINE INNODB;

CREATE TABLE itens_pedido (
  id_item INTEGER PRIMARY KEY AUTO_INCREMENT,
  id_pedido INTEGER NOT NULL,
  id_produto INTEGER NOT NULL,
  qtde INTEGER NOT NULL,
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
  FOREIGN KEY (id_produto) REFERENCES produto(id)
) ENGINE INNODB;

INSERT INTO clientes (nome, endereco, numero, bairro, cidade, estado, email, cpf_cnpj, rg, telefone, celular, data_nasc, salario) VALUES
('Carlos Silva', 'Rua A', '123', 'Centro', 'São Paulo', 'SP', 'carlos@example.com', '12345678901', '111222333', '11987654321', '11987654321', '1980-05-21', 3000.00),
('Ana Souza', 'Rua B', '456', 'Jardim', 'Rio de Janeiro', 'RJ', 'ana@example.com', '23456789012', '222333444', '21987654321', '21987654321', '1985-06-15', 4500.00),
('Marcos Pereira', 'Rua C', '789', 'Zona Norte', 'Belo Horizonte', 'MG', 'marcos@example.com', '34567890123', '333444555', '31987654321', '31987654321', '1990-07-10', 3500.00),
('Fernanda Lima', 'Rua D', '321', 'Zona Sul', 'Curitiba', 'PR', 'fernanda@example.com', '45678901234', '444555666', '41987654321', '41987654321', '1995-08-25', 5000.00),
('Paulo Gomes', 'Rua E', '654', 'Centro', 'Porto Alegre', 'RS', 'paulo@example.com', '56789012345', '555666777', '51987654321', '51987654321', '1982-09-30', 4000.00),
('Luciana Ribeiro', 'Rua F', '987', 'Centro', 'Florianópolis', 'SC', 'luciana@example.com', '67890123456', '666777888', '61987654321', '61987654321', '1975-10-15', 3500.00),
('Roberto Costa', 'Rua G', '147', 'Bela Vista', 'Salvador', 'BA', 'roberto@example.com', '78901234567', '777888999', '71987654321', '71987654321', '1987-11-05', 4500.00),
('Patricia Alves', 'Rua H', '258', 'Alphaville', 'Fortaleza', 'CE', 'patricia@example.com', '89012345678', '888999000', '81987654321', '81987654321', '1981-12-25', 3000.00),
('João Mendes', 'Rua I', '369', 'Vila Olímpia', 'Recife', 'PE', 'joao@example.com', '90123456789', '999000111', '91987654321', '91987654321', '1992-01-12', 4000.00),
('Sandra Dias', 'Rua J', '741', 'Morumbi', 'Manaus', 'AM', 'sandra@example.com', '01234567890', '000111222', '92987654321', '92987654321', '1984-02-28', 5000.00);

INSERT INTO vendedor (nome, endereco, cidade, estado, celular, email, perc_comissao) VALUES
('Mario Costa', 'Rua K', 'São Paulo', 'SP', '11987654322', 'mario@example.com', 5.00),
('Juliana Andrade', 'Rua L', 'Rio de Janeiro', 'RJ', '21987654322', 'juliana@example.com', 4.50),
('Fernando Silva', 'Rua M', 'Belo Horizonte', 'MG', '31987654322', 'fernando@example.com', 6.00),
('Aline Souza', 'Rua N', 'Curitiba', 'PR', '41987654322', 'aline@example.com', 5.50),
('Rafael Lima', 'Rua O', 'Porto Alegre', 'RS', '51987654322', 'rafael@example.com', 4.00),
('Camila Ribeiro', 'Rua P', 'Florianópolis', 'SC', '61987654322', 'camila@example.com', 6.50),
('Ricardo Pereira', 'Rua Q', 'Salvador', 'BA', '71987654322', 'ricardo@example.com', 5.00),
('Beatriz Alves', 'Rua R', 'Fortaleza', 'CE', '81987654322', 'beatriz@example.com', 4.50),
('Daniel Mendes', 'Rua S', 'Recife', 'PE', '91987654322', 'daniel@example.com', 6.00),
('Mariana Dias', 'Rua T', 'Manaus', 'AM', '92987654322', 'mariana@example.com', 5.50);

INSERT INTO produto (nome, qtde_estoque, preco, unidade_medida, promocao) VALUES
('Cadeira Gamer', 50, 799.99, 'UN', TRUE),
('Smartphone Samsung Galaxy S21', 30, 3499.90, 'UN', FALSE),
('Notebook Dell Inspiron', 20, 3999.00, 'UN', TRUE),
('Monitor LG 24"', 100, 899.99, 'UN', FALSE),
('Teclado Mecânico HyperX', 200, 499.90, 'UN', TRUE),
('Mouse Gamer Logitech', 150, 299.99, 'UN', FALSE),
('Headset Razer Kraken', 80, 699.99, 'UN', TRUE),
('Webcam Logitech C920', 60, 599.90, 'UN', FALSE),
('Impressora HP DeskJet', 40, 349.90, 'UN', TRUE),
('Tablet Apple iPad', 25, 4999.90, 'UN', FALSE);

INSERT INTO forma_pagto (nome) VALUES
('Dinheiro'),
('Cartão de Crédito'),
('Cartão de Débito'),
('Cheque'),
('Boleto Bancário'),
('Transferência Bancária'),
('Pix'),
('PayPal');

INSERT INTO pedidos (data, id_cliente, observacao, id_forma_pagto, prazo_entrega, id_vendedor) VALUES
('2024-05-01', 1, 'Entrega rápida', 1, '2 dias', 1),
('2024-05-02', 2, 'Embalagem reforçada', 2, '3 dias', 2),
('2024-05-03', 3, 'Presente', 3, '1 dia', 3),
('2024-05-04', 4, 'Urgente', 4, '2 dias', 4),
('2024-05-05', 5, 'Fragil', 5, '4 dias', 5),
('2024-05-06', 6, 'Para presente', 6, '2 dias', 6),
('2024-05-07', 7, 'Entregar de manhã', 7, '3 dias', 7),
('2024-05-08', 8, 'Sem observações', 8, '1 dia', 8),
('2024-05-09', 9, 'Cuidado com o transporte', 7, '2 dias', 9),
('2024-05-10', 10, 'Entrega rápida', 7, '2 dias', 10);

INSERT INTO itens_pedido (id_pedido, id_produto, qtde) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 3, 4),
(2, 4, 2),
(3, 5, 3),
(3, 6, 5),
(4, 7, 1),
(4, 8, 2),
(5, 9, 1),
(5, 10, 2),
(6, 1, 3),
(6, 2, 4),
(7, 3, 5),
(7, 4, 3),
(8, 5, 2),
(8, 6, 1),
(9, 7, 4),
(9, 8, 3),
(10, 9, 2),
(10, 10, 1);

DELIMITER //
CREATE TRIGGER after_insert_itens_pedido
AFTER INSERT ON itens_pedido
FOR EACH ROW
BEGIN
  UPDATE produto
  SET qtde_estoque = qtde_estoque - NEW.qtde
  WHERE id = NEW.id_produto;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER after_delete_itens_pedido
AFTER DELETE ON itens_pedido
FOR EACH ROW
BEGIN
  UPDATE produto
  SET qtde_estoque = qtde_estoque + OLD.qtde
  WHERE id = OLD.id_produto;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER before_insert_itens_pedido
BEFORE INSERT ON itens_pedido
FOR EACH ROW
BEGIN
  DECLARE msg VARCHAR(255);
  DECLARE available_stock INT;
  DECLARE product_name VARCHAR(100);

  SELECT qtde_estoque, nome INTO available_stock, product_name FROM produto WHERE id = NEW.id_produto;
  
  IF NEW.qtde > available_stock THEN
    SET msg = CONCAT('Quantidade desejada (', NEW.qtde, ') para o produto ', product_name, ' (ID: ', NEW.id_produto, ') não disponível. Estoque atual: ', available_stock);
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = msg;
  END IF;
END;
//
DELIMITER ;
