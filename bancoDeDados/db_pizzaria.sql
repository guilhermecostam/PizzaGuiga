-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: 08-Maio-2020 às 20:32
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `CLI_CODIGO` int(11) NOT NULL,
  `CLI_NOME` varchar(50) NOT NULL,
  `CLI_MESA` varchar(50) NOT NULL,
  `CLI_USUARIO` varchar(50) NOT NULL,
  `CLI_SENHA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`CLI_CODIGO`, `CLI_NOME`, `CLI_MESA`, `CLI_USUARIO`, `CLI_SENHA`) VALUES
(1, 'Ari', 'Ralé, nos fundos do restaurante', 'ari', 123),
(2, 'Ana Carolina', 'VIP Presidencial', 'ana', 123),
(3, 'Pablo', 'Riqueza Master 1', 'pablo', 123),
(4, 'Joca da Foice', 'Pajoca Tapioca 22', 'joca', 123),
(5, 'Guilherme Costa', 'Vip Presidencial', 'gui', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `PED_CODIGO` int(11) NOT NULL,
  `PED_CLI_CODIGO` int(11) DEFAULT NULL,
  `PED_PIZ_CODIGO` int(11) DEFAULT NULL,
  `PED_DATA` date NOT NULL,
  `PED_FINALIZADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`PED_CODIGO`, `PED_CLI_CODIGO`, `PED_PIZ_CODIGO`, `PED_DATA`, `PED_FINALIZADO`) VALUES
(1, 1, 3, '2019-05-08', 1),
(2, 1, 2, '2019-05-08', 0),
(3, 2, 1, '2019-02-22', 0),
(4, 1, 2, '2018-11-13', 3),
(5, 1, 2, '2018-11-13', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pizzas`
--

CREATE TABLE `tb_pizzas` (
  `PIZ_CODIGO` int(11) NOT NULL,
  `PIZ_SABOR` varchar(50) NOT NULL,
  `PIZ_TAMANHO` varchar(1) NOT NULL,
  `PIZ_PRECO` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_pizzas`
--

INSERT INTO `tb_pizzas` (`PIZ_CODIGO`, `PIZ_SABOR`, `PIZ_TAMANHO`, `PIZ_PRECO`) VALUES
(1, 'MUSSARELA', 'M', '30.00'),
(2, 'MUSSARELA', 'G', '59.00'),
(3, 'MUSSARELA', 'X', '79.00'),
(4, 'SAN MARINO', 'M', '28.00'),
(5, 'SAN MARINO', 'G', '35.00'),
(6, 'SAN MARINO', 'X', '42.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`CLI_CODIGO`);

--
-- Indexes for table `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`PED_CODIGO`);

--
-- Indexes for table `tb_pizzas`
--
ALTER TABLE `tb_pizzas`
  ADD PRIMARY KEY (`PIZ_CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `CLI_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `PED_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pizzas`
--
ALTER TABLE `tb_pizzas`
  MODIFY `PIZ_CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
