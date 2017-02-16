-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Fev-2017 às 20:14
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

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
-- Estrutura da tabela `caronas`
--

CREATE TABLE `caronas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `ref1` varchar(150) NOT NULL,
  `ref2` varchar(150) NOT NULL,
  `point1` varchar(150) NOT NULL,
  `point2` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caronas`
--

INSERT INTO `caronas` (`id`, `user_id`, `start`, `status`, `ref1`, `ref2`, `point1`, `point2`) VALUES
(3, 2, 'Alberta, CanadÃ¡', 1, 'Alberta, CanadÃ¡', 'Estados Unidos', '31203 Princes Highway, Tantanoola, AustrÃ¡lia Meridional, AustrÃ¡lia', 'AZ, Estados Unidos');

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
  `tdate` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `profile_image` varchar(150) NOT NULL DEFAULT 'default.png',
  `profile_floor` int(11) NOT NULL,
  `profile_phone` int(11) NOT NULL,
  `profile_sector` varchar(20) NOT NULL,
  `user_messages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `profile_cover`, `profile_image`, `profile_floor`, `profile_phone`, `profile_sector`, `user_messages`) VALUES
(1, 'vitor paes', '202cb962ac59075b964b07152d234b70', '123@123.com', '', 'default.png', 0, 0, '', 0),
(2, 'vitor', '202cb962ac59075b964b07152d234b70', 'vitor.paes@reedalcantara.com.br', '', '742b32dbc5581eefaf2c84cc70bfbbe9.jpg', 666, 666, 'Dono da empresa', 9),
(3, 'ronaldo', '202cb962ac59075b964b07152d234b70', 'ronaldo@ronaldo.com', '', 'default.png', 0, 0, '', 0);

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
  `image` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caronas`
--
ALTER TABLE `caronas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `caronas`
--
ALTER TABLE `caronas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lances`
--
ALTER TABLE `lances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
