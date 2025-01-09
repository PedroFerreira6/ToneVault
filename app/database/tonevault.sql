-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jan-2025 às 20:53
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
-- Banco de dados: `tonevault`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ficheiro` varchar(255) NOT NULL,
  `ficheiroEnc` varchar(255) NOT NULL,
  `valor` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `privacidade` tinyint(1) NOT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `audios`
--

INSERT INTO `audios` (`id`, `titulo`, `descricao`, `ficheiro`, `ficheiroEnc`, `valor`, `idUtilizador`, `privacidade`, `estado`) VALUES
(1, 'NINJAS', 'ddwd', 'sdds', 'sdds', 0, 1, 0, 1),
(2, 'NINJAS', 'ddwd', 'sdds', 'sdds', 0, 1, 0, 1),
(3, 'Olá', 'Descri', 'Plankton moaning meme  Blank Template.mp3', '897bcea83ed805667b0ddefd5545c890.mp3', 100, 2, 1, 0),
(4, 'Teller', 'ddddddd', 'Plankton moaning meme  Blank Template.mp3', 'd190821a8ef42543c142abf9e1126e33.mp3', 0, 1, 1, 0),
(5, 'Teller2', 'ddddddd', 'Plankton moaning meme  Blank Template.mp3', '39fbdf0569158e1fc8ba18ec92dc6616.mp3', 12, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `idAudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `valor`, `idUtilizador`, `idAudio`) VALUES
(1, 12, 2, 5),
(3, 100, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `idAudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `idUtilizador`, `idAudio`) VALUES
(6, 2, 5),
(10, 2, 3),
(11, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoesaudios`
--

CREATE TABLE `transacoesaudios` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `idUtilizadorIn` int(11) NOT NULL,
  `idUtilizadorOut` int(11) NOT NULL,
  `idAudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `transacoesaudios`
--

INSERT INTO `transacoesaudios` (`id`, `valor`, `idUtilizadorIn`, `idUtilizadorOut`, `idAudio`) VALUES
(1, 55, 2, 1, 3),
(2, 55, 1, 2, 3),
(3, 55, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` int(11) DEFAULT 0,
  `nivel` int(11) DEFAULT 2,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `email`, `password`, `saldo`, `nivel`, `estado`) VALUES
(1, 'Pedro', 'pedro@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 455, 2, 1),
(2, 'aluno', 'aluno@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 200, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `idUtilizador` int(11) NOT NULL,
  `idAudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `views`
--

INSERT INTO `views` (`id`, `idUtilizador`, `idAudio`) VALUES
(14, 2, 3),
(15, 2, 4),
(16, 2, 5),
(17, 1, 3),
(18, 1, 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`),
  ADD KEY `idAudio` (`idAudio`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`),
  ADD KEY `idAudio` (`idAudio`);

--
-- Índices para tabela `transacoesaudios`
--
ALTER TABLE `transacoesaudios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizadorIn` (`idUtilizadorIn`),
  ADD KEY `idUtilizadorOut` (`idUtilizadorOut`),
  ADD KEY `idAudio` (`idAudio`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUtilizador` (`idUtilizador`),
  ADD KEY `idAudio` (`idAudio`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `transacoesaudios`
--
ALTER TABLE `transacoesaudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `audios`
--
ALTER TABLE `audios`
  ADD CONSTRAINT `audios_ibfk_1` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizadores` (`id`);

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idAudio`) REFERENCES `audios` (`id`);

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idAudio`) REFERENCES `audios` (`id`);

--
-- Limitadores para a tabela `transacoesaudios`
--
ALTER TABLE `transacoesaudios`
  ADD CONSTRAINT `transacoesaudios_ibfk_1` FOREIGN KEY (`idUtilizadorIn`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `transacoesaudios_ibfk_2` FOREIGN KEY (`idUtilizadorOut`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `transacoesaudios_ibfk_3` FOREIGN KEY (`idAudio`) REFERENCES `audios` (`id`);

--
-- Limitadores para a tabela `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`idUtilizador`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `views_ibfk_2` FOREIGN KEY (`idAudio`) REFERENCES `audios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
