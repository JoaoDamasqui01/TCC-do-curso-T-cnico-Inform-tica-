-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/12/2024 às 21:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pizzariatech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `entregas`
--

CREATE TABLE `entregas` (
  `idEntregas` int(11) NOT NULL,
  `veiculo` varchar(45) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `placa` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `entregas`
--

INSERT INTO `entregas` (`idEntregas`, `veiculo`, `modelo`, `placa`) VALUES
(1, 'Ford', 'K', '634j84'),
(3, 'Carro', 'Toro', '5568g'),
(4, 'Carro', ' ONIX', '349gj49'),
(6, 'Carro ', 'Creta', '8ggg583'),
(7, 'Moto', 'Meiota', '53fj9g');

-- --------------------------------------------------------

--
-- Estrutura para tabela `formaspagamento`
--

CREATE TABLE `formaspagamento` (
  `idFormasPagamentos` int(11) NOT NULL,
  `pagamentos` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `formaspagamento`
--

INSERT INTO `formaspagamento` (`idFormasPagamentos`, `pagamentos`) VALUES
(1, 'Pix'),
(2, 'Débito'),
(3, 'Crédito'),
(4, 'Cheque');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `idFornecedores` int(11) NOT NULL,
  `nomeFornecedor` varchar(80) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `fone` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`idFornecedores`, `nomeFornecedor`, `endereco`, `cnpj`, `fone`) VALUES
(1, 'Mercado Amigão', 'AV. Claudia Tupan, 394', '48346729', '256955'),
(6, 'Natural Destribuidora', 'Av.Brasil', '65676725', '5843454'),
(7, 'Alimentos', 'Av. Chico Boarque', '56476', '4767875');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

CREATE TABLE `itens` (
  `idItens` int(11) NOT NULL,
  `idTiposItens` int(11) NOT NULL,
  `idFornecedores` int(11) NOT NULL,
  `idMarcas` int(11) NOT NULL,
  `nomeItem` varchar(80) NOT NULL,
  `qtdeEstoque` int(11) NOT NULL,
  `precoUnitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens`
--

INSERT INTO `itens` (`idItens`, `idTiposItens`, `idFornecedores`, `idMarcas`, `nomeItem`, `qtdeEstoque`, `precoUnitario`) VALUES
(1, 1, 1, 2, 'Maionese', 32, 23.00),
(2, 2, 1, 2, 'Maionese', 49, 24.00),
(3, 1, 1, 4, 'Katchup', 224, 34.00),
(13, 1, 7, 4, 'Massa de tomate', 0, 0.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `idMarcas` int(11) NOT NULL,
  `marcasProdutos` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`idMarcas`, `marcasProdutos`) VALUES
(1, 'REZENDE'),
(2, 'Heinz'),
(4, 'Elefante'),
(5, 'Magarina'),
(6, 'Quero Mais');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `idFormasPagamentos` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `localizacao` varchar(100) NOT NULL,
  `dataPedido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedidos`, `idFormasPagamentos`, `idUsuarios`, `localizacao`, `dataPedido`) VALUES
(1, 3, 2, 'AV.Brasil, 5942', '0000-00-00'),
(2, 2, 2, 'AV.Brasil,853', '0000-00-00'),
(3, 3, 5, 'Av.Brasil, 5923', '0000-00-00'),
(6, 2, 5, 'Av.Brasil, 52', '0000-00-00'),
(7, 3, 2, 'Av.Brasil, Novo', '0000-00-00'),
(8, 3, 3, 'Av.Mauá, 534', '0000-00-00'),
(9, 3, 5, 'Av.Maua, 583', '0000-00-00'),
(10, 3, 6, 'Av. Darvilhe Uergo, 483', '0000-00-00'),
(11, 3, 3, 'Rua Rebouças, 54', '0000-00-00'),
(12, 2, 3, 'Av.Brasil, 556', '2021-05-20'),
(13, 1, 6, 'Av.Tenta,54', '0000-00-00'),
(14, 1, 6, 'Av.Tenta,54', '0000-00-00'),
(15, 1, 6, 'Av.Tenta,54', '0000-00-00'),
(16, 1, 6, 'Av.Tenta,54', '0000-00-00'),
(17, 3, 5, 'Av.Rubim, 43', '2022-07-20'),
(18, 4, 5, 'Av.Brasil,43', '2022-04-23'),
(19, 4, 5, 'Av.Brasil,43', '2022-04-23'),
(20, 2, 6, 'Av.Brasil, 443', '20/06/2023'),
(21, 3, 5, 'Av.Brail,53', '20/06/2023'),
(22, 2, 6, 'Av.Brasil', '20/10/2022'),
(23, 3, 3, 'Av.Brasil', '20/04/2022'),
(24, 3, 5, 'Av.Brasil', '20/04/2022'),
(25, 2, 3, 'Av.Brasil. 43', '20/04/2022'),
(26, 3, 6, 'Av.Brasil, 4345', '20/04/2022'),
(38, 1, 4, 'Av.Bom dia,76', '12/06/2024'),
(69, 1, 2, 'Av.DR Claudia, 435', '2024-12-10'),
(70, 3, 3, 'Av.DR Claudia, 435', '2018-10-28'),
(71, 3, 5, 'Av.DR Claudia, 435', '2018-10-28'),
(72, 3, 5, 'Av.DR Claudia, 435', '2018-10-28'),
(73, 3, 6, 'Av.DR Claudia, 435', '2022-10-29'),
(74, 3, 4, 'Av.DR Claudia, 435', '2022-10-29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidositens`
--

CREATE TABLE `pedidositens` (
  `idPedidosItens` int(11) NOT NULL,
  `idItens` int(11) NOT NULL,
  `idPedidos` int(11) NOT NULL,
  `idEntregas` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `precoUnitario` decimal(10,2) NOT NULL,
  `precoTotal` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidositens`
--

INSERT INTO `pedidositens` (`idPedidosItens`, `idItens`, `idPedidos`, `idEntregas`, `qtde`, `precoUnitario`, `precoTotal`) VALUES
(4, 1, 26, 1, 33, 24.00, 792.00),
(5, 1, 71, 1, 34, 56.00, 1904.00),
(6, 3, 71, 1, 34, 56.00, 1904.00),
(7, 3, 71, 1, 34, 56.00, 1904.00),
(8, 1, 72, 6, 584, 34.00, 19856.00),
(9, 13, 74, 7, 85, 17.00, 1445.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipositens`
--

CREATE TABLE `tipositens` (
  `idTiposItens` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipositens`
--

INSERT INTO `tipositens` (`idTiposItens`, `descricao`) VALUES
(1, 'Condimentos'),
(2, 'Limpeza'),
(3, 'Embalagem Grande'),
(4, 'Embalagem pequena'),
(5, 'Bebida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipouser`
--

CREATE TABLE `tipouser` (
  `idTipoUser` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipouser`
--

INSERT INTO `tipouser` (`idTipoUser`, `tipo`) VALUES
(1, 'Padrão'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `idTipoUser` int(11) NOT NULL,
  `nomeCompleto` varchar(45) NOT NULL,
  `senha` mediumtext NOT NULL,
  `cpf` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `idTipoUser`, `nomeCompleto`, `senha`, `cpf`) VALUES
(2, 2, 'Nelson', '121212', '434343434'),
(3, 2, 'Fernando', '789', '1234'),
(4, 2, 'Fernando', '789', '1234'),
(5, 1, 'yan', '123', '6789'),
(6, 2, 'Ruan', '9999', '9999'),
(12, 2, 'Marcela', '123456789', '123456789'),
(15, 1, 'Alessandro', '333333', '333333');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`idEntregas`);

--
-- Índices de tabela `formaspagamento`
--
ALTER TABLE `formaspagamento`
  ADD PRIMARY KEY (`idFormasPagamentos`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`idFornecedores`);

--
-- Índices de tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`idItens`),
  ADD KEY `fk_Itens_TiposItens` (`idTiposItens`),
  ADD KEY `fk_Itens_fornecedores` (`idFornecedores`),
  ADD KEY `fk_Itens_Marcas` (`idMarcas`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarcas`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `fk_pedidos_formasPagamentos` (`idFormasPagamentos`),
  ADD KEY `fk_pedidos_usuarios` (`idUsuarios`);

--
-- Índices de tabela `pedidositens`
--
ALTER TABLE `pedidositens`
  ADD PRIMARY KEY (`idPedidosItens`),
  ADD KEY `fk_PedidosItens_Itens` (`idItens`),
  ADD KEY `fk-PedidoaItens_entregas` (`idEntregas`),
  ADD KEY `fk_PedidosItens_Pedidos` (`idPedidos`);

--
-- Índices de tabela `tipositens`
--
ALTER TABLE `tipositens`
  ADD PRIMARY KEY (`idTiposItens`);

--
-- Índices de tabela `tipouser`
--
ALTER TABLE `tipouser`
  ADD PRIMARY KEY (`idTipoUser`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_tipoUser` (`idTipoUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `entregas`
--
ALTER TABLE `entregas`
  MODIFY `idEntregas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `formaspagamento`
--
ALTER TABLE `formaspagamento`
  MODIFY `idFormasPagamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `idFornecedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `idItens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `pedidositens`
--
ALTER TABLE `pedidositens`
  MODIFY `idPedidosItens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tipouser`
--
ALTER TABLE `tipouser`
  MODIFY `idTipoUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_Itens_Marcas` FOREIGN KEY (`idMarcas`) REFERENCES `marcas` (`idMarcas`),
  ADD CONSTRAINT `fk_Itens_TiposItens` FOREIGN KEY (`idTiposItens`) REFERENCES `tipositens` (`idTiposItens`),
  ADD CONSTRAINT `fk_Itens_fornecedores` FOREIGN KEY (`idFornecedores`) REFERENCES `fornecedores` (`idFornecedores`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_formasPagamentos` FOREIGN KEY (`idFormasPagamentos`) REFERENCES `formaspagamento` (`idFormasPagamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedidositens`
--
ALTER TABLE `pedidositens`
  ADD CONSTRAINT `fk-PedidoaItens_entregas` FOREIGN KEY (`idEntregas`) REFERENCES `entregas` (`idEntregas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PedidosItens_Itens` FOREIGN KEY (`idItens`) REFERENCES `itens` (`idItens`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PedidosItens_Pedidos` FOREIGN KEY (`idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuario_tipoUser` FOREIGN KEY (`idTipoUser`) REFERENCES `tipouser` (`idTipoUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
