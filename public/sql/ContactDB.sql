-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 11 mars 2023 à 22:03
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testsecurity`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_user` int NOT NULL,
  `id_contact` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_user`, `id_contact`) VALUES
(2, 1),
(3, 1),
(4, 1),
(11, 1),
(14, 1),
(1, 2),
(4, 2),
(14, 2),
(23, 2),
(69, 2),
(1, 3),
(23, 3),
(70, 3),
(1, 4),
(2, 4),
(1, 11),
(1, 14),
(2, 14),
(2, 23),
(3, 23),
(2, 69),
(3, 70),
(100, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `roles`, `password`, `fname`, `lname`, `email`) VALUES
(1, 'Berger', '[\"ROLE_USER\"]', '$2y$13$okHwaDikvwGKUrFKugyByeoYVgRjXSpdyYL2AqWNoHbjr1y1WzOY6', 'Berger', 'Julien', 'julien.berger@free.fr'),
(2, 'Karl', '[\"ROLE_USER\"]', '$2y$13$.B8CCHWIzKy5MZRyF9QOuOCiactPp9Szl9AiRXdvhsdufbSpxu2Y.', 'Karl', 'Karl', 'kerl2@gmail.com'),
(3, 'Pont', '[\"ROLE_USER\"]', '$2y$13$LcKmRZaUr8On9LoCLaPswe8pE/sTIjQSxP5AM/3gcC.XrsnLiYEd6', 'Pont', 'Hélene', 'helene.pont@parisdescartes.fr'),
(4, 'Sunchine', '[\"ROLE_USER\"]', '$2y$13$l8X1mTCfNaV39RuVDL1tBOa2HnHSCcfqp1CXNydHPrt1lZocnZS3G', 'Sunchine', 'Anna Lisa', 'annalisa@parisdescartes.fr'),
(11, 'Dent', '[\"ROLE_USER\"]', '$2y$13$.rtivqvvvKTJLxGQZvEAY.BM1ltrvxGNshb3df2THWiJ5eOt4REVi', 'Dent', 'Arthur', 'sahm75@gmail.com'),
(14, 'JMI', '[\"ROLE_USER\"]', '$2y$13$qqMECcmlkymTXM69dkEIYuc9vpmtY.G.SCEC/WJAOfdoVNbEgWrR.', 'Ilié', 'Jean-Michel', 'jean-michel.ilie@parisdescartes.fr'),
(23, 'chhaib', '[\"ROLE_USER\"]', '$2y$13$Rcxz4yHUw.mQax8vx5z5TOj7dWH/cf9nTr2deKZShPFibrsAn6Mri', 'chhaib', 'yacine', 'yacinehcb@outlook.fr'),
(31, 'kienzler', '[\"ROLE_USER\"]', '$2y$13$W55CrPiw/M0gbfW48nh.Jum6zWwzxfDD7srg2v0spwqp0u/jLI2g6', 'kienzler', 'Florent', 'florentk98@gmail.com'),
(32, 'oss', '[\"ROLE_USER\"]', '$2y$13$Lf1DQ5GatIVViwZsOOvszejq2iNk6zhdC66GP5IvFSQGBKsJKgtOK', 'oss', 'John', 'oss@spy.fr'),
(69, 'Granger', '[\"ROLE_USER\"]', '$2y$13$810FBvw/FhfeVB95tfMYmOjp/LnNZvRk5ax2yGY0Da4M65998zgTK', 'Granger', 'Texas', 'LaBestGriffondor@gmail.com'),
(70, 'Potter', '[\"ROLE_USER\"]', '$2y$13$2WKGzxW90fru3.DyK3kw.O5VHdJnL3vZlhcy0qa.A3pTE/Xs2dTNC', 'Potter', 'Harry', 'LeBestGriffondor@gmail.com'),
(72, 'bond', '[\"ROLE_USER\"]', '$2y$13$XjQd4AkZxKKwfND/0UruVeDKV0erX/YvVRDMjyoyylIW.jrNUEyDK', 'bond', 'james', 'jamesjames@gmail.com'),
(100, 'Anxinou', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$2y$13$y6u9pgKwFN1unqcjiRae1.K7/i7LBHy7e8oOjxFJpzUWJAd5AszKe', 'Zhang', 'Anxian', 'azertyuiop@gmail.com'),
(1000, 'LXT', '[\"ROLE_USER\", \"ROLE_ADMIN\"]', '$2y$13$7QJWrAm6ABsji4r7rwLQL.K3ZHf129c5aT/u8hlxUvbZGZXQCGo2i', 'Lin', 'Xingtong', 'qwerty@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_user`,`id_contact`),
  ADD KEY `FK_IDCONTACT` (`id_contact`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_IDCONTACT` FOREIGN KEY (`id_contact`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_IDUSER` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;