-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 26 mars 2024 à 02:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pdf`
--

-- --------------------------------------------------------

--
-- Structure de la table `pdf_table`
--

CREATE TABLE `pdf_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `pdf_table`
--

INSERT INTO `pdf_table` (`id`, `name`, `img`) VALUES
(30, 'L\'appropriation ..', 'L’appropriation sociale des usages du multimédia et d’Internet.pdf'),
(31, 'Gestion des exceptions..', 'Gestion des exceptions dans un système.pdf'),
(35, 'La revolte..', 'La revolte de Rimbeau.pdf'),
(37, 'Les situations Considerations ', 'Les situations.pdf'),
(38, 'ahmed', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pdf_table`
--
ALTER TABLE `pdf_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pdf_table`
--
ALTER TABLE `pdf_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
