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
  id_item INTEGER NOT NULL PRIMARY KEY,
  id_pedido INTEGER NOT NULL,
  id_produto INTEGER NOT NULL,
  qtde INTEGER NOT NULL,
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
  FOREIGN KEY (id_produto) REFERENCES produto(id)
) ENGINE INNODB;
