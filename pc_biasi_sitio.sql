-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Mar-2024 às 15:20
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
(18, 1),
(19, 2),
(20, 3),
(21, 4),
(22, 5),
(23, 6),
(24, 7),
(25, 8),
(26, 9),
(27, 10),
(28, 11),
(29, 12),
(30, 13),
(31, 14),
(32, 15),
(33, 16),
(34, 17),
(35, 18),
(36, 19),
(37, 20),
(38, 21),
(39, 22),
(40, 23),
(41, 24),
(42, 25),
(43, 26),
(44, 27),
(45, 28),
(46, 29),
(47, 30),
(48, 31),
(49, 32),
(50, 33),
(51, 34),
(52, 35),
(53, 36),
(54, 37),
(55, 38),
(56, 39),
(57, 40),
(58, 41),
(59, 42),
(60, 43),
(61, 44),
(62, 45),
(63, 46),
(64, 47),
(65, 48),
(66, 49),
(67, 50),
(68, 51),
(69, 52),
(70, 53),
(71, 54),
(72, 55),
(73, 56),
(74, 57),
(75, 58),
(76, 59),
(77, 60),
(78, 61),
(79, 62),
(80, 63),
(81, 64);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coleta`
--

CREATE TABLE `coleta` (
  `id` int(11) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `qtd` int(11) NOT NULL,
  `data_coleta` date NOT NULL,
  `qtd_coleta` varchar(45) NOT NULL,
  `canteiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_irrigacao`
--

CREATE TABLE `historico_irrigacao` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `tempo_regacao` int(11) NOT NULL,
  `numero_canterio` int(11) NOT NULL,
  `id_canteiro` int(11) NOT NULL,
  `pesticida` varchar(45) NOT NULL,
  `ml_usado` int(11) NOT NULL,
  `carencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

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
(8, 'ADUBO', 'CODAMIN 150'),
(9, 'ADUBO', 'UPTEC'),
(10, 'ADUBO', 'UP BLEND'),
(11, 'ADUBO', 'UP TURII'),
(12, 'FUNGICIDA', 'SCORE'),
(13, 'INSETICIDA', 'AUIN CE'),
(14, 'ADUBO', 'CODAMIX'),
(15, 'INSETICIDA', 'CONNECT'),
(16, 'INSETICIDA', 'DECIS'),
(17, 'ADUBO', 'DRIP SOL MICRO'),
(18, 'INSETICIDA', 'ENGELO PLENO S'),
(19, 'INSETICIDA', 'KARATE ZEON 250 CS'),
(20, 'FUNGICIDA', 'BENDAZOL');

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
  `carencia` int(11) NOT NULL,
  `data_atu` date DEFAULT NULL,
  `fix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Extraindo dados da tabela `plantacao`
--

INSERT INTO `plantacao` (`id`, `canteiro`, `produto`, `qtd`, `dat`, `ml_usado`, `pesticida`, `obs`, `carencia`, `data_atu`, `fix`) VALUES
(31, 0, '', 4, '2024-02-07', 44, '', 'dre', 4, '2024-02-07', 0),
(32, 0, '', 323, '2024-02-01', 111, '', '1', 1, '2024-02-01', 0),
(33, 1, 'rr', 11, '2024-02-02', 1, 'CODAMIX', '11', 1, '2024-02-02', 1),
(34, 1, 'rr', 1, '2024-02-01', 1, '', '1', 1, '2024-02-01', 0),
(35, 2, 'rr', 1, '2024-02-02', 1, 'CODAMIX', '1', 1, '2024-02-02', 0),
(36, 1, 'rr', 1, '2024-02-02', 1, 'CODAMIX', '1', 1, '2024-02-02', 0);

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
(12, 'rr', 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `canteiro`
--
ALTER TABLE `canteiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `coleta`
--
ALTER TABLE `coleta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico_irrigacao`
--
ALTER TABLE `historico_irrigacao`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `coleta`
--
ALTER TABLE `coleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `historico_irrigacao`
--
ALTER TABLE `historico_irrigacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `pesticida`
--
ALTER TABLE `pesticida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `plantacao`
--
ALTER TABLE `plantacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
