-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 nov. 2024 à 23:31
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
-- Base de données : `bakery`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArt` int(11) NOT NULL,
  `nomArt` varchar(50) NOT NULL,
  `designArt` text NOT NULL,
  `prixArt` int(11) NOT NULL,
  `quantArt` int(11) NOT NULL,
  `dispoArt` int(11) NOT NULL,
  `catArt` int(11) NOT NULL,
  `imgArt` varchar(50) NOT NULL,
  `bestSeller` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArt`, `nomArt`, `designArt`, `prixArt`, `quantArt`, `dispoArt`, `catArt`, `imgArt`, `bestSeller`) VALUES
(4, 'Macaran à la crème du lait', 'Composé de deux coques croustillants à base d\'amande', 18000, 10, 1, 3, 'images/macaron crème.jpg', 0),
(5, 'macaran aux fraise', 'le macaran aux fraises est une merveille...', 18000, 8, 1, 3, 'images/fraiseMacaronss.jpg', 0),
(6, 'Macaran au framboise', 'Le macaran à la framboise est un délicieux dessert', 19000, 7, 1, 3, 'images/chocociframboise macaron.jpg', 0),
(7, 'Macaran au saveur de pistache', 'Le macaran à la pistache est une petite gourmandise', 22000, 10, 1, 3, 'images/pistache.jpg', 1),
(8, 'Macaran au chocolat', 'Le macaran à la pistache est une petite gourmandise', 17000, 15, 1, 3, 'images/chocolatMacaronns.jpg', 1),
(9, 'Macaron du Magador', 'Le macaran à la pistache est une petite gourmandise', 18000, 10, 1, 3, 'images/macaron mogador.jpg', 0),
(10, 'Macaran du jardin enchanté', 'Le macaran à la pistache est une petite gourmandise', 23000, 2, 1, 3, 'images/macrons jardin enchanté.jpg', 0),
(11, 'Truffles au chocolat et à la créme de café', ' Notre irrésistible association de chocolat et de café avec nos\r\n                truffes à la crème de café. Ces petites gourmandises chocolatées\r\n                sont remplies d\'une crème onctueuse de café, le tout enrobé d\'un\r\n                chocolat n', 20000, 20, 1, 2, 'images/bouleChoc.jpg', 0),
(12, 'Truffes salées au chocolat et à l\'avocado', 'Nos truffes salées au chocolat et à l\'avocat ! Elles sont\r\n                remplies d\'une crème d\'avocat onctueuse et assaisonnée de sel de\r\n                mer, le tout enrobé d\'un chocolat noir riche en saveurs. Ces\r\n                truffes sont parfait', 24000, 20, 1, 2, 'images/salée.jpg', 0),
(13, 'Truffes au chocolat et aux fraises', 'Nos truffes au chocolat et aux fraises ! Ces délicieuses\r\n                bouchées sont faites d\'une ganache de chocolat noir veloutée et\r\n                fondante, mélangée à des morceaux de fraises séchées pour une\r\n                touche fruitée irrési', 37500, 20, 1, 2, 'images/strawberry.jpg', 1),
(14, 'Truffes au chocolat et à la noix de coco', ' Nos truffes au chocolat et à la noix de coco sont une véritable\r\n                explosion de saveurs exotiques en bouche ! Confectionnées avec\r\n                une ganache de chocolat noir onctueuse, elles sont enrobées de\r\n                noix de coco ', 28500, 20, 1, 2, 'images/noixcoco.jpg', 1),
(15, 'Dattes au chocolat', ' Nos dattes au chocolat sont un délice pour les amateurs de\n                chocolat et de fruits secs ! Les dattes moelleuses sont farcies\n                d\'une ganache de chocolat noir riche et onctueuse, créant un\n                mariage parfait de ', 31000, 20, 1, 2, 'images/Dates.jpg', 0),
(16, 'Truffes au citron', ' Nos truffes au citron sont une véritable explosion de saveurs en\r\n                bouche ! La ganache de chocolat fondante est mélangée à une\r\n                crème de citron acidulée, créant un équilibre parfait entre le\r\n                sucré et l\'acid', 35000, 20, 1, 2, 'images/mocha crean choc.jpg', 0),
(17, 'Cupcake à la crème', 'Notre sélection de cupcakes à la crème, des petites gourmandises qui feront fondre vos papilles ! Confectionnés à partir d\'un moelleux gâteau vanillé, nos cupcakes sont garnis d\'une crème onctueuse et légère', 6000, 20, 1, 4, 'images/cremeCup.jpg', 1),
(18, 'Cupcake au chocolat', 'Nos cupcakes au chocolat sont faits avec un gâteau moelleux et fondant en bouche, nos cupcakes sont garnis d\'une crème onctueuse au chocolat noir riche et intense.', 7000, 20, 1, 4, 'images/chocolat.jpg', 1),
(19, 'Cupcake aux fraises', 'Nos cupcakes aux fraises, une délicieuse combinaison de saveurs fruitées et de gourmandise sucrée ! Nos cupcakes sont faits avec un gâteau léger et moelleux, garni d\'une crème à la fraise légère.', 9000, 20, 1, 4, 'images/fraise.jpg', 0),
(20, 'Cupcake aux noisettes et biscuits', 'Nos cupcakes aux noisettes et biscuits, une délicieuse combinaison de saveurs croquantes et de notes de noisette grillée ! Nos cupcakes sont préparés avec un gâteau moelleux et léger, garni d\'une crème légère aux noisettes grillées, et décorés avec des bi', 10000, 20, 1, 4, 'images/Noisette et biscuit.jpg', 0),
(21, 'Cupcake au miel', 'Nos cupcakes au miel, une douceur subtilement parfumée qui ravira vos papilles ! Nos cupcakes sont préparés avec un gâteau moelleux et léger, enrichi d\'un miel de qualité supérieure pour une saveur riche et délicate.', 11000, 20, 1, 4, 'images/miel.jpg', 0),
(22, 'Cupcake avec l\'Oreo et Cacao', 'Irrésistible cupcake à l\'OREO et au cacao, une douceur gourmande qui comblera tous les amateurs de chocolat ! Nous préparons nos cupcakes avec un gâteau moelleux au cacao, et y ajoutons des morceaux d\'OREO croquants pour une texture et un goût exceptionne', 16000, 20, 1, 4, 'images/oreo1.jpg', 0),
(23, 'Kiddo Cupcake', 'Notre incroyable cupcake Kiddo avec un goût de chewing-gum, une gourmandise ludique qui fera craquer les enfants comme les adultes ! Nous préparons nos cupcakes avec un délicieux gâteau moelleux et léger, auquel nous ajoutons un arôme de chewing-gum pour ', 17000, 20, 1, 4, 'images/kidoCupcake.jpg', 0),
(24, 'Cupcake au caramel', 'Notre délicieux cupcake au caramel, un classique de la pâtisserie revisité avec notre touche personnelle ! Nous préparons nos cupcakes avec un gâteau moelleux et léger, que nous garnissons d\'une crème onctueuse et gourmande au caramel, pour une expérience', 18000, 20, 1, 4, 'images/caramelCup.jpg', 0),
(25, 'Croissant Classique', 'Notre délicieux croissant classique, croustillant à l\'extérieur et moelleux à l\'intérieur. Préparé avec du beurre de qualité supérieure et une pâte feuilletée légère, notre croissant est parfait pour un petit-déjeuner gourmand.', 4000, 20, 1, 1, 'images/classique.jpg', 0),
(26, 'Croissant aux cacahuètes', 'Notre croissant aux cacahuètes, une explosion de saveurs en bouche ! Fabriqué avec une pâte feuilletée légère et croustillante, ce croissant est garni d\'une délicieuse pâte d\'amande aux cacahuètes, pour un mélange sucré-salé parfait.', 5000, 20, 1, 1, 'images/cacahuète.jpg', 0),
(27, 'Croissant amandes+Chocolat', 'Notre croissant aux amandes et au chocolat, une gourmandise irrésistible ! Préparé avec une pâte feuilletée croustillante et des amandes effilées dorées, ce croissant est garni d\'une délicieuse pâte d\'amande aux amandes, le tout agrémenté d\'un cœur fondant de chocolat noir.', 6000, 20, 1, 1, 'images/Spécial.jpg', 1),
(28, 'Croissant aux pistaches', 'Notre croissant aux pistaches, une délicieuse gourmandise à la fois croquante et fondante ! Idéal pour un petit-déjeuner original ou une pause gourmande, notre croissant aux pistaches est une invitation à la découverte de nouvelles saveurs.', 6000, 20, 1, 1, 'images/pistacheCroiss.jpg', 1),
(29, 'Croissant aux amandes', 'Dégustez notre croissant aux amandes, une véritable gourmandise qui saura ravir vos papilles ! Confectionné à partir d\'une pâte feuilletée croustillante et d\'amandes effilées dorées, ce croissant est garni d\'une généreuse quantité de pâte d\'amande aux amandes.', 7, 20, 1, 1, 'images/amande.jpg', 0),
(30, 'Croissant au chocolat', 'Découvrez notre croissant au chocolat, une pâtisserie iconique qui saura satisfaire tous les amateurs de chocolat ! Préparé avec une pâte feuilletée croustillante et un cœur fondant de chocolat noir.', 8, 20, 1, 1, 'images/chocolat et sucre glace.jpg', 0),
(31, '', '', 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCat` int(11) NOT NULL,
  `nomCat` varchar(50) NOT NULL,
  `descripCat` varchar(100) NOT NULL,
  `imgCat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCat`, `nomCat`, `descripCat`, `imgCat`) VALUES
(1, 'Croissant', 'Un croustillant irrésistible', 'images/CroissCat.jpg'),
(2, 'Chocolat', 'Plaisir intense pour les occasions', 'images/ChocCat.jpg'),
(3, 'Macaron', 'Un concentré et variété des saveurs', 'images/troismacar.jpg'),
(4, 'Cupcake', 'Original, savoureux et mignons', 'images/CupcakeCat.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `phone`, `password`) VALUES
(1, 'guesmi', 'oumaima', 'guesmioumaima2001@gmail.com', '51162424', '$2y$10$5y99rwgndbBz.g44b2/n4.hGxo.4eVyrDu6Uhezhtwuc6SuxTTy8K'),
(2, 'chaieb', 'naziha', 'chaiebNaziha@gmail.com', '20185691', '$2y$10$S9fuAAtaOaZ19rYwU1542edPsxfRwLrt/PezW76dOqfYWhpH3hVh.'),
(3, 'barchouchi', 'mohtadi', 'barchouchimohtadi@gmail.com', '55487232', '$2y$10$0h..bTlKAFvi26VzJiKNduX1VoXQv4gt7lNnKP21gKbPMnJpvHBfu'),
(4, 'guesmi', 'hassen', 'guesmihassen@gmail.com', '55333789', '$2y$10$7/7wgW5dxgcV/ixw8f1zmuQBF0CBPoC8TSs8.5vmnYxM6eh/QJSf.'),
(5, 'trabelsi', 'jihen', 'trabelsijiheny@gmail.com', '23147445', '$2y$10$HE6jSdAL.ie/sSkyXMk7Be/80/gCR/z4r0Rxre4mV4IDssG7qBIXm'),
(6, 'salem', 'chadha', 'salemchadha@gmail.com', '97810002', '$2y$10$oZKWgHH9PaAwJlNZCM808uk/dO.3YAAKsj8dVa3zpenuoy7WF7fIe'),
(7, 'guesmi', 'houssem', 'guesmihoussem@gmail.com', '24152010', '$2y$10$DovjK4YCIt0xnidsZPaz9OXzsWSb9Od1z1H6eq2ec1CM0TNasKYmG'),
(8, 'hamrouni', 'khouloud', 'khouloud@gmail.com', '22142001', '$2y$10$CnMszny510vtdHQxLv2Fcu0B4gkcvdGu1o5BAltZxFSFki2trji2O'),
(9, 'chebbi', 'leyla', 'leyla@gmail.com', '23252000', '$2y$10$GxW.AyBGPn3xSTMOEw9Squdk6JpKr/sjSC6Vx/uVPks73xY1Quao.'),
(10, 'oumaima', 'guesmi', 'oumaima@gmail.com', '22541147', '$2y$10$CzbrF9rzIBhSU/sZx.z5T.1YIIojcZigri7jc6tjF7byUVwfpQxwK');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `adresse_client` varchar(50) NOT NULL,
  `satisfaction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `adresse_client` varchar(50) NOT NULL,
  `code_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `code_article` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `adresse_client` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`code_article`, `quantite`, `id`, `adresse_client`) VALUES
(4, 2, 16, 'leyla@gmail.com'),
(26, 1, 17, 'leyla@gmail.com'),
(6, 1, 20, 'oumaima@gmail.com'),
(18, 1, 21, 'oumaima@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArt`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
