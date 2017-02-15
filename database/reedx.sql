-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Fev-2017 às 19:17
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

--
-- Extraindo dados da tabela `lances`
--

INSERT INTO `lances` (`id`, `seller_id`, `buyer_id`, `product_id`, `message`, `value`, `tdate`, `status`) VALUES
(1, 2, 2, 11, 'adasdsad', 23.00, '2017-02-15', 1),
(2, 2, 2, 11, 'asdasdsad', 23.00, '2017-02-15', 1),
(3, 2, 2, 11, 'fdfdafad', 23.00, '2017-02-15', 1),
(4, 2, 2, 11, 'asdadfgdfdafvfbv', 23.00, '2017-02-15', 0);

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
(2, 'vitor', '202cb962ac59075b964b07152d234b70', 'vitor.paes@reedalcantara.com.br', '', '742b32dbc5581eefaf2c84cc70bfbbe9.jpg', 5, 884848, 'fsfsrf', 8);

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
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `user_id`, `name`, `description`, `value`, `image`, `category`) VALUES
(11, 2, 'adsad', 'dsfsdf', '23.00', '1ab127b608a97e94579fda10083b8433.jpg', 'Moda');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
