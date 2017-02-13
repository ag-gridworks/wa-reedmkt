-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2017 às 23:55
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reedx`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lances`
--

CREATE TABLE `lances` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `value` double(10,2) NOT NULL,
  `tdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lances`
--

INSERT INTO `lances` (`id`, `seller_id`, `buyer_id`, `product_id`, `message`, `value`, `tdate`) VALUES
(5, 1, 1, 12, 'mensagem filhda a ptua', 650.00, '2017-02-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_cover` varchar(150) NOT NULL,
  `profile-image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `profile_cover`, `profile-image`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'paesvitor@outlook.com', '42ecac30f8b513d7c922a5e1aa0660dd.jpg', ''),
(2, 'vitor', '202cb962ac59075b964b07152d234b70', 'vitor.paes@reedalcantara.com.br', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `user_id`, `name`, `description`, `value`, `image`) VALUES
(8, 1, 'aaaaa', 'abc', '20.00', 'dafa11a33cf6b9165f315e67ea9cfa7e.jpg'),
(11, 2, 'AndrÃ© Marques', 'AndrÃ© marques melhor dj', '30000.00', 'ed2edd0ac4002b2ec32be372657a52e3.jpg'),
(12, 1, 'Playstation 4', 'O Ps4 Slim Possui Um Design Menor, Economia De Energia E Um Novo Dual Shock 4\r\n\r\nO Sistema Playstation 4 Ã‰ O Melhor Lugar Para Jogar Com DinÃ¢mica, Jogos Conectados, Velocidade E GrÃ¡ficos Poderosos, PersonalizaÃ§Ã£o Inteligente, Capacidades Sociais Profundamente Integradas E FunÃ§Ãµes Inovadoras De Tela SecundÃ¡ria. Traz Esta EdiÃ§Ã£o Especial Para Os FÃ¢s Do Cabaleiro Da Noite.\r\n\r\nO Sistema Do Ps4 Foca Nos Jogadores, Garantindo Que Os Melhores Jogos E A ExperiÃªncia Mais Imersiva Seja PossÃ­vel Na Plataforma. O Ps4 Ã‰ Centrado Em Um Poderoso Chip Personalizado Que ContÃ©m Oito NÃºcleos X86-64 E Um TecnolÃ³gico Processador GrÃ¡fico 1.84 Tflops Com Um Sistema Unificado De MemÃ³ria Gddr5 Ultra RÃ¡pido De 8 Gb, Facilitando A CriaÃ§Ã£o De Jogos E Aumentando A Riqueza De ConteÃºdo PossÃ­vel Na Plataforma.', '600.00', '5fad3d7403956150226efddaa42c1b4b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lances`
--
ALTER TABLE `lances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lances`
--
ALTER TABLE `lances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
