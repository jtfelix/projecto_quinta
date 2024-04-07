-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2023 às 22:05
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quinta_ribeirinha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `ID` int(11) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `preco_noite` int(11) NOT NULL,
  `disponibilidade` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menssagens`
--

CREATE TABLE `menssagens` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(500) NOT NULL,
  `menssagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `menssagens`
--

INSERT INTO `menssagens` (`ID`, `nome`, `email`, `assunto`, `menssagem`) VALUES
(1, 'Carlos', 'jtfelix10@gmail.com', 'Teste', 'Ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `ID` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `metodo` varchar(75) NOT NULL,
  `data` date NOT NULL,
  `ID_reserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `ID` int(11) NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date NOT NULL,
  `n_pessoas` int(11) NOT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `ID_utilizador` int(11) DEFAULT NULL,
  `ID_local` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`ID`, `data_entrada`, `data_saida`, `n_pessoas`, `preco`, `ID_utilizador`, `ID_local`) VALUES
(35, '2023-05-12', '2023-05-16', 1, 320.00, 16, NULL),
(36, '2023-05-13', '2023-05-19', 1, 480.00, NULL, NULL),
(37, '2023-05-19', '2023-05-24', 1, 400.00, NULL, NULL),
(38, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(39, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(40, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(41, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(42, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(43, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(44, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(45, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(46, '2023-05-13', '2023-05-25', 1, 960.00, NULL, NULL),
(47, '2023-05-13', '2023-05-25', 1, 960.00, 14, NULL),
(48, '2023-05-13', '2023-05-25', 1, 960.00, 14, NULL),
(49, '2023-05-13', '2023-05-23', 1, 800.00, 20, NULL),
(50, '2023-05-13', '2023-05-24', 1, 880.00, 17, NULL),
(51, '2023-05-13', '2023-05-23', 3, 800.00, 21, NULL),
(52, '2023-05-15', '2023-05-17', 3, 160.00, 22, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `ID` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `morada` varchar(150) DEFAULT NULL,
  `codigo_postal` varchar(25) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`ID`, `nome`, `email`, `password`, `telefone`, `morada`, `codigo_postal`, `localidade`, `admin`) VALUES
(1, 'Jo&atilde;o', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'adminjoao@gmail.com', NULL, NULL, NULL, '', 0),
(8, 'Joao', 'adminjoao@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '925789654', 'Rua das Couves', '78954', 'Barão', 0),
(9, '2342', 'asdas@dasd.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', NULL, NULL, NULL, '', 0),
(10, '2', '2@dasd.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', NULL, NULL, NULL, '', 0),
(11, 'Raquel', 'raquel@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '968745', 'Rua de Cima', '78954', 'Barão', 0),
(12, 'Joao Félix', 'jtfelix10@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '967854556', 'Estrada Sul', '45625', 'Évora', 0),
(13, 'Laura Susana', 'laura@maluca.com', '7a065911d40cbca8c8df9820421213f2ed35ce9b', NULL, NULL, NULL, NULL, 0),
(14, 'Raquel', 'laura@gmail.com', NULL, '967854556', 'Rua das Couves', '70001', 'Évora', 0),
(15, 'Raquel Susana', 'pedromiguelrc10@gmail.com', NULL, '967854556', 'Rua de Cima', '70001', 'Lisboa', 0),
(16, 'Raquel', 'yu', NULL, '967854556', 'Rua das Couves', '70000', 'Barão', 0),
(17, 'Raquel Susana', 'jtfelix10@gmail.comm', NULL, '967854556', 'Rua das Couves', '70001', 'Évora', 0),
(18, '', '', NULL, '', '', '', '', 0),
(19, 'Joao', '13232323232', NULL, '925789654', 'Rua das Couves', '70000', 'Lisboa', 0),
(20, 'Raquel Susana', '1343', NULL, '925789654', 'Rua das Couves', '70000', 'Lisboa', 0),
(21, 'Tiago Félix', 'tiagofelix@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '87566214', 'Rua Jornal de Portimão', '85745', 'Lagos', 0),
(22, 'Tiago', 'tiago@gmail.com', NULL, '785145', 'Rua de Barão', '8585', 'Lagos', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `menssagens`
--
ALTER TABLE `menssagens`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_reserva` (`ID_reserva`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `reservas_ibfk_1` (`ID_local`),
  ADD KEY `ID_cliente` (`ID_utilizador`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `menssagens`
--
ALTER TABLE `menssagens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`ID_reserva`) REFERENCES `reservas` (`ID`);

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`ID_local`) REFERENCES `locais` (`ID`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`ID_utilizador`) REFERENCES `utilizadores` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
