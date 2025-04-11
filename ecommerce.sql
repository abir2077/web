-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 12:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','moderateur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(1, 'salima', 'cherrahi', 'cherrahi113@gmail.com', '$2y$10$HWlj59wlYfPopnYuAVZGdOThnes.2xImYBbVv83yfOQqxb4uQFN0W', 'moderateur'),
(2, 'sssss', 'ffffffff', 'cccc@gmail.com', '$2y$10$LY4eaF22ZjTjWGGy/zq2OunOVyMQzbGkdnosktNnGY2v4LWLaATX2', 'super_admin'),
(3, 'zertyui', 'dddd', 'nnnnn@gmail.com', '$2y$10$ShGnVtA7sPbxcoI.86PoieqvWae/tq8uxueCInWOwEDQn/Kv0EbO6', 'super_admin'),
(4, 'ddd', 'gggg', 'hhhh@gmail.com', '$2y$10$alwiJWCX9IjXkC28WOfS4OVf3cuJRwRi3heG3tWgnLoanR4yVz096', 'moderateur'),
(5, 'zzzz', 'ddd', 'adsfdf@gmail.com', '$2y$10$krHfTo2IyQ2dRdA2OzJe1eUyQgl6hdyWHX3OyTfTqcVxHI7moWpfi', 'moderateur'),
(6, 'lara', 'rere', 'yyyy@gmail.com', '$2y$10$8q7Hdyt4HUX2GykkTZRGaeb9Sx/WTO/j1ipxPrt6mkuyUf7p8CLLq', 'super_admin'),
(7, 'ruru', 'rerre', 'bb56@gmail.com', '$2y$10$UjXlgIe0RzGIGVrRL2MA7OliuPBYslHKxQZMLFO/pDTYwhxJsMWKC', 'moderateur'),
(9, 'nnn', 'mm', 'uouo@gmail.com', '$2y$10$FYEXFzim9Regj72zHDDJ2e8d6yJC./L90zYn058qk6hj7d36rywAW', 'super_admin'),
(10, 'hjjhhj', 'uuhh', 'wxwx@gmail.com', '$2y$10$J5K1rxEE5qqq9QRX2JBMPu2v/AxkjtxpzFKGVravskRXHhqRvVFOq', 'super_admin'),
(11, 'kkj', 'llo', 'iopo@gmail.com', '$2y$10$HILlmgdW0dJPZFYIH7HuoesKSF.mRLIaD41XmUSfKCoIDcCKO0pbe', 'moderateur'),
(13, 'cvvcvc', 'bvbv', 'gtgt@gmail.com', '$2y$10$B9BfIk0fNy9u7pwrhrpF7OHQHSWf4DVQ6wrGj1A3z/yXU81Rj1XjG', 'moderateur'),
(14, 'azz', 'sqqs', 'nono@gmail.com', '$2y$10$YyL0oLPXeXGm2ltZ1jMi..bRbiHRTjjF1ORvIPfiPaGJmjn/LEqq6', 'moderateur'),
(15, 'ee', 'eee', 'sloh@gmail.com', '$2y$10$/46aG8Fb1jy.mYYchReLCeCp3BjKZ89Je7m3X41Oal6jNsiEi.jMi', 'moderateur'),
(16, 'fgh', 'fgh', 'sdg@gmail.com', '$2y$10$Elgs3TQ7LyLKb0hNFGxiLeT8B1DfWdDmLi8oxE16huSa/b5haOSum', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_categorie`
--

CREATE TABLE `admin_categorie` (
  `id_admin` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id_admin` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id_admin`, `id_permission`) VALUES
(2, 1),
(2, 3),
(3, 3),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 3),
(13, 3),
(14, 1),
(15, 4),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bon_demande`
--

CREATE TABLE `bon_demande` (
  `id_bon` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `date_demande` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('envoyé','en attente','reçu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bon_demande_produit`
--

CREATE TABLE `bon_demande_produit` (
  `id_bon` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text,
  `avis` text,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `avis`, `password`, `token`, `is_verified`, `reset_token`, `reset_expires`) VALUES
(18, 'zertyui', 'dddd', 'mmmc@gmail.com', '0564848', 'xxxxx', NULL, '$2y$10$aZuE0BhcEno42IKKZfUSUugpBr2C8V5hVMBBz36oCrCGe8QsANZMC', 'cfcb68a87deed43c3cbf96c5ab36bde700e1c518f49cde3e6a9d7b3736d33780', 0, NULL, NULL),
(19, 'dfg', 'dfg', 'tttthh@gmail.com', '852741', 'ppp', NULL, '$2y$10$piebrTmraQ.2o/it3/niquLdgWyioMJY9ClOzwLcQsgjEodn28fge', '9ff682200779a000dde50d37eca71fccee0a4697449996780e00bdc68d684757', 0, NULL, NULL),
(20, 'ff', 'lll', 'oooor@gmail.com', '1598753', 'xxxxx', NULL, '$2y$10$qN1gogmWKDHvVRC5s6sQ0OaRg1YBxKUjHbkVOPhz52/ZIs4q1.i2O', 'b68acc1e8d15e4ba01653b58f0e294474fc699a8f852f0f576953f786b6a01b8', 0, NULL, NULL),
(21, 'ert', 'rth', 'jjjjjf@gmail.com', '0564848', 'ppp', NULL, '$2y$10$GmxfMRm4GhhI70wXeaL2IOXzvT23nEOlTlVipBkOHGwxk0btXZJbe', 'a389b52729216b20112ac781a6f847e79cf083936cc1ecd23fc3f034d082580f', 0, NULL, NULL),
(22, 'sssss', 'dddd', 'nnnn@gmail.com', '2589', 'xxxxx', NULL, '$2y$10$SWYXuUXxNOAXSMkoEWwi6OzTrJNbIzgxv2IDSy4yQcCrjRKgiKyz6', '169741e2f9ee9eeedddfd281c8470ce3d05e70aaea87e1fc6da2a55df4a13aec', 0, NULL, NULL),
(23, 'erty', 'dfghj', 'iuytr@gmail.com', '852963', 'oiuy', NULL, '$2y$10$3RaEnbI.NI7iy.Je1HDCQ.XUx.PUkeCNoxULDBd1NadQbTDhqvPMi', '4eef7be4ac8b2155f754a10b78410c1255369dae057f5cc7f77b1f3da03a2d64', 0, NULL, NULL),
(24, 'zertyui', 'qqq', 'nnnnn@gmail.com', '258741', 'oiuy', NULL, '$2y$10$g4YEYN7vcHCsWAl/HwwcTuCQGc.siP1Mk8dMkAhBHkSl5okt2xj..', NULL, 1, '47a227f903b42138a823d739c6d91c28657da13451755c0a3a0870389836ce3e', '2025-03-30 13:29:17'),
(25, 'xxxx', 'fgfgfg', 'jj12@gmail.com', '057964', 'oiuy', NULL, '$2y$10$xmBDznnaNkMDrgLz/iGS..McqnAdQGEDns5kbIXbduadWXWgDaNSm', NULL, 1, NULL, NULL),
(26, 'zertyui', 'ffffffff', 'hhhh@gmail.com', '0564848', 'oiuy', NULL, '$2y$10$9ZUZTlmr/D9gLu05GYwx3O6Gky55in.IVmCRIR7vbdFeDjtdp4TBW', NULL, 1, NULL, NULL),
(27, 'sssss', 'ffffffff', 'cccc@gmail.com', '06457891', 'oiuy', NULL, '$2y$10$OibYTM8St5H2QYhYoi2atOYGJYTc.Fkh.RvFLPNRuHIcXmmq50mJG', NULL, 1, NULL, NULL),
(28, 'salima', 'dddd', 'oooo@gmail.com', '0564848', 'xxxxx', NULL, '$2y$10$CaERgfbl9FLqXY6NmjpUqOU0y2JP46fFNgDXIZd.P/Y9NQ9QXNk4W', '84153921aad4c18847aa189f819b64e32e17e4e547e74bdc90b53ac2493362f5', 0, NULL, NULL),
(29, 'salima', 'dddd', 'ohrh@gmail.com', '0564848', 'xxxxx', NULL, '$2y$10$ijxVFMhlFK1azDET09xwreJ2iK5rTMztXv5fle8sZt/KBspBReBW6', '56ba1dff561a74c69828023745bfad7b005935adebd03a2ff317be01f707f3b1', 0, NULL, NULL),
(30, 'hhhh', 'okok', 'uiui@gmail.com', '12387', 'mlkjh', NULL, '$2y$10$438puqNqrgJXoS7WzeSksOvTP99E0adHtv4w1na2kJ0a6iWzp8n72', 'f91c99d23cef9b81a1286197cc3b8fa31ec3dac2d9b50b171d4fa39bce6f76de', 0, NULL, NULL),
(31, 'assasa', 'qsqs', 'vnbc@gmail.com', '1478', 'ljklkkl', NULL, '$2y$10$lvjWyyhGIqIE1//2zNjSxeSXjHlPHf03UqcUvuO31lVRy5iElc4Ki', NULL, 1, NULL, NULL),
(32, 'lllp', 'lklk', 'tyty@gmail.com', '1598753', 'ppp', NULL, '$2y$10$zZYUahG6iGlpSGlmjC0y/uY3KCC0vfJSuFvYMl/SO5ilW.fVNWX42', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `nu_commande` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('en cours','validée','annulée') DEFAULT NULL,
  `montant_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `nu_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `adresse` text,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panier_produit`
--

CREATE TABLE `panier_produit` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `total_par_produit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `permission_name`) VALUES
(2, 'manage_orders'),
(3, 'manage_products'),
(1, 'manage_users'),
(4, 'site_settings');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` text,
  `prix` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produit_categorie`
--

CREATE TABLE `produit_categorie` (
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_categorie`
--
ALTER TABLE `admin_categorie`
  ADD PRIMARY KEY (`id_admin`,`id_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id_admin`,`id_permission`),
  ADD KEY `id_permission` (`id_permission`);

--
-- Indexes for table `bon_demande`
--
ALTER TABLE `bon_demande`
  ADD PRIMARY KEY (`id_bon`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Indexes for table `bon_demande_produit`
--
ALTER TABLE `bon_demande_produit`
  ADD PRIMARY KEY (`id_bon`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`nu_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`nu_commande`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD PRIMARY KEY (`id_panier`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`),
  ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `produit_categorie`
--
ALTER TABLE `produit_categorie`
  ADD PRIMARY KEY (`id_produit`,`id_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bon_demande`
--
ALTER TABLE `bon_demande`
  MODIFY `id_bon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `nu_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_categorie`
--
ALTER TABLE `admin_categorie`
  ADD CONSTRAINT `admin_categorie_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_categorie_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE;

--
-- Constraints for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD CONSTRAINT `admin_permissions_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_permissions_ibfk_2` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id_permission`) ON DELETE CASCADE;

--
-- Constraints for table `bon_demande`
--
ALTER TABLE `bon_demande`
  ADD CONSTRAINT `bon_demande_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `bon_demande_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE CASCADE;

--
-- Constraints for table `bon_demande_produit`
--
ALTER TABLE `bon_demande_produit`
  ADD CONSTRAINT `bon_demande_produit_ibfk_1` FOREIGN KEY (`id_bon`) REFERENCES `bon_demande` (`id_bon`) ON DELETE CASCADE,
  ADD CONSTRAINT `bon_demande_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE;

--
-- Constraints for table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`nu_commande`) REFERENCES `commande` (`nu_commande`) ON DELETE CASCADE,
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE;

--
-- Constraints for table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD CONSTRAINT `panier_produit_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`) ON DELETE CASCADE,
  ADD CONSTRAINT `panier_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE;

--
-- Constraints for table `produit_categorie`
--
ALTER TABLE `produit_categorie`
  ADD CONSTRAINT `produit_categorie_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE,
  ADD CONSTRAINT `produit_categorie_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
