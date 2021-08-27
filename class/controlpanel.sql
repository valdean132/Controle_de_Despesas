-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Ago-2021 às 15:50
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlpanel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.control_transactions`
--

CREATE TABLE `tb.control_transactions` (
  `id` int(11) NOT NULL,
  `uniqId` varchar(255) NOT NULL,
  `tipo-transacao` int(11) NOT NULL,
  `forma-pagamento` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `resp-transacao` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `tipo-entrada` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  `data-atual` date NOT NULL,
  `resp-responsavel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb.control_transactions`
--

INSERT INTO `tb.control_transactions` (`id`, `uniqId`, `tipo-transacao`, `forma-pagamento`, `descricao`, `resp-transacao`, `amount`, `tipo-entrada`, `observacoes`, `data-atual`, `resp-responsavel`) VALUES
(01, '703115306', 1, 'Cartão de Credito', 'Valdean ', 'Sandro Cordovil Rodrigues', 10000, 'Instalação', '', '2021-08-21', 'Valdean Souza'),
(02, '703115330', 0, 'Cartão de Credito', 'aaaa', 'Valdean Palmeira de Souza', 5000, '', '', '2021-08-21', 'Valdean Souza'),
(03, '2147483647', 1, 'Cartão de Credito', 'Teste de Entrada', 'Samuel Rodrigues', 8500, 'Instalação', 'Um Teste de Entrada\r\n\r\nPara Testar\r\n\r\n\r\nMais uma vêz', '2021-08-23', 'Valdean Souza'),
(04, '767132532', 0, 'Cartão de Credito', 'aaaa', 'Valdean Palmeira de Souza', 85000, '', '', '2021-08-23', 'Valdean Souza'),
(05, '770132856_6123dad8b9477', 1, 'Cartão de Debito', 'aaaa', 'Valdean Palmeira de Souza', 85000, 'Instalação', 'Instalação feita nessa data\r\n\r\n\r\nse nada a declarar', '2021-08-23', 'Valdean Souza'),
(06, '_6123db8890e2c', 1, 'Cartão de Credito', 'Teste de entrada ,ais ', 'Valdean Palmeira de Souza', 8500, 'Fatura', 'Teste de entrada', '2021-08-23', 'Valdean Souza'),
(07, '_6123dd20b27e8', 0, 'Cartão de Credito', 'Teste de Saida', 'Valdean Palmeira de Souza', 8500, '', 'teste de Saida\r\n\r\n\r\n\r\n\r\n\r\naaaaaaa', '2021-08-23', 'Valdean Souza'),
(08, '_6124ff2f62aef', 0, 'Cartão de Credito', 'Mais um teste', 'Sandro Cordovil Rodrigues', 2000, '', 'teste de saida\r\n\r\n\r\n\r\n\r\n\r\nespaço para testar', '2021-08-19', 'Valdean Souza'),
(09, '612504e5109f7-_-612504e5109fe', 0, 'Cartão de Credito', 'Mais um teste para testar id', 'Valdean Palmeira de Souza', 1500, '', '', '2021-08-24', 'Valdean Souza'),
(10, '1629905119779-_-4889715359337', 1, 'Cartão de Credito', 'Teste de Entrada ttssss', 'Valdean Palmeira de Souza', 8500, 'Emprestimo', '', '2021-08-26', 'Valdean Souza'),
(11, '1629912494856-_-4889737484568', 0, 'Cartão de Credito', 'Testde saida', 'Valdean Palmeira de Souza', 10000, '', '', '2021-08-24', 'Valdean Souza'),
(12, '1629914771717-_-4889744315151', 1, 'Cartão de Credito', 'Testde de entrada tyt', 'Valdean Palmeira de Souza', 8501, 'Instalação', 'Pagou no pix', '2021-08-26', 'Valdean Souza'),
(13, '1629917701768-_-4889753105304', 0, 'Cartão de Credito', 'ddd', 'Samuel Rodrigues', 1, '', '', '2021-08-25', 'Valdean Souza'),
(14, '1629918212839-_-4889754638517', 1, 'Cartão de Credito', 'Teste de Atualização', 'Sandro Cordovil Rodrigues', 2000, 'Fatura', '', '2021-08-25', 'Valdean Souza'),
(15, '1629922197721-_-4889766593163', 0, 'Cartão de Credito', 'Teste de atuzalição', 'Valdean Palmeira de Souza', 50, '', 'Teste de adção', '2021-08-25', 'Valdean Souza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb.control_user`
--

CREATE TABLE `tb.control_user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `themeMode` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb.control_user`
--

INSERT INTO `tb.control_user` (`id`, `user`, `password`, `name`, `themeMode`, `img`, `cargo`) VALUES
(1, 'valdean', 'VmFsZGVhbg==', 'Valdean Souza', 0, '', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb.control_transactions`
--
ALTER TABLE `tb.control_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb.control_user`
--
ALTER TABLE `tb.control_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb.control_transactions`
--
ALTER TABLE `tb.control_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb.control_user`
--
ALTER TABLE `tb.control_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
