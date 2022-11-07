-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 05:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_ecole`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id_abs` int(11) NOT NULL,
  `N_CNIE` varchar(255) NOT NULL,
  `DATE_ABSENCE` date NOT NULL,
  `MOUTIF` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id_abs`, `N_CNIE`, `DATE_ABSENCE`, `MOUTIF`) VALUES
(8, 'RE2346', '2021-09-02', 'MALADE'),
(9, 'YH1145', '2019-10-28', 'MALADE');

-- --------------------------------------------------------

--
-- Table structure for table `affectations`
--

CREATE TABLE `affectations` (
  `id_aff` int(10) NOT NULL,
  `N_CNIE` varchar(255) NOT NULL,
  `DATE_ENTREE` date NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `ECOLE_AFFECTATION` text NOT NULL,
  `REF_AFFECTATION` varchar(120) NOT NULL,
  `DATE_REF` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affectations`
--

INSERT INTO `affectations` (`id_aff`, `N_CNIE`, `DATE_ENTREE`, `DATE_SORTIE`, `ECOLE_AFFECTATION`, `REF_AFFECTATION`, `DATE_REF`) VALUES
(5, 'YH1145', '2009-10-28', '2016-11-29', 'ENSA', 'YJ65', '2016-10-30'),
(7, 'RE2346', '2020-10-29', '2020-10-30', 'MIAGE', 'SAE678', '2020-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `gestion_personnels`
--

CREATE TABLE `gestion_personnels` (
  `id` int(11) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `N_CNIE` varchar(255) NOT NULL,
  `NOM` text NOT NULL,
  `PRENOM` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `ADRESSE` varchar(120) NOT NULL,
  `FONCTION` text NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `LIEU_DE_NAISSANCE` varchar(255) NOT NULL,
  `SEXE` varchar(1) NOT NULL,
  `TELEPHONE` int(12) NOT NULL,
  `SITUATION_FAMILLE` varchar(120) NOT NULL,
  `ACTIVATED` varchar(120) NOT NULL,
  `ROLE` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gestion_personnels`
--

INSERT INTO `gestion_personnels` (`id`, `IMAGE`, `N_CNIE`, `NOM`, `PRENOM`, `EMAIL`, `ADRESSE`, `FONCTION`, `DATE_NAISSANCE`, `LIEU_DE_NAISSANCE`, `SEXE`, `TELEPHONE`, `SITUATION_FAMILLE`, `ACTIVATED`, `ROLE`) VALUES
(11, '', 'FG567', 'KHADIJA', 'ERRADI', 'khadija@gmail.com', 'RUE-0987', 'PROFFESSEUR', '1992-11-29', 'ASFI', 'F', 2147483647, 'DIVORCE', '', ''),
(7, '', 'RE2346', 'ANAS', 'ROMI', 'anaas@gmail.com', 'RUE_567', 'R.H', '2001-11-28', 'ERRACHIDIA', 'M', 2147483647, 'MARIE', '', ''),
(6, '', 'YH1145', 'HASSAN', 'SAKHI', 'hassan@gmail.com', 'RUE_453', 'PROFFESSEUR', '1997-10-29', 'Rabat', 'M', 789657831, 'DIVORCE', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(10) NOT NULL,
  `N_CNIE` varchar(255) NOT NULL,
  `NOM` text NOT NULL,
  `PRENOM` text NOT NULL,
  `EMAIL` varchar(120) NOT NULL,
  `PASSWORD` varchar(120) NOT NULL,
  `IMAGES` varchar(255) NOT NULL,
  `SECURITY_CODE` varchar(255) NOT NULL,
  `ACTIVATED` varchar(255) NOT NULL,
  `ROLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `N_CNIE`, `NOM`, `PRENOM`, `EMAIL`, `PASSWORD`, `IMAGES`, `SECURITY_CODE`, `ACTIVATED`, `ROLE`) VALUES
(36, 'MO3679', 'MOUNIR', 'AHMED', 'mounir@gmail.com', 'MO1234', '', '', '1', 'ADMIN'),
(38, 'AMi4567', 'MUSTAFA', 'ROMI', 'mustafa@gmail.com', '123456', '', '', '1', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id_abs`),
  ADD KEY `N_CNIE` (`N_CNIE`);

--
-- Indexes for table `affectations`
--
ALTER TABLE `affectations`
  ADD PRIMARY KEY (`id_aff`),
  ADD KEY `N_CNIE` (`N_CNIE`);

--
-- Indexes for table `gestion_personnels`
--
ALTER TABLE `gestion_personnels`
  ADD PRIMARY KEY (`N_CNIE`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `N_CNIE` (`N_CNIE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id_abs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `affectations`
--
ALTER TABLE `affectations`
  MODIFY `id_aff` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gestion_personnels`
--
ALTER TABLE `gestion_personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`N_CNIE`) REFERENCES `gestion_personnels` (`N_CNIE`);

--
-- Constraints for table `affectations`
--
ALTER TABLE `affectations`
  ADD CONSTRAINT `affectations_ibfk_1` FOREIGN KEY (`N_CNIE`) REFERENCES `gestion_personnels` (`N_CNIE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
