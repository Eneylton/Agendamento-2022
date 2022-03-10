-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2022 às 01:17
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_calendario2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `nivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `nivel`) VALUES
(1, 'admin'),
(2, 'Assitente'),
(3, 'Coordenador'),
(4, 'Auxiliar'),
(5, 'Caixa'),
(6, 'Mecânico'),
(7, 'Instrutor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendar`
--

CREATE TABLE `agendar` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `horario_id` int(11) NOT NULL,
  `alunos_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendar`
--

INSERT INTO `agendar` (`id`, `data`, `horario_id`, `alunos_id`, `usuarios_id`, `status`) VALUES
(1, '2022-02-24', 1, 1, 4, 0),
(2, '2022-02-24', 3, 2, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `status`, `categoria_id`) VALUES
(1, 'Eneylton Barros', 1, 1),
(2, 'Carla Barros ', 1, 2),
(3, 'Almir Costa', 0, 3),
(4, 'Elias Barros', 0, 3),
(5, 'Kassia Andrade', 1, 1),
(6, 'Jose de Arimateia', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Asssistente de Logística'),
(2, 'Coordenadora de Logística'),
(3, 'Asssistente de Logística'),
(4, 'Supervisor de Operações Logísticas Interior'),
(5, 'Encarregada de Expedição'),
(6, 'Assistente da qualidade'),
(7, 'Auxiliar de Logística'),
(8, 'Diretora'),
(9, 'Assistente Financeiro'),
(10, 'Coordenadora de RH'),
(12, 'Instrutor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'A/E'),
(7, 'A/B'),
(8, 'A/C'),
(9, 'A/D'),
(10, 'Nenhum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `hora` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `hora`) VALUES
(1, '08:00:00'),
(2, '09:00:00'),
(3, '10:00:00'),
(4, '11:00:00'),
(5, '12:00:00'),
(6, '13:00:00'),
(7, '14:00:00'),
(8, '15:00:00'),
(9, '16:00:00'),
(10, '17:00:00'),
(11, '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE `instrutor` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(225) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `veiculo_id` int(11) NOT NULL,
  `acessos_id` int(11) NOT NULL,
  `cargos_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`id`, `nome`, `email`, `senha`, `categoria_id`, `veiculo_id`, `acessos_id`, `cargos_id`, `usuarios_id`) VALUES
(12, 'karina Barros', 'karina@eneylton.com', '123', 10, 6, 7, 12, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor_alunos`
--

CREATE TABLE `instrutor_alunos` (
  `id` int(11) NOT NULL,
  `instrutor_id` int(11) NOT NULL,
  `alunos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `instrutor_alunos`
--

INSERT INTO `instrutor_alunos` (`id`, `instrutor_id`, `alunos_id`) VALUES
(30, 12, 1),
(31, 12, 2),
(32, 12, 5),
(33, 12, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacao`
--

CREATE TABLE `marcacao` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `alunos_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `contador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcacao`
--

INSERT INTO `marcacao` (`id`, `data`, `status`, `alunos_id`, `horario_id`, `contador_id`) VALUES
(160, '2022-02-27', 1, 1, 1, 1),
(161, '2022-02-27', 1, 1, 2, 2),
(162, '2022-02-28', 1, 1, 1, 12),
(167, '2022-03-01', 1, 2, 1, 23),
(168, '2022-03-01', 1, 2, 2, 24),
(169, '2022-03-01', 1, 2, 3, 25),
(170, '2022-03-03', 1, 2, 4, 48),
(171, '2022-03-04', 1, 2, 2, 57),
(172, '2022-03-04', 1, 2, 5, 60),
(173, '2022-03-04', 1, 2, 6, 61),
(174, '2022-03-05', 1, 2, 8, 74),
(175, '2022-03-05', 1, 2, 9, 75),
(176, '2022-03-05', 1, 2, 10, 76),
(177, '2022-03-05', 1, 2, 11, 77);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `acessos_id` int(11) NOT NULL,
  `cargos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `acessos_id`, `cargos_id`) VALUES
(4, 'admin', 'admin@eneylton.com', '$2y$10$JZR7X2ZpplGhF4dtchAhJedF/Y0/4ynAOd8VBlR4ehJfLOKHX4mLG', 1, 1),
(7, 'ene', 'eneylton@hotmail.com', '$2y$10$JZR7X2ZpplGhF4dtchAhJedF/Y0/4ynAOd8VBlR4ehJfLOKHX4mLG', 2, 1),
(13, 'enexs', 'enex@gmail.com.br', '202cb962ac59075b964b07152d234b70', 3, 1),
(21, 'karina Barros', 'karina@eneylton.com', '$2y$10$Zen/TOmhjyjnlASBCmxqMuTHkNDDna0AajF3bVdZQJSgNXLQrd1xu', 7, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `nome`) VALUES
(1, 'CARRO'),
(2, 'ÔNIBUS'),
(3, 'MOTO'),
(4, 'CAMINHÃO'),
(5, 'ESCANHA'),
(6, 'NENHUM');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `agendar`
--
ALTER TABLE `agendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agendar_horario_idx` (`horario_id`),
  ADD KEY `fk_agendar_alunos1_idx` (`alunos_id`),
  ADD KEY `fk_agendar_usuarios1_idx` (`usuarios_id`);

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alunos_categoria1_idx` (`categoria_id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `instrutor`
--
ALTER TABLE `instrutor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instrutor_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_instrutor_veiculo1_idx` (`veiculo_id`),
  ADD KEY `fk_instrutor_acessos1_idx` (`acessos_id`),
  ADD KEY `fk_instrutor_cargos1_idx` (`cargos_id`),
  ADD KEY `fk_instrutor_usuarios1_idx` (`usuarios_id`);

--
-- Índices para tabela `instrutor_alunos`
--
ALTER TABLE `instrutor_alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_instrutor_alunos_instrutor1_idx` (`instrutor_id`),
  ADD KEY `fk_instrutor_alunos_alunos1_idx` (`alunos_id`);

--
-- Índices para tabela `marcacao`
--
ALTER TABLE `marcacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_marcacao_alunos1_idx` (`alunos_id`),
  ADD KEY `fk_marcacao_horario1_idx` (`horario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_acessos1_idx` (`acessos_id`),
  ADD KEY `fk_usuarios_cargos1_idx` (`cargos_id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `agendar`
--
ALTER TABLE `agendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `instrutor`
--
ALTER TABLE `instrutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `instrutor_alunos`
--
ALTER TABLE `instrutor_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `marcacao`
--
ALTER TABLE `marcacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendar`
--
ALTER TABLE `agendar`
  ADD CONSTRAINT `fk_agendar_alunos1` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendar_horario` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendar_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_alunos_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instrutor`
--
ALTER TABLE `instrutor`
  ADD CONSTRAINT `fk_instrutor_acessos1` FOREIGN KEY (`acessos_id`) REFERENCES `acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrutor_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrutor_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrutor_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrutor_veiculo1` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instrutor_alunos`
--
ALTER TABLE `instrutor_alunos`
  ADD CONSTRAINT `fk_instrutor_alunos_alunos1` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instrutor_alunos_instrutor1` FOREIGN KEY (`instrutor_id`) REFERENCES `instrutor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `marcacao`
--
ALTER TABLE `marcacao`
  ADD CONSTRAINT `fk_marcacao_alunos1` FOREIGN KEY (`alunos_id`) REFERENCES `alunos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_marcacao_horario1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_acessos1` FOREIGN KEY (`acessos_id`) REFERENCES `acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
