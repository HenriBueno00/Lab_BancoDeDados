-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/03/2024 às 00:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `sigla` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidade`
--

INSERT INTO `especialidade` (`id`, `descricao`, `sigla`) VALUES
(1, 'Ortopedista', 'ot'),
(5, 'Clinico Geral', 'CG'),
(6, 'Cardiologista', 'Car'),
(7, 'Cardiologista', 'Car'),
(8, 'Oftalmo', 'Oft');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` char(10) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(80) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `CRM` varchar(20) DEFAULT NULL,
  `salario` decimal(12,2) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `cod_esp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
