-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbl_pccf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(250) NOT NULL,
  `util_id` int(250) DEFAULT NULL,
  `titre_about` varchar(250) DEFAULT NULL,
  `image_about` varchar(222) DEFAULT NULL,
  `text_about` varchar(225) DEFAULT NULL,
  `datepub_blog` varchar(11) DEFAULT NULL,
  `status_blog` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `util_id`, `titre_about`, `image_about`, `text_about`, `datepub_blog`, `status_blog`) VALUES
(1, 4, 'Qui Sommes-Nous?', 'logo3.png', 'Nous Sommes PEACE CHANGA-CHANGA FOUNDATION, une Association sans but lucratif, apolitique et non confessionnelle a été créée en ce jour: Janvier 2015.\r\nOn est a la recherche constant d&#039;une societé équitable, tolérante et', '27/04/24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(250) NOT NULL,
  `util_id` int(250) NOT NULL,
  `blog_image` varchar(222) NOT NULL,
  `blog_titre` varchar(250) DEFAULT NULL,
  `blog_content` varchar(250) DEFAULT NULL,
  `blog_date` varchar(250) DEFAULT NULL,
  `categorie_blog` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comentblog`
--

CREATE TABLE `tbl_comentblog` (
  `com_id` int(250) NOT NULL,
  `blog_id` int(250) NOT NULL,
  `com_nom` varchar(250) NOT NULL,
  `com_mail` varchar(30) NOT NULL,
  `com_date` varchar(20) NOT NULL,
  `com_comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id_co` int(250) NOT NULL,
  `email_co` varchar(222) NOT NULL,
  `address_co` varchar(222) NOT NULL,
  `numero_co` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id_co`, `email_co`, `address_co`, `numero_co`) VALUES
(2, 'Peacechangachangafoudation1@gmail.com', '	Avenue Kalehe, Quartier Mulongwe , Uvira Ville, RDC', '+243 972584021,+243 853008390');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipe`
--

CREATE TABLE `tbl_equipe` (
  `id_tim` int(250) NOT NULL,
  `titre_tim` varchar(250) NOT NULL,
  `role_tim` varchar(225) NOT NULL,
  `image_tim` varchar(200) NOT NULL,
  `linkf_tim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fairedon`
--

CREATE TABLE `tbl_fairedon` (
  `id_don` int(250) NOT NULL,
  `nom_don` varchar(250) NOT NULL,
  `email_don` varchar(250) NOT NULL,
  `address_don` varchar(250) NOT NULL,
  `phone_don` varchar(250) NOT NULL,
  `commentaire_don` varchar(250) NOT NULL,
  `date_don` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fairedon`
--

INSERT INTO `tbl_fairedon` (`id_don`, `nom_don`, `email_don`, `address_don`, `phone_don`, `commentaire_don`, `date_don`) VALUES
(1, 'Faradja', 'sifabf32@gmail.com', 'carama', '67292715', 'ddffff', '26/04/24'),
(2, 'Faradja', 'sifdabf32@gmail.com', 'carama', '67292715', 'dd', '26/04/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mission`
--

CREATE TABLE `tbl_mission` (
  `id_mi` int(250) NOT NULL,
  `titre_mi` varchar(250) DEFAULT NULL,
  `descri_mi` varchar(222) DEFAULT NULL,
  `detail_mi1` varchar(222) DEFAULT NULL,
  `detail_mi2` varchar(222) DEFAULT NULL,
  `detail_mi3` varchar(222) DEFAULT NULL,
  `detail_mi4` varchar(250) DEFAULT NULL,
  `status_mi` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mission`
--

INSERT INTO `tbl_mission` (`id_mi`, `titre_mi`, `descri_mi`, `detail_mi1`, `detail_mi2`, `detail_mi3`, `detail_mi4`, `status_mi`) VALUES
(1, 'NOTRE MISSION', 'Pccf a pour mission', 'Accompagner les personnes en situation de pauvreté', 'Apporter l&#039;accopagnement aux personnes en difficulté socio-economique', 'Inspirer et Connecter les gens a changer le monde', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mission_programme`
--

CREATE TABLE `tbl_mission_programme` (
  `id_mp` int(250) NOT NULL,
  `id_pro` int(250) NOT NULL,
  `titre1_mp` varchar(250) NOT NULL,
  `titre2_mp` varchar(250) NOT NULL,
  `titre3_mp` varchar(250) NOT NULL,
  `titre4_mp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mission_programme`
--

INSERT INTO `tbl_mission_programme` (`id_mp`, `id_pro`, `titre1_mp`, `titre2_mp`, `titre3_mp`, `titre4_mp`) VALUES
(1, 1, 'Collecter l’épargne des membres sous toutes ses formes', 'Consentir des crédits a ses membres', 'Accorder les services bancaires a toutes catégories de personnes ', 'Réduction de la pauvreté a la population'),
(2, 2, 'Réduction de la pauvreté a la population', 'Etre equitable dans la societe', 'Solidaire en mettant son action au service des personnes en situation de pauvreté', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programs`
--

CREATE TABLE `tbl_programs` (
  `id_pro` int(250) NOT NULL,
  `util_id` int(250) DEFAULT NULL,
  `titre_pro` varchar(200) DEFAULT NULL,
  `image_pro` varchar(200) DEFAULT NULL,
  `content_pro` varchar(200) DEFAULT NULL,
  `status_pro` varchar(20) DEFAULT NULL,
  `datepub_pro` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_programs`
--

INSERT INTO `tbl_programs` (`id_pro`, `util_id`, `titre_pro`, `image_pro`, `content_pro`, `status_pro`, `datepub_pro`) VALUES
(1, 4, 'CHANGA-CHANGA Microfinance Opportunities', 'microfinance.png', 'CHANGA-CHANGA Microfinance Opportunities La zone d’intervention de Changa Changa Microfinance s’étend dans toutes l’étendus de la République.', '1', '27/04/24'),
(2, 4, 'PEACE CHANGA-CHANGA FOUNDATION', 'LOGO-CHANGACHANG.png', 'Changa-changa Foundation par des aides equitables\r\ntolérante,\r\nsolidaire en mettant son action au service des personnes en situation de pauvreté.', '1', '27/04/24'),
(3, 4, 'ENTREPRENARIAT', 'img_1_1714231128760.jpg', 'Du Point de vue entreprenarial Pccf Oeuvre dans plusiers secteurs dont les biscuits, avec comme produit Changa-changa Biscuit', '1', '27/04/24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projets`
--

CREATE TABLE `tbl_projets` (
  `id_prj` int(250) NOT NULL,
  `categorie_prj` varchar(250) DEFAULT NULL,
  `image_prj` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_projets`
--

INSERT INTO `tbl_projets` (`id_prj`, `categorie_prj`, `image_prj`) VALUES
(2, 'Microfinance', 'microfinance.jpg'),
(3, 'Entreprenariat', 'img_1_1714231128760.jpg'),
(4, 'Agriculture', 'blogima2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slides`
--

CREATE TABLE `tbl_slides` (
  `id_sli` int(250) NOT NULL,
  `image_sli` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slides`
--

INSERT INTO `tbl_slides` (`id_sli`, `image_sli`) VALUES
(2, 'c.jpg'),
(3, 'Untitled-5.jpg'),
(4, 'Untitled-4.jpg'),
(5, 'Untitled-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id_sub` int(250) NOT NULL,
  `nom_sub` varchar(222) NOT NULL,
  `email_sub` varchar(222) NOT NULL,
  `subject_sub` varchar(222) NOT NULL,
  `message_sub` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_utilisateurs`
--

CREATE TABLE `tbl_utilisateurs` (
  `util_id` int(250) NOT NULL,
  `util_nom` varchar(250) DEFAULT NULL,
  `util_email` varchar(250) DEFAULT NULL,
  `util_password` varchar(250) DEFAULT NULL,
  `util_image` varchar(250) DEFAULT NULL,
  `util_role` varchar(210) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_utilisateurs`
--

INSERT INTO `tbl_utilisateurs` (`util_id`, `util_nom`, `util_email`, `util_password`, `util_image`, `util_role`) VALUES
(4, 'Jabf32', 'brysonbf32@gmail.com', '741', 'Untitled-6.jpg', 'Administrateur'),
(16, 'Admin', 'Peacechangachangafoudation1@gmail.com', 'admin', 'Untitled-1.jpg', 'Administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_valeurs`
--

CREATE TABLE `tbl_valeurs` (
  `id_va` int(250) NOT NULL,
  `titre_va` varchar(222) NOT NULL,
  `descri_va` varchar(222) NOT NULL,
  `detail_va1` varchar(222) NOT NULL,
  `detail_va2` varchar(222) NOT NULL,
  `detail_va3` varchar(222) NOT NULL,
  `detail_va4` varchar(222) NOT NULL,
  `status_va` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_valeurs`
--

INSERT INTO `tbl_valeurs` (`id_va`, `titre_va`, `descri_va`, `detail_va1`, `detail_va2`, `detail_va3`, `detail_va4`, `status_va`) VALUES
(1, 'NOS VALEURS', 'Pccf a comme valeurs', ' Honorer notre fondement chrétien et integrer les femmes de toutes religions et toutes origines', 'Respecter la diversité et soutenir les prencipes des droits humains telsque la participation, la non-discrimination et la responsabilité', ' Valoriser l&#039;histoire et le travail actuel de mouvement de P.C.C.F dans la diversité des contextes et des régions', 'Donner l&#039;exemple d&#039;un leadership partagé et intergenerationnel', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vision`
--

CREATE TABLE `tbl_vision` (
  `id_vi` int(250) NOT NULL,
  `titre_vi` varchar(222) DEFAULT NULL,
  `descri_vi` varchar(250) DEFAULT NULL,
  `detail_vi1` varchar(225) DEFAULT NULL,
  `detail_vi2` varchar(111) DEFAULT NULL,
  `detail_vi3` varchar(111) DEFAULT NULL,
  `detail_vi4` varchar(111) DEFAULT NULL,
  `statuss_vi` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vision`
--

INSERT INTO `tbl_vision` (`id_vi`, `titre_vi`, `descri_vi`, `detail_vi1`, `detail_vi2`, `detail_vi3`, `detail_vi4`, `statuss_vi`) VALUES
(1, 'NOTRE VISION', 'P.C.C.F est a la recherche constante d&#039;une societé:', 'Solidaire en mettant son action au service des personnes en situation de pauvreté', 'Etre tolérante', 'Etre equitable dans la societé', '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_comentblog`
--
ALTER TABLE `tbl_comentblog`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id_co`);

--
-- Indexes for table `tbl_equipe`
--
ALTER TABLE `tbl_equipe`
  ADD PRIMARY KEY (`id_tim`);

--
-- Indexes for table `tbl_fairedon`
--
ALTER TABLE `tbl_fairedon`
  ADD PRIMARY KEY (`id_don`);

--
-- Indexes for table `tbl_mission`
--
ALTER TABLE `tbl_mission`
  ADD PRIMARY KEY (`id_mi`);

--
-- Indexes for table `tbl_mission_programme`
--
ALTER TABLE `tbl_mission_programme`
  ADD PRIMARY KEY (`id_mp`);

--
-- Indexes for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `tbl_projets`
--
ALTER TABLE `tbl_projets`
  ADD PRIMARY KEY (`id_prj`);

--
-- Indexes for table `tbl_slides`
--
ALTER TABLE `tbl_slides`
  ADD PRIMARY KEY (`id_sli`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tbl_utilisateurs`
--
ALTER TABLE `tbl_utilisateurs`
  ADD PRIMARY KEY (`util_id`);

--
-- Indexes for table `tbl_valeurs`
--
ALTER TABLE `tbl_valeurs`
  ADD PRIMARY KEY (`id_va`);

--
-- Indexes for table `tbl_vision`
--
ALTER TABLE `tbl_vision`
  ADD PRIMARY KEY (`id_vi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_comentblog`
--
ALTER TABLE `tbl_comentblog`
  MODIFY `com_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id_co` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_equipe`
--
ALTER TABLE `tbl_equipe`
  MODIFY `id_tim` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_fairedon`
--
ALTER TABLE `tbl_fairedon`
  MODIFY `id_don` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mission`
--
ALTER TABLE `tbl_mission`
  MODIFY `id_mi` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mission_programme`
--
ALTER TABLE `tbl_mission_programme`
  MODIFY `id_mp` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_programs`
--
ALTER TABLE `tbl_programs`
  MODIFY `id_pro` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_projets`
--
ALTER TABLE `tbl_projets`
  MODIFY `id_prj` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_slides`
--
ALTER TABLE `tbl_slides`
  MODIFY `id_sli` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id_sub` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_utilisateurs`
--
ALTER TABLE `tbl_utilisateurs`
  MODIFY `util_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_valeurs`
--
ALTER TABLE `tbl_valeurs`
  MODIFY `id_va` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_vision`
--
ALTER TABLE `tbl_vision`
  MODIFY `id_vi` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
