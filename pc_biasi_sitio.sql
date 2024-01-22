-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jan-2024 às 18:18
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pc_biasi_sitio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `canteiro`
--

CREATE TABLE `canteiro` (
  `id` int(11) NOT NULL,
  `numeracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Extraindo dados da tabela `canteiro`
--

INSERT INTO `canteiro` (`id`, `numeracao`) VALUES
(16, 22),
(17, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesticida`
--

CREATE TABLE `pesticida` (
  `id` int(11) NOT NULL,
  `tipo_pesticida` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Extraindo dados da tabela `pesticida`
--

INSERT INTO `pesticida` (`id`, `tipo_pesticida`, `nome`) VALUES
(3, 'FUNGICIDA', 'fun 1'),
(4, 'FUNGICIDA', 'fun 2'),
(5, 'INSETICIDA', 'inse 1'),
(6, 'INSETICIDA', 'inse 2'),
(7, '', 'manga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantacao`
--

CREATE TABLE `plantacao` (
  `id` int(11) NOT NULL,
  `canteiro` int(11) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `qtd` int(11) NOT NULL,
  `dat` date NOT NULL,
  `ml_usado` int(11) NOT NULL,
  `pesticida` varchar(45) NOT NULL,
  `obs` varchar(45) NOT NULL,
  `carencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Extraindo dados da tabela `plantacao`
--

INSERT INTO `plantacao` (`id`, `canteiro`, `produto`, `qtd`, `dat`, `ml_usado`, `pesticida`, `obs`, `carencia`) VALUES
(11, 22, 'peixe', 34, '2024-01-20', 34, 'fun 2', 'dfggfdgfdg', 7),
(12, 33, 'manga', 345, '2024-01-05', 4, 'fun 1', 'dsf gsfd', 42),
(13, 22, 'pepino', 234, '2024-01-19', 34, 'inse 2', 'TESTE NOVAMENTE ', 4),
(14, 33, 'teste', 234, '2024-01-20', 43, 'fun 2', 'dsfsf', 2),
(15, 33, 'peixe', 32, '2024-01-20', 32, 'inse 2', 'dsdasd', 2),
(16, 22, 'peixe', 434, '2024-01-20', 434, 'inse 1', 'dfsdfsd', 3),
(17, 22, 'teste', 434, '2024-01-19', 43, '', 'dfsdfs', 23),
(18, 22, 'peixe', 32, '2024-01-18', 32, 'fun 2', 'fdfdsf', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `custo` int(11) NOT NULL,
  `vl_venda` int(11) NOT NULL,
  `tp_plantacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `custo`, `vl_venda`, `tp_plantacao`) VALUES
(4, 'manga', 12, 3, 50),
(5, 'peixe', 12, 4, 30),
(6, 'pepino', 5, 4, 20),
(7, 'maça', 2, 73, 147),
(8, 'teste', 23, 34, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `canteiro`
--
ALTER TABLE `canteiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pesticida`
--
ALTER TABLE `pesticida`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `plantacao`
--
ALTER TABLE `plantacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `canteiro`
--
ALTER TABLE `canteiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `pesticida`
--
ALTER TABLE `pesticida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `plantacao`
--
ALTER TABLE `plantacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
