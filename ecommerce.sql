-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 11:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(7, 'Lenovo', 'lenovo', 0, '2023-06-07 22:42:58', '2023-06-07 22:42:58', 8),
(8, 'DELL', 'dell', 0, '2023-06-07 22:43:12', '2023-06-07 22:43:12', 8),
(9, 'LOGITECH', 'logitech', 0, '2023-06-07 22:43:29', '2023-06-07 22:43:29', 8),
(10, 'HP', 'hp', 0, '2023-06-07 22:43:42', '2023-06-07 22:43:42', 8),
(11, 'COMPACT ', 'compact', 0, '2023-06-07 23:55:03', '2023-06-07 23:55:03', 8),
(12, 'ACER', 'acer', 0, '2023-06-11 09:44:23', '2023-06-11 09:44:23', 9),
(13, 'HP', 'hp', 0, '2023-06-11 13:38:31', '2023-06-11 13:38:31', 10),
(14, 'KINGSTON ', 'kingston', 0, '2023-06-24 06:30:26', '2023-06-24 06:30:26', 11),
(15, 'IMATION', 'imation', 0, '2023-06-24 06:31:02', '2023-06-24 06:31:02', 11),
(16, 'SCANDISK', 'scandisk', 0, '2023-06-24 06:31:39', '2023-06-24 06:31:39', 11);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Périphériques d\'entrée', 'peripheriques-dentree', 'Équipements informatiques pemettant de communiquer avec un ordinateur', 'uploads/category/1686181218.jpg', 'Périphériques d\'entrée', 'Périphériques d\'entrée', 'Périphériques d\'entrée', 0, '2023-06-07 22:25:57', '2023-06-07 22:40:18'),
(9, 'Périphériques de sortie', 'peripheriques-de-sortie', 'Les périphériques de sortie sont des dispositifs qui permettent à un système informatique ou électronique de transmettre des informations ou de produire des résultats visibles, audibles ou tactiles. Ils convertissent les données traitées par le système en une forme compréhensible pour les utilisateurs.', 'uploads/category/1686479950.png', 'Périphériques de sortie', 'Périphériques de sortie', 'Périphériques de sortie', 0, '2023-06-11 09:39:10', '2023-06-11 09:39:10'),
(10, 'Imprimantes', 'imprimantes', 'Une imprimante est un périphérique électronique utilisé pour reproduire des documents, des images ou d\'autres types de contenus physiques sur papier ou sur d\'autres supports.', 'uploads/category/1686495635.png', 'Imprimantes', 'Imprimantes', 'Imprimantes', 0, '2023-06-11 13:36:56', '2023-06-11 14:00:35'),
(11, 'périphériques de stockage', 'peripheriques-de-stockage', 'Permet de sauvegarder des données de manière définitive', 'uploads/category/1687591717.png', 'périphériques de stockage', 'périphériques de stockage', 'périphériques de stockage', 0, '2023-06-24 06:28:37', '2023-06-24 06:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RED', 'red', 0, '2023-05-05 09:03:52', '2023-05-05 09:03:52'),
(2, 'Black', 'black', 0, '2023-05-05 09:09:29', '2023-06-07 23:07:36'),
(5, 'BLUE', 'blue', 0, '2023-05-05 09:38:47', '2023-05-05 09:38:47'),
(6, 'PURPLE', 'purple', 1, '2023-05-05 09:39:16', '2023-05-05 10:11:46'),
(7, 'YELLOW', 'yellow', 0, '2023-05-05 09:39:43', '2023-05-05 09:39:43'),
(8, 'GREEN', 'green', 0, '2023-05-05 09:40:06', '2023-05-05 09:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_28_220129_add_details_to_users_table', 2),
(7, '2023_04_29_193517_create_categories_table', 3),
(8, '2023_04_30_192104_create_brands_table', 4),
(9, '2023_05_02_145751_create_products_table', 5),
(10, '2023_05_03_103056_create_product_images_table', 5),
(12, '2023_05_05_092445_create_colors_table', 6),
(13, '2023_05_05_123402_create_product_colors_table', 7),
(14, '2023_05_17_124654_create_sliders_table', 8),
(15, '2023_05_18_165517_add_category_id_to_brands_table', 9),
(16, '2023_05_19_135829_create_whishlists_table', 10),
(17, '2023_05_19_143849_create_wishlists_table', 11),
(18, '2023_05_20_153354_create_carts_table', 12),
(19, '2023_05_20_231847_create_orders_table', 13),
(20, '2023_05_20_232302_create_order_items_table', 13),
(22, '2023_05_31_190655_create_settings_table', 14),
(23, '2023_06_02_222927_create_user_details_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(17, 2, 'E-Com-bLkCqwQ8dx', 'Admin', 'lamareloulou@gmail.com', '672052482', '986545', 'PETIT BOABAB-BONBERI, Douala, Littoral, Cameroun', 'PENDING', 'Cash On Delivery', NULL, '2023-06-09 20:46:43', '2023-06-09 20:55:26'),
(18, 2, 'E-Com-kUP9qUDFdk', 'Lamare loulou sandra', 'lamareloulou10@gmail.com', '672052482', '986545', 'PETIT BOABAB-BONBERI, Douala, Littoral, Cameroun', 'COMPLETED', 'Cash On Delivery', NULL, '2023-06-09 21:10:39', '2023-06-09 21:24:06'),
(19, 2, 'E-Com-YftPrvqfA0', 'Admin', 'lamareloulou10@gmail.com', '672052482', '986545', 'PETIT BOABAB-BONBERI, Douala, Littoral, Cameroun', 'In Progress', 'Cash On Delivery', NULL, '2023-06-24 06:15:51', '2023-07-03 08:15:57'),
(21, 2, 'E-Com-fD37SF0say', 'Monsieur Gatie', 'gatiefk@gmail.com', '672052482', '986545', 'PETIT BOABAB-BONBERI, Douala, Littoral, Cameroun', 'PENDING', 'Cash On Delivery', NULL, '2023-06-24 09:38:41', '2024-01-23 14:16:34'),
(22, 6, 'E-Com-AZPYXum4PG', 'Sime mbacob', 'sime.appolos@icloud.com', '671817484', '123456', 'Yaounde', 'In Progress', 'Cash On Delivery', NULL, '2023-06-30 02:16:16', '2023-06-30 02:16:16'),
(23, 6, 'E-Com-VhcaLvR86N', 'Sime mbacob', 'sime.appolos@icloud.com', '671817484', '123456', 'Yaounde', 'COMPLETED', 'Cash On Delivery', NULL, '2023-06-30 02:27:32', '2023-07-02 18:39:48'),
(24, 6, 'E-Com-XzCbBpl61a', 'Sime mbacob', 'sime.appolos@icloud.com', '671817484', '123456', 'Yaounde', 'COMPLETED', 'Cash On Delivery', NULL, '2023-09-01 08:36:42', '2023-09-05 08:33:26'),
(25, 6, 'E-Com-RNwEuPUJPX', 'Sime mbacob', 'sime.appolos@icloud.com', '671817484', '123456', 'Yaounde', 'In Progress', 'Cash On Delivery', NULL, '2023-09-05 09:23:14', '2023-09-05 09:23:14'),
(26, 8, 'E-Com-X3qKauqRPK', 'Donald', 'simembacob@gmail.com', '676161474', '784561', 'Bangangte Rue 2045 Pont Cassé', 'COMPLETED', 'Cash On Delivery', NULL, '2023-09-05 09:51:45', '2023-09-05 12:30:06'),
(27, 6, 'E-Com-eCCLvPlcTp', 'Sime mbacob', 'sime.appolos@icloud.com', '671817484', '123456', 'Yaounde', 'COMPLETED', 'Cash On Delivery', NULL, '2024-10-17 17:55:48', '2024-10-17 17:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(22, 17, 23, NULL, 3, 7000, '2023-06-09 20:46:43', '2023-06-09 20:46:43'),
(23, 17, 26, NULL, 2, 4000, '2023-06-09 20:46:43', '2023-06-09 20:46:43'),
(24, 18, 24, NULL, 2, 7500, '2023-06-09 21:10:39', '2023-06-09 21:10:39'),
(25, 19, 22, NULL, 2, 3500, '2023-06-24 06:15:51', '2023-06-24 06:15:51'),
(27, 21, 21, NULL, 2, 3500, '2023-06-24 09:38:41', '2023-06-24 09:38:41'),
(28, 22, 35, NULL, 3, 25000, '2023-06-30 02:16:16', '2023-06-30 02:16:16'),
(29, 23, 29, NULL, 1, 100000, '2023-06-30 02:27:32', '2023-06-30 02:27:32'),
(30, 24, 35, NULL, 1, 25000, '2023-09-01 08:36:42', '2023-09-01 08:36:42'),
(31, 25, 28, NULL, 1, 18500, '2023-09-05 09:23:14', '2023-09-05 09:23:14'),
(32, 26, 34, NULL, 1, 125000, '2023-09-05 09:51:45', '2023-09-05 09:51:45'),
(33, 27, 28, NULL, 1, 18500, '2024-10-17 17:55:48', '2024-10-17 17:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('Jenny@gmail.com', '$2y$10$WA6Z5kJJX19mWEUtDvngc.5OJ96oTI029pIfX6n6zrjhsJCb7r9bS', '2023-07-02 18:44:28'),
('sime.appolos@icloud.com', '$2y$10$aSVmiUDhjkRbAcbxqjyhcOA5dZWBGnP4t3vEEb4TGOuE6u4xsgWmS', '2023-07-08 13:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not-trending,1=trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=featured,0=not-featured\r\n',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(21, 8, 'Souris optique Filaire Lenovo M120 Pro Fashion Office (noir) LENOVO', 'souris-optique-filaire-lenovo-m120-pro-fashion-office-noir-lenovo', 'Lenovo', '<p> Lenovo Essential - Souris - droitiers et gauchers - optique - 3 boutons - filaire - USB - noir</p>\r\n<p>La souris USB Lenovo Essential est plus qu\'une souris ordinaire. Elle est équipée d\'une connexion plug-and-play au PC par câble USB. La souris ergonomique de taille normale offre une prise agréable pour un confort durable. Son capteur optique à haute résolution de 1600 dpi lui confère une grande fluidité de passage d\'une fenêtre à l\'autre.</p>', 'La souris Lenovo est un périphérique d\'entrée conçu par la société Lenovo, un fabricant renommé d\'ordinateurs et d\'accessoires informatiques. Les souris Lenovo sont réputées pour leur qualité de construction, leur ergonomie et leur performance.\r\n<p>Du point de vue du design, les souris Lenovo arborent généralement un aspect élégant et moderne, avec des lignes épurées et une finition soignée. Elles sont disponibles dans différentes tailles et formes pour s\'adapter aux préférences et aux besoins des utilisateurs. Les souris Lenovo utilisent une connectivité filaire ou sans fil, offrant ainsi une flexibilité d\'utilisation. Les modèles sans fil se connectent généralement à l\'ordinateur via une clé USB ou utilisent la technologie Bluetooth pour une connexion sans fil directe.</p>\r\n\r\n <ul> <h3>PRINCIPALES CARACTÉRISTIQUES </h3>\r\n        <li>Type d’interface : USB.</li> \r\n        <li>Utilisation : pour ordinateur de bureau, ordinateur portable, à la maison ou au bureau. </li> \r\n        <li>Nombres de boutons : 2.</li> \r\n        <li>Méthode de suivi : optique.</li> \r\n        <li>Type : filaire.</li> \r\n        <li> Style : mini.</li> \r\n        <li>Orientation de la main : ambidextre.</li> \r\n        <li>Résolution optique : 1 000 dpi.</li> \r\n    </ul>', 5000, 3500, 46, 1, 1, 0, 'Souris optique Filaire Lenovo M120 Pro Fashion Office (noir) LENOVO', 'Souris optique Filaire Lenovo M120 Pro Fashion Office (noir) LENOVO', 'Souris optique Filaire Lenovo M120 Pro Fashion Office (noir) LENOVO', '2023-06-07 22:52:14', '2023-06-24 09:38:41'),
(22, 8, 'Souris optique Filaire Logitech M90 LOGITECH', 'souris-optique-filaire-logitech-m90-logitech', 'LOGITECH', '<p>Avec la souris Logitech Mouse M90, allez à l\'essentiel en matière de confort et de fiabilité. Fabriquée par Logitech, le spécialiste des souris, cette souris bénéficie de toute l\'expertise d\'un fabricant ayant produit plus d\'un milliard de souris. De conception filaire, il vous suffit de connecter le câble à un port USB pour pouvoir l\'utiliser quant à sa forme de taille standard, adaptée à la main droite comme à la main gauche, permet de positionner votre main confortablement, alors que le suivi optique haute définition (1 000 dpi) vous garantit un contrôle réactif et fluide du pointeur, permettant un suivi précis et une sélection de texte aisée.</p>', '<p>La souris optique filaire Logitech M90 est un périphérique d\'entrée de base proposé par Logitech, un fabricant bien connu d\'accessoires informatiques. Elle est conçue pour offrir une utilisation simple et efficace avec une précision optique.\r\n\r\nDu point de vue du design, la souris Logitech M90 adopte une forme classique et ergonomique, qui convient aussi bien aux droitiers qu\'aux gauchers. Elle dispose d\'une coque en plastique robuste et d\'une finition mate, offrant une prise en main confortable.\r\n\r\nLa souris Logitech M90 est une souris filaire, ce qui signifie qu\'elle se connecte à l\'ordinateur via un câble USB intégré. Cette connexion filaire garantit une réactivité instantanée et élimine le besoin de batteries ou de rechargement.</p>\r\n<p>Suivi optique haute définition\r\nConçue pour satisfaire les mains droites et gauche, la Logitech Mouse M90 restera donc toujours confortable, même après des heures d\'utilisation. De plus, grâce au suivi optique haute définition, vous bénéficiez d\'un contrôle réactif et fluide du pointeur de 1000 dpi.\r\n\r\nFacile à installer et à utiliser, il suffit de connecter le câble à un port USB pour utiliser la M90, pas besoin de logiciel à installer !</p>\r\n   <ul> <h3>PRINCIPALES CARACTÉRISTIQUES </h3>\r\n        <li>Souris filaire optique de 1 000 dpi</li> \r\n        <li>Un suivi précis</li> \r\n        <li>Nombres de boutons : 2.</li> \r\n        <li>Compatible Windows 7, 8, 10, 11</li> \r\n</ul>', 5500, 3500, 58, 1, 0, 0, 'La souris optique filaire Logitech M90', 'La souris optique filaire Logitech M90', 'La souris optique filaire Logitech M90', '2023-06-07 23:07:02', '2023-06-24 06:15:51'),
(23, 8, 'Souris optique sans fil Logitech M170 LOGITECH', 'souris-optique-sans-fil-logitech-m170-logitech', 'LOGITECH', 'Votre souris M170 est utilisable à tout moment. Branchez simplement le récepteur dans le port USB de votre dispositif et le tour est joué. La taille compacte et le contrôle fluide du curseur en font la souris idéale pour les espaces de travail limités et les bureaux encombrés. Profitez de l’univers du sans fil!', '<p> Votre souris M170 est utilisable à tout moment. Branchez simplement le récepteur dans le port USB de votre dispositif et le tour est joué. La taille compacte et le contrôle fluide du curseur en font la souris idéale pour les espaces de travail limités et les bureaux encombrés. Profitez de l’univers du sans fil!</p>\r\n\r\n    <p>\r\n        <h3>POUR TOUTES LES MAINS, À TOUT MOMENT</h3>\r\n    La souris M170 sans fil compacte est conçue pour les gauchers comme les droitiers, tenant facilement dans votre sacoche d\'ordinateur portable, pour que vous puissiez travailler n’importe où.\r\n    </p>\r\n    \r\n    <p>\r\n       <h3> SANS FIL PRÊTE À L\'EMPLOI</h3>\r\n    Connectez-vous en 3 secondes8Testé par Logitech auprès de 50 personnes en Suisse (2022) et obtenez jusqu\'à 10 mètres9La portée sans fil peut varier en fonction de l\'utilisateur, de l\'environnement et des conditions informatiques de liberté sans fil avec un récepteur USB puissant et fiable. finis les délais et les interférences. La souris M170 est compatible avec Windows, macOS, Chrome OS et Linux et fonctionne instantanément lorsque vous branchez le récepteur USB sur votre ordinateur ou ordinateur portable.\r\n    </p>\r\n    \r\n    <p>   <h3>Navigation facile, contrôle fluide</h3>\r\n    Navigation facile grâce au défilement par paliers contrôlé et au suivi optique. Le capteur optique vous confère un contrôle du curseur fluide et précis sur quasiment n\'importe quelle surface. Cela garantit des mouvements précis de la souris sans erreurs de clic ennuyeuses.\r\n    </p>\r\n    <p>   <h3>UNE QUALITÉ FIABLE</h3>\r\n        La souris est conçue selon les mêmes normes de qualité élevées qui ont fait de Logitech le leader mondial des souris et des claviers10*Basé sur des données indépendantes sur les ventes au détail en 2022 sur les principaux marchés, tels que: BR, CA, CN, FR, DE, ID, KR, SE, TR, UK, US. Durable et fiable, la souris M170 peut fonctionner jusqu’à 12 mois11La longévité des piles est susceptible de varier en fonction de l\'environnement et du mode d\'utilisation. sans changer les piles grâce à un bouton Marche/Arrêt et un mode d\'économie d\'énergie de mise en veille automatique.\r\n    </p>\r\n    \r\n   \r\n    \r\n    <P><h3>MIEUX QU\'UN PAVÉ TACTILE</h3>\r\n    L’utilisation d’une souris est plus ergonomique qu’un pavé tactile12Étude Logitech Ergonomic Lab avec 23 participants (oct 2019) avec deux souris standard Logitech et deux pavés tactiles intégrés standard. La forme compacte et la fonctionnalité sans fil vous permettent de travailler confortablement, à la maison, au bureau, n’importe où.\r\n    </p>\r\n\r\n    <ul> <h3>Caractéristiques générales</h3>\r\n        <li>Capteur : Optique</li>\r\n        <li>Technologie : Sans fil</li>\r\n        <li>Utilisation : Bureautique / Professionnelle</li>\r\n        <li>Sensibilité max : 1000 dpi</li>\r\n        <li>Coloris : Noir</li>\r\n        <li>Alimentation : 1 Pile AA</li>\r\n        <li>Forme : Ergonomique</li>\r\n        <li>Série : Série M</li>\r\n        <li>Distance de reception : 10 mètres</li>\r\n        <li>Autonomie : 18 Mois</li>\r\n        <li>Utilisateur : Droitier</li>\r\n        <li>Poids ajustable : Non</li>\r\n        <li>Souris tactile : Non</li>\r\n        <li>Et en plus : Compatible Mac</li>\r\n\r\n    </ul>', 8500, 7000, 42, 1, 1, 0, 'Souris optique sans fil Logitech M170 LOGITECH', 'Souris optique sans fil Logitech M170 LOGITECH', 'Souris optique sans fil Logitech M170 LOGITECH', '2023-06-07 23:19:46', '2023-06-09 20:46:43'),
(24, 8, 'Souris optique sans fil Logitech M220 LOGITECH', 'souris-optique-sans-fil-logitech-m220-logitech', 'LOGITECH', '<p>Logitech M220 Silent Souris Sans Fil, 2.4 GHz avec Récepteur USB, Résolution Capteur 1000 PPP, Pile 18 Mois, Ambidextre, Compatible avec PC, Mac, Ordinateur Portable - Gris.</p>', '<p> \r\n    Logitech M220 Silent Souris Sans Fil, 2.4 GHz avec Récepteur USB, Résolution Capteur 1000 PPP, Pile 18 Mois, Ambidextre, Compatible avec PC, Mac, Ordinateur Portable - Gris.\r\n\r\n    Oubliez les bruits de clic qui vous dérangent. La souris M220 réduit le bruit de 90% 4Comparaison sonore entre les souris Logitech M220 et Logitech M170. Niveau de dBA du clic gauche calculé par un laboratoire indépendant à 1 m. du bruit, créant un environnement plus productif et silencieux pour vous et les personnes autour de vous. La taille compacte et le contrôle fluide du curseur en font la souris idéale pour les espaces de travail limités et les bureaux encombrés.\r\n   </p>\r\n\r\n    <p>\r\n        <h3>MOINS DE BRUIT, PLUS DE CONCENTRATION</h3>\r\n        Concentrez-vous sur votre travail et éliminez les bruits qui vous distraient. La technologie SilentTouch de Logitech réduit de 90%5Comparaison des niveaux sonores entre les souris Logitech M220 et Logitech M170. Niveau de dBA du clic gauche calculé par un laboratoire indépendant à 1 m. du bruit des clics, tout en garantissant des performances optimales de la souris. Cela signifie que vous ressentez chaque clic mais n’entendez pratiquement rien.</p>\r\n    \r\n    <p>\r\n       <h3> FORME CONFORTABLE ET COMPACTE</h3>\r\n       Restez productif plus longtemps grâce à sa forme confortable et profilée qui épouse la courbe naturelle de la main. Compacte et sans fil, la souris rentre facilement avec votre ordinateur portable dans un sac, pour les transporter n’importe où. La souris M220 est conçue pour être aussi confortable pour les droitiers que les gauchers.</p>\r\n    \r\n    <p>   <h3>NAVIGATION FACILE, CONTRÔLE DE PRÉCISION</h3>\r\n        Naviguez en toute simplicité grâce au défilement par paliers. Fini les clics ratés: le capteur optique vous permet un suivi sur la plupart des surfaces grâce à un contrôle du curseur fluide et précis.</p>\r\n    <p>   <h3>UNE QUALITÉ FIABLE</h3>\r\n        Cette souris est conçue dans le respect des normes de haute qualité et de fiabilité qui ont fait de Logitech le leader mondial des souris et des claviers6D\'après des données de ventes agrégées (par unités) de souris et de claviers Logitech recueillies dans les principaux marchés du monde, y compris le Canada, la Chine, la France, l\'Allemagne, l\'Indonésie, la République de Corée, la Fédération de Russie, la Suède, Taïwan, la Turquie, le Royaume-Uni, les États-Unis (entre juillet 2019 et juillet 2020). Canal de vente au détail uniquement.. Durable et fiable, la souris M220 peut fonctionner pendant une durée de 18 mois 7La longévité des piles est susceptible de varier en fonction de l\'environnement et du mode d\'utilisation. sans que vous ayez à changer les piles grâce à un bouton Marche/Arrêt et un mode d\'économie d\'énergie de mise en veille automatique.</p>\r\n    \r\n   \r\n    \r\n    <P><h3>SIMPLICITÉ DU PRÊT À L’EMPLOI</h3>\r\n        La souris M220 est compatible avec Windows®, macOS, Chrome OS™ and Linux® dès que vous branchez le récepteur USB sur votre ordinateur de bureau ou votre ordinateur portable. Le récepteur offre également une connexion fiable et solide jusqu’à une distance de 10 mètres.8La portée du sans fil peut varier en fonction de l\'utilisateur, de l\'environnement et de l’utilisation.</p>\r\n\r\n    <ul> <h3>Caractéristiques générales</h3>\r\n        <li>Capteur : Optique</li>\r\n        <li>Technologie : Sans fil</li>\r\n        <li>Utilisation : Bureautique / Professionnelle</li>\r\n        <li>Sensibilité max : 1000 dpi</li>\r\n        <li>Coloris : Noir</li>\r\n        <li>Alimentation : 1 Pile AA</li>\r\n        <li>Forme : Ergonomique</li>\r\n        <li>Série : Série M</li>\r\n        <li>Distance de reception : 10 mètres</li>\r\n        <li>Autonomie : 18 Mois</li>\r\n        <li>Utilisateur : Droitier</li>\r\n        <li>Poids ajustable : Non</li>\r\n        <li>Souris tactile : Non</li>\r\n        <li>Et en plus : Compatible Mac</li>\r\n\r\n    </ul>', 8000, 7500, 36, 1, 0, 0, 'Souris optique sans fil Logitech M220 LOGITECH', 'Souris optique sans fil Logitech M220 LOGITECH', 'Souris optique sans fil Logitech M220 LOGITECH', '2023-06-07 23:31:02', '2023-06-09 21:10:39'),
(25, 8, 'Souris optique sans fil Logitech M280', 'souris-optique-sans-fil-logitech-m280', 'LOGITECH', 'La souris M280 vous permet de mener à bien vos activités quotidiennes avec un tout nouveau degré de confort. La poignée incurvée en caoutchouc souple s\'adapte naturellement à votre main tandis que vous effectuez des déplacements et des défilements avec une excellente précision. L’autonomie longue durée, la compatibilité étendue et la forte connexion sans fil garantissent une grande fiabilité et une grande facilité d\'utilisation.', '<p> \r\n    La souris M280 vous permet de mener à bien vos activités quotidiennes avec un tout nouveau degré de confort. La poignée incurvée en caoutchouc souple s\'adapte naturellement à votre main tandis que vous effectuez des déplacements et des défilements avec une excellente précision. L’autonomie longue durée, la compatibilité étendue et la forte connexion sans fil garantissent une grande fiabilité et une grande facilité d\'utilisation.\r\n\r\n</p>\r\n\r\n    <p>\r\n        <h3>CONFORT TOUT AU LONG DE LA JOURNÉE</h3>\r\n        La souris M280 est le résultat de l\'expertise et de l\'approche innovante de Logitech, qui conçoit des solutions confortables depuis plus de 25 ans. Sa forme asymétrique est conçue avec méticulosité pour guider votre main droite dans une position naturelle, tandis que la surface en caoutchouc souple aux diagrammes distinctifs améliore la sensation tactile. Tout cela vous permet de travailler ou d\'étudier confortablement pendant des heures.\r\n    </p>\r\n    \r\n    <p>\r\n       <h3> NAVIGATION FACILE, CONTRÔLE DE PRÉCISION</h3>\r\n       Suivi et défilement de haute précision. La souris M280 est dotée d’une roulette de défilement en caoutchouc à la sensation tactile qui offre grande contrôle de défilement par paliers. Le suivi de haute précision Logitech offre un contrôle du curseur de haut niveau pour une navigation optimale sur pratiquement toutes les surfaces.</p>\r\n    \r\n    <p>   <h3>La simplicité du prêt à l\'emploi</h3>\r\n        Installez votre souris M280 en un claquement de doigt. Branchez simplement le récepteur USB sur votre ordinateur ou votre ordinateur portable et mettez-vous au travail sans attendre. Le récepteur offre une connexion fiable, solide et sans accroc jusqu’à 10 mètres\r\n    </p>\r\n    <p>   <h3>UNE QUALITÉ FIABLE</h3>\r\n        Cette souris est conçue dans le respect des normes de haute qualité et de fiabilité qui ont fait de Logitech le leader mondial des souris et des claviers7D\'après des données de ventes indépendantes agrégées (par unités) de souris et de claviers Logitech recueillies dans les principaux marchés du monde, y compris le Canada, la Chine, la France, l\'Allemagne, l\'Indonésie, la République de Corée, la Fédération de Russie, la Suède, Taïwan, la Turquie, le Royaume-Uni, les États-Unis (entre juillet 2019 et juillet 2020). Canal de vente au détail uniquement.. Durable et fiable, la souris M280 peut fonctionner pendant une durée de 18 mois8La longévité des piles est susceptible de varier en fonction de l\'environnement et du mode d\'utilisation. sans que vous ayez à changer les piles grâce à un bouton Marche/Arrêt et un mode d\'économie d\'énergie de mise en veille automatique.\r\n    </p>\r\n    \r\n   \r\n    \r\n    <P><h3>COMPATIBILITÉ ÉTENDUE</h3>\r\n        La souris M280 fonctionne parfaitement sur la plupart des systèmes d’exploitation, dont Windows, macOS, et Linux. De plus, elle est certifiée Works With Chromebook produit.\r\n    </p>\r\n\r\n    <ul> <h3>Caractéristiques générales</h3>\r\n        <li>Capteur : Optique</li>\r\n        <li>Technologie : Sans fil</li>\r\n        <li>Utilisation : Bureautique / Professionnelle</li>\r\n        <li>Sensibilité max : 1000 dpi</li>\r\n        <li>Coloris : Noir</li>\r\n        <li>Alimentation : 1 Pile AA</li>\r\n        <li>Forme : Ergonomique</li>\r\n        <li>Série : Série M</li>\r\n        <li>Distance de reception : 10 mètres</li>\r\n        <li>Autonomie : 18 Mois</li>\r\n        <li>Utilisateur : Droitier</li>\r\n        <li>Poids ajustable : Non</li>\r\n        <li>Souris tactile : Non</li>\r\n        <li>Et en plus : Compatible Mac</li>\r\n\r\n    </ul>', 10000, 8500, 17, 1, 1, 0, 'Souris optique sans fil Logitech M280', 'Souris optique sans fil Logitech M280', 'Souris optique sans fil Logitech M280', '2023-06-07 23:42:28', '2023-06-09 20:01:58'),
(26, 8, 'Clavier compact USB (AZERTY, Français)', 'clavier-compact-usb-azerty-francais', 'COMPACT', '<p>Un clavier compact et robuste</p>\r\n\r\n<p>Compact et robuste ce clavier compact USB vous apportera une solution fiable et à moindre coûts pour les utilisations nécessitant un encombrement minimum.</p>', '<p>Un clavier compact et robuste</p>\r\n\r\n<p>\r\n    Compact et robuste ce clavier compact USB vous apportera une solution fiable et à moindre coûts pour les utilisations nécessitant un encombrement minimum.\r\n\r\n</p>\r\n<ul>\r\n    <h3>Caractéristiques principales :</h3>\r\n    <li>Format Compact</li>\r\n    <li>Norme AZERTY, Français</li>\r\n    <li>Interface de connexion filaire USB</li>\r\n    <li>83 touches</li>\r\n    <li>Configuration Plug & Play permettant une mise en service simplifiée, sans installation de logiciel</li>\r\n    <li></li>\r\n</ul>', 5000, 4000, 10, 0, 0, 0, 'Clavier compact USB (AZERTY, Français)', 'Clavier compact USB (AZERTY, Français)', 'Clavier compact USB (AZERTY, Français)', '2023-06-08 00:00:58', '2023-06-09 20:46:43'),
(27, 8, 'Clavier ROBOT DELL', 'clavier-robot-dell', 'DELL', '<p>Un clavier DELL et robuste</p>\r\n\r\n<p>\r\n    Le Clavier ROBOT DELL est de taille standard à touches caoutchoutées réactives garantissant le confort de saisie en milieu professionnel, estudiantin et familial.\r\n\r\n</p>', '<p>Un clavier DELL et robuste</p>\r\n\r\n<p>\r\n    Le Clavier ROBOT DELL est de taille standard à touches caoutchoutées réactives garantissant le confort de saisie en milieu professionnel, estudiantin et familial.\r\n\r\n</p>\r\n<ul>\r\n    <h3>Caractéristiques principales :</h3>\r\n    <li>Marque : Dell d\'origine</li>\r\n    <li>Couleur : Noir</li>\r\n    <li>Langage : Français AZERTY</li>\r\n    <li>Interface : USB</li>\r\n    <li>Pavé Numérique : OUI</li>\r\n</ul>', 7000, 6000, 10, 1, 0, 0, 'Clavier ROBOT DELL', 'Clavier ROBOT DELL', 'Clavier ROBOT DELL', '2023-06-08 00:13:26', '2023-06-08 00:15:28'),
(28, 8, 'Clavier HP Pavilion DV6000 series HP', 'clavier-hp-pavilion-dv6000-series-hp', 'HP', 'Clavier pour portable HP Pavilion DV6000, DV6100, DV6200, DV6300, DV6400, DV6500, DV6600 Series.', '<p>Clavier pour portable HP Pavilion DV6000, DV6100, DV6200, DV6300, DV6400, DV6500, DV6600 Series.</p>\r\n<h3>Comment démonter un clavier ?</h3>\r\n<p>1• Eventuellement : vous devez au préalable dévisser votre clavier par le dessous du portable. Sur certains modèles de chez HP ou Compaq voire d\'autres, vous avez un logo clavier aux emplacements à dévisser. Mais aujourd\'hui ce n\'est plus souvent le cas : les claviers de la majorité des portables sont de moins en moins fixés par des vis. En effet, un simple \"soulèvement\" du clavier est nécessaire en plaçant les sticks dans les encoches.</p>\r\n<p>2• Ensuite munissez-vous d\'un ou plusieurs sticks : vous devez les placer dans les encoches qui permettent de déloger le clavier. Un simple mouvement de levier tour à tour sur chaque stick suffira à démonter le clavier. Un jeu d\'enfant !</p>\r\n<p>3• Débranchez la nappe de connexion du clavier et rebranchez le nouveau clavier. Appuyez légèrement sur les emplacements des encoches pour fixer le nouveau clavier !</p>\r\n<h3>Conseils</h3>\r\n<ol><li>Débranchez votre PC électriquement et retirer la batterie avant toute intervention.</li>\r\n<li> Certains modèles de claviers nécessitent 4 à 5 sticks, d\'autres seulement une paire. Vérifiez ce détail avant de passer commande.</li>\r\n <li> Aidez-vous de Google : des vidéos sur Youtube et des tutoriels de démontage circulent sur le net pour les modèles de PC les plus vendus.</li>\r\n</ol>\r\n<ul><li> Tous nos claviers sont vendus neufs et sous garantie de 1 mois.</li>\r\n<li>En cas de doute sur la compatibilité d\'un clavier, contactez un de nos conseillers en ligne pour une réponse rapide assurée !</li>\r\n</ul>', 20000, 18500, 8, 1, 1, 0, 'Clavier HP Pavilion DV6000 series HP', 'Clavier HP Pavilion DV6000 series HP', 'Clavier HP Pavilion DV6000 series HP', '2023-06-11 09:26:54', '2024-10-17 17:55:49'),
(29, 9, 'Dell 23.8\" LED - P2418HZ · Reconditionné', 'dell-238-led-p2418hz-reconditionne', 'DELL', '<h4> 1920 x 1080 pixels - 6 ms - Format large 16/9 - Dalle IPS - Pivot - DisplayPort - HDMI - Hub USB - Webcam - Noir</h4>\r\n<p>\r\nDell 23.8\" LED - P2418HZ · Reconditionné 1920 x 1080 pixels - 6 ms - Format large 16/9 - Dalle IPS - Pivot - DisplayPort - HDMI - Hub USB - Webcam - Noir</p>\r\n \r\n<h4>Ecran PC reconditionné</h4>\r\n<p>Le moniteur Dell P2418HZ offre de sérieuses qualités pour vous accompagner parfaitement dans vos besoins professionnels. En plus d\'une résolution Full HD, ce modèle 23.8 pouces se pare d\'une connectique complète avec port VGA, HDMI et DisplayPort, d\'une Webcam et d\'un hub USB 3.0.</p>', '<h3>Un écran Full HD avec Webcam adapté à vos besoins</h3>\r\n<p>Le moniteur Dell P2418HZ offre de sérieuses qualités pour vous accompagner parfaitement dans vos besoins professionnels. En plus d\'une résolution Full HD, ce modèle 23.8 pouces se pare d\'une connectique complète avec port VGA, HDMI et DisplayPort, d\'un design ergonomique, d\'une webcam et d\'un hub USB 3.0. Profitez de bords-fins pour une visibilité optimale et d\'un confort oculaire supérieur pour des heures d\'utilisation en toute sérénité.</p>\r\n<h3>DALLE IPS FULL HD</h3>\r\n<p>Placé au coeur de votre environnement professionnel, le moniteur Dell P2418HZ démontrera toutes ses qualités. Ce modèle propose une dalle IPS de 23.8 pouces Full HD avec des couleurs lumineuses et des angles de vision larges.</p>\r\n\r\n<p>La résolution Full HD garantit une netteté d’écran exceptionnelle. L’affichage grand angle de 178°/178° offre des vues supérieures et des couleurs homogènes, idéales pour la vidéoconférence.</p>\r\n<h3>UN ENVIRONNEMENT DE TRAVAIL MAÎTRISÉ</h3>\r\n<p>Pour répondre à vos différents besoins au quotidien, le moniteur P2418HZ est équipé d\'un design ergonomique. Réglez la hauteur sur 125 mm, contrôlez l\'inclinaison et la rotation horizontale et basculez votre écran Dell en mode portrait.</p>\r\n\r\n<p>Connectez-vous facilement à plusieurs appareils grâce à des options de connectivité polyvalentes, notamment VGA, DP, HDMI, USB 3.0 et une prise jack combinée pour casque et microphone.</p>\r\n\r\n<p>Passez rapidement des appels Skype via des boutons d’affichage sur l’écran, faciles d’accès. Travaillez dans plusieurs applications tout en restant organisé grâce à la fonctionnalité Dell Easy Arrange.</p>\r\n<h3>OUTIL DE COLLABORATION</h3>\r\n<p> \r\nGrâce à la caméra à capteur infrarouge Full HD de 2.1 mégapixels, vous pouvez participer à des réunions et ouvrir une session sur votre appareil grâce à la fonctionnalité de reconnaissance faciale sécurisée de Windows Hello. L’obturateur de la caméra offre une confidentialité supplémentaire lorsque celle-ci n’est pas utilisée.</p>\r\n\r\n<p>Un microphone à atténuation de bruit et deux haut-parleurs intégrés de 5 W assurent une qualité sonore exceptionnelle, pour ne manquer aucun détail lors des réunions.</p>\r\n\r\n<p>Connectez-vous à vos appareils Windows 10, applications et sites Web grâce à la fonctionnalité de reconnaissance faciale. Les capteurs biométriques s’activent et analysent votre visage, éliminant les risques de piratage et assurant une sécurité renforcée.</p>\r\n<h3>CARACTÉRISTIQUES PRINCIPALES :</h3>\r\n<ul><li>Ecran de 23.8 pouces antireflets avec résolution Full HD (1920 x 1080)</li>\r\n<li>Dalle IPS : couleurs lumineuses et angles de vision larges (178°)</li>\r\n<li>Temps de réponse de 6 ms</li>\r\n<li>Design ergonomique avec réglage en hauteur sur 125 mm, pivot sur 90°, inclinaison et rotation horizontale</li>\r\n<li>Double microphone numérique omnidirectionnel</li>\r\n<li>Caméra infrarouge à capteur Full HD 2,1 mégapixels</li>\r\n<li>1 connecteur HDMI , 1 connecteur DisplayPort, 1 connecteur VGA</li>\r\n<li>Hub USB avec 4 ports USB 3.0</li>', 120000, 100000, 9, 1, 0, 0, 'Dell 23.8\" LED - P2418HZ · Reconditionné', 'Dell 23.8\" LED - P2418HZ · Reconditionné', 'Dell 23.8\" LED - P2418HZ · Reconditionné', '2023-06-11 09:59:51', '2023-06-30 02:27:32'),
(30, 9, 'Vidéoprojecteur Acer X123 ACER', 'videoprojecteur-acer-x123-acer', 'ACER', '<p>Des images plus grandes et plus éclatantes au bureau ou chez vous; projetez en trÃ¨s grand format (jusqu\'Ã  300 pouces ou 762 cm) avec un milliard de couleurs et une netteté incomparable. Avec le Vidéoprojecteur Acer X123, ...</p>', '<p>Des images plus grandes et plus éclatantes au bureau ou chez vous; projetez en très grand format (jusqu\'à 300 pouces ou 762 cm) avec un milliard de couleurs et une netteté incomparable. Avec le Vidéoprojecteur Acer X123, préparez-vous à une expérience exceptionnelle:</p>\r\n<ul><li> Affichage vivant</li>\r\n<li>Facilité d’utilisation</li>\r\n<li>Souplesse d’installation</li>\r\n<li> Respect de l’environnement</li></ul>\r\n<h4>Bloc optique scellé</h4>\r\n<p>Grâce à sa conception avec bloc optique scellé, le projecteur est à l\'abri de l\'accumulation de poussière et même de fumée qui risquerait d\'affecter notablement les performances optiques, avec comme conséquences une perte de luminosité et une décoloration des images affichées.</p>\r\n\r\n<h4>Technologie Acer ColorBoost II</h4>\r\n<p>ColorBoost II+ est une avancée qui améliore les performances des couleurs en affinant la forme d’onde en fonction du spectre de la lampe et des propriétés de la roue chromatique. ColorBoost II+ (1) améliore la température de couleur naturelle pour obtenir un équilibre des couleurs optimal et (2) rehausse la luminosité des couleurs selon le contenu, en association avec Acer eView Management qui fournit différents modes de scénarios avec une forme d’onde affinée spécifiquement selon la couleur.</p>\r\n\r\n<h4>Acer ColorSafe II</h4>\r\n<p>Les vidéoprojecteurs Acer dotés de ColorSafe II sont quasiment à l’abri des risques de dégradation des couleurs tels que la teinte jaunâtre ou verdâtre que donnent parfois aux images certains projecteurs après une longue utilisation. Les projecteurs Acer bénéficient de la technologie DLP® pour assurer l’intégrité de l\'image même après une utilisation prolongée. Leur longévité et l’homogénéité de leur qualité d’image abaissent leur coût total de possession et se traduisent par d\'importantes économies.</p>\r\n<h4>Acer EcoProjection</h4>\r\n<p>Solution de gestion de l’alimentation complète et respectueuse de l’environnement, Acer EcoProjection réduit la consommation en veille jusqu\'à 90 %, la faisant chuter de 5 W à 0,5 W. La suite Acer EcoProjection suite comprend également Acer ePower Management qui permet de configurer des profils d\'économie d\'énergie personnalisés.</p>\r\n\r\n<h4>Affichage vivant</h4>\r\n<ul> <li>Acer ColorBoost II</li>\r\n<li>Acer ColorSafe II</li>\r\n<li> DLP® 3D Ready</li>\r\n<li>Résolution native SVGA (800 x 600)</li>\r\n<li>Luminosité 2800 lumens ; contraste 13.000:1</li></ul>\r\n\r\n<h4>Facilité d’utilisation</h4>\r\n<ul><li>Conception anti-poussière Acer</li>\r\n<li> Redémarrage instantané</li>\r\n<li>Rangement immédiat</li>\r\n<li>Acer SmartFormat</li>\r\n<li>Closed caption</li></ul>\r\n\r\n<h4>Souplesse d’installation</h4>\r\n<ul><li>Correction de trapèze jusqu’à 40 degrés</li></ul>\r\n\r\n<h4>Respect de l’environnement</h4>\r\n<ul><li>Technologie Acer EcoProjection</li>\r\n<li>Longévité de la lampe allant jusqu’à 7000 heures en mode ExtremeEco</li></ul>\r\n\r\n<h4>Caractéristiques:</h4>       \r\n<ul><b>Écran</b>\r\n<li>Écran integré : Non</li>\r\n<li> Connectivité</li>\r\n<li> Nombre de ports VGA (D-Sub) : 1</li>\r\n<li> Port DVI : Non</li>\r\n<li>Secteur d\'entrée d\'alimentation : Oui</li></ul>\r\n<ul><b>Système d\'objectif</b>\r\n<li>Amplitude d\'ouverture : 2.41 - 2.55</li>\r\n<li> Zoom numérique : 2 x</li></ul>\r\n<ul><b>Poids et dimensions</b>\r\n<li> Largeur : 314 mm</li>\r\n<li> Profondeur : 223 mm</li>\r\n<li> Hauteur : 93 mm</li>\r\n<li> Poids : 2500 g</li></ul>\r\n<ul><b>Gestion d\'énergie</b>\r\n<li> Source d\'énergie : AC</li>\r\n<li> Tension d\'entrée : 110 - 220 V</li></ul>\r\n<ul><b>Réseau</b>\r\n<li>Ethernet/LAN : Non</li>\r\n<li> Wifi : Non</li></ul>\r\n<ul><b>Projecteur</b>\r\n<li> Luminosité du projecteur : 2800 ANSI lumens</li>\r\n<li> Technologie de projection : DLP</li>\r\n<li> Résolution native du projecteur : SVGA (800x600)</li>\r\n<li> Taille d\'écran compatible : 23 - 300 mm</li>\r\n<li> Ratio de format d\'image : 4:3</li>\r\n<li> Taux de contraste : 13000:1</li>\r\n<li> Capacité du zoom : Auto/Manual</li>\r\n<li> Nombre de couleurs : 1.07 M</li>\r\n<li> Keystone correction, vertical : ± 40°</li>\r\n<li> Résolution (analogique maximum) : 1920 x 1200 pixels</li>\r\n<li> Synchronisation verticale (min) : 120 kHz</li>\r\n<li> Synchronisation verticale (max) : 100 kHz</li></ul>\r\n<ul><b>Vidéo</b>\r\n<li> Système de format du signal analogique : NTSC, PAL, SECAM</li>\r\n<li> Full HD : Non</li></ul>\r\n<ul><b>Support de stockage</b>\r\n<li> Lecteur de cartes mémoires intégré : Non</li></ul>\r\n<ul><b>Lampes</b>\r\n<li> Durée de vie de la lampe : 5000 h</li>\r\n<li> Durée de vie de la lampe (mode économique) : 6000 h</li></ul>\r\n<ul><b>Contenu de l\'emballage</b>\r\n<li> Contrôle à distance du portable : Oui</li>\r\n<li> Câbles inclus : AC, VGA</li>\r\n<li> Piles fournies : Oui</li>\r\n<li> Guide de démarrage rapide : Oui</li>\r\n<li> Manuel d\'utilisation : Oui</li></ul>\r\n<ul><b>Design</b>\r\n<li>Couleur : Blanc/Noir</li>\r\n<li>Elément de format : Desktop</li></ul>', 320000, 279000, 10, 0, 1, 0, 'Vidéoprojecteur Acer X123 ACER', 'Vidéoprojecteur Acer X123 ACER', 'Vidéoprojecteur Acer X123 ACER', '2023-06-11 10:31:40', '2023-06-11 12:01:13'),
(31, 10, 'Imprimante tout-en-un HP DeskJet 2320', 'imprimante-tout-en-un-hp-deskjet-2320', 'HP', '<p>Réalisez facilement vos tâches d\'impression, de numérisation et de copie quotidiennes grâce à une imprimante tout-en-un HP DeskJet simple d\'utilisation, dès sa sortie de la boîte. Faites des économies avec les cartouches d\'encre HP grande capacité en option. Gagnez aussi de l\'espace grâce à une imprimante tout-en-un adaptée à tous les espaces.</p>', '</p>Réalisez facilement vos tâches d\'impression, de numérisation et de copie quotidiennes grâce à une imprimante tout-en-un HP DeskJet simple d\'utilisation, dès sa sortie de la boîte. Faites des économies avec les cartouches d\'encre HP grande capacité en option. Gagnez aussi de l\'espace grâce à une imprimante tout-en-un adaptée à tous les espaces.</p>\r\n\r\n<p>Idéale pour les personnes qui recherchent une imprimante tout-en-un abordable et adaptée aux petites espaces.</p>\r\n\r\n<p>Simplifiez votre journée. Imprimez, numérisez et copiez facilement, et soyez plus productif dans vos tâches quotidiennes que jamais.</p>\r\n\r\n<p>Faites-en plus, dès la sortie de la boite. Évitez les tracasseries et prenez en charge vos tâches quotidiennes avec une tout-en-un simple que vous pouvez configurer rapidement et ou vous en avez besoin.</p>\r\n\r\n<p>Imprimez, numérisez et copiez les documents dont vous avez besoin en utilisant ce périphérique tout-en-un conçu pour être tout simplement abordable.</p>\r\n\r\n<h3>CARACTERISTIQUES</h3>\r\n<ul>\r\n\r\n<li>Fonctions : Impression, copie, numérisation</li>\r\n<li> Vitesse d\'impression noir : Jusqu\'à 7,5 ppm</li>\r\n<li> Vitesse d\'impression couleur : Jusqu\'à 5,5 ppm</li>\r\n<li> Nombre de cartouches d\'impression : 2 (1 cartouche noire, 1 cartouche 3-couleurs)</li>\r\n<li> Cartouches de remplacement : HP 305 cartouche d\'encre Noir (environ 120 pages); HP 305 cartouche d\'encre Trois couleurs (environ 100 pages); HP 305XL cartouche d\'encre Noir (environ 480 pages); HP 305XL cartouche d\'encre Trois couleurs (environ 330 pages)</li>\r\n<li> Fonctionnalités sans fil : Non</li>\r\n<li> Connectivité, standard : 1 port USB 2.0 haut débit</li>\r\n<li> Systèmes d\'exploitation compatibles : Windows 10, Windows 8.1, Windows 8, Windows 7; Mac OS X v10.8 Mountain Lion, OS X v10.9 Mavericks, OS X v10.10 Yosemite</li>\r\n<li> Fonction HP ePrint : Non</li>\r\n<li> Bac d\'alimentation de 60 feuilles</li>\r\n<li> Bac de sortie de 25 feuilles</li></ul>', 55000, 45000, 12, 0, 1, 0, 'Imprimante tout-en-un HP DeskJet 2320', 'Imprimante tout-en-un HP DeskJet 2320 HP', 'Imprimante tout-en-un HP DeskJet 2320', '2023-06-11 13:45:20', '2023-06-11 14:13:37'),
(32, 10, 'Imprimante HP LaserJet Pro MFP M130fw', 'imprimante-hp-laserjet-pro-mfp-m130fw', 'HP', '<h4> Imprimante multifonction laser 4-en-1 (USB 2.0/Fast Ethernet).</h4>\r\n<p>L\'imprimante multifonction HP LaserJet Pro M130fn combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité rapide (USB et Fast Ethernet), elle sera un atout de votre productivité.</p>', '<h3> Imprimante multifonction laser 4-en-1 (USB 2.0/Fast Ethernet).</h3>\r\n<p>L\'imprimante multifonction HP LaserJet Pro M130fn combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité rapide (USB et Fast Ethernet), elle sera un atout de votre productivité.</p>\r\n<h3>Une multifonction laser 4-en-1 compacte.</h3>\r\n<p>L’imprimante multifonction HP LaserJet Pro M130fn combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité rapide (USB et Fast Ethernet), elle sera un atout de votre productivité. Compacte, elle trouvera facilement sa place pour vous permettre d’imprimer, de copier, de numériser et de faxer.</p>\r\n\r\n<h3>Imprimez facilement en quelques clics </h3>\r\n<p>Travaillez en toute simplicité avec l\'imprimante multifonction LaserJet la plus petite de HP– optimisée par des toners JetIntelligence. Imprimez des documents de qualité professionnelle à partir d’une large gamme de périphériques portables, et numérisez, copiez, télécopiez tout en économisant de l’énergie grâce à une imprimante multifonction sans fil conçue pour une efficacité optimale.</p>\r\n<ul><li>Attendez moins ! Imprimez jusqu\'à 22 pages par minute avec une sortie des premières pages en 7,3 secondes seulement.</li>\r\n<li>Imprimez depuis votre iPhone et iPad avec AirPrint, qui adapte automatiquement les tâches d\'impression à la taille de papier correcte.</li>\r\n<li> Imprimez en envoyant un simple e-mail directement depuis un smartphone, une tablette ou un ordinateur portable grâce à HP ePrint.</li>\r\n<li> Envoyez des tâches depuis votre smartphone, tablette ou ordinateur vers n’importe quelle imprimante professionnelle à l’aide de Google Cloud Print 2.0.</li></ul>\r\n\r\n<h3>Caractéristiques principales :</h3>\r\n<ul><li>Tout-en-un Laser noir et blanc (4-en-1)</li>\r\n<li> Impression, copie, scan et fax</li>\r\n<li> Formats : A4 ; A5 ; A6 ; B5 ; étiquettes ; cartes postales ; enveloppes</li>\r\n<li> Port USB 2.0 haut débit (périphérique); Port réseau Fast Ethernet 10/100Base-TX intégré</li>\r\n<li> Impression mobile : Apple AirPrint; HP ePrint; Google Cloud Print 2.0; Certification Mopria</li>\r\n<li> Vitesse d\'impression : jusqu\'à 22 ppm en mode normal</li>\r\n<li> Résolution d\'impression : Jusqu’à 600 x 600 ppp, HP FastRes 1200 (qualité 1 200 ppp)</li>\r\n<li> Résolution de copie (texte noir) : jusqu\'à 600 x 400 ppp</li>\r\n<li> Vitesse de copie : jusqu\'à 22 cpm</li>\r\n<li> Recto-verso manuel</li></ul>', 200000, 185000, 15, 1, 1, 0, 'Imprimante HP LaserJet Pro MFP M130fw HP', 'Imprimante HP LaserJet Pro MFP M130fw HP', 'Imprimante HP LaserJet Pro MFP M130fw HP', '2023-06-11 14:26:08', '2023-06-11 14:28:53'),
(33, 10, 'Imprimante HP LaserJet Pro MFP M130nw', 'imprimante-hp-laserjet-pro-mfp-m130nw', 'HP', '<p>Imprimante multifonction laser 3-en-1 (USB 2.0/Fast Ethernet/Wifi)<p>\r\n\r\n<p>L\'imprimante multifonction HP LaserJet Pro M130nw combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité étendue (USB, Ethernet et sans fil), elle sera un atout de votre productivité.<p>', '<p>Imprimante multifonction laser 3-en-1 (USB 2.0/Fast Ethernet/Wifi)<p>\r\n\r\n<p>L\'imprimante multifonction HP LaserJet Pro M130nw combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité étendue (USB, Ethernet et sans fil), elle sera un atout de votre productivité.<p>\r\n<h3>Une multifonction laser sans fil simple et compacte.</h3>\r\n\r\n<p>L’imprimante multifonction HP LaserJet Pro M130nw combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité étendue (USB, Ethernet et sans fil), elle sera un atout de votre productivité. Compacte, elle trouvera facilement sa place pour vous permettre d’imprimer, de copier et de numériser.</p>\r\n\r\n<h3>Imprimez facilement depuis n\'importe où</h3>\r\n\r\n<p>Travaillez en toute simplicité avec l\'imprimante multifonction LaserJet la plus petite de HP– optimisée par des toners JetIntelligence. Imprimez des documents de qualité professionnelle à partir d’une large gamme de périphériques portables, et numérisez, copiez tout en économisant de l’énergie grâce à une imprimante multifonction sans fil conçue pour une efficacité optimale.</p>\r\n\r\n<ul><li> Imprimez, numérisez et copiez grâce à l\'imprimante multifonction LaserJet la plus petite de HP conçue pour s’adapter aux espaces réduits.</li>\r\n<li> Attendez moins ! Imprimez jusqu\'à 22 pages par minute avec une sortie des premières pages en 7,3 secondes seulement.</li>\r\n<li> Imprimez depuis votre iPhone et iPad avec AirPrint, qui adapte automatiquement les tâches d\'impression à la taille de papier correcte.</li>\r\n<li> Imprimez en envoyant un simple e-mail directement depuis un smartphone, une tablette ou un ordinateur portable grâce à HP ePrint.</li>\r\n<li> Imprimez directement à partir de votre périphérique portable vers votre imprimante Wi-Fi Direct, sans accéder au réseau d\'entreprise.</li>\r\n<li> Envoyez des tâches depuis votre smartphone, tablette ou ordinateur vers n’importe quelle imprimante professionnelle à l’aide de Google Cloud Print 2.0.</li></ul>\r\n\r\n<h3>Caractéristiques principales :</h3>\r\n<ul><li>Tout-en-un Laser noir et blanc</li>\r\n<li> Impression, copie, scan</li>\r\n<li> Formats : A4 ; A5 ; A6 ; B5 ; étiquettes ; cartes postales ; enveloppes</li>\r\n<li> Port USB 2.0 haut débit (périphérique); Port réseau Fast Ethernet 10/100Base-TX intégré; Sans fil</li>\r\n<li> Impression mobile : Apple AirPrint; HP ePrint; Google Cloud Print 2.0; Certification Mopria; Wi-Fi Direct</li>\r\n<li> Vitesse d\'impression : jusqu\'à 22 ppm en mode normal</li>\r\n<li> Résolution d\'impression : Jusqu’à 600 x 600 ppp, HP FastRes 1200 (qualité 1 200 ppp)</li>\r\n<li> Résolution de copie (texte noir) : jusqu\'à 600 x 400 ppp</li>\r\n<li> Vitesse de copie : jusqu\'à 22 cpm</li>\r\n<li> Recto-verso manuel</li></ul>', 180000, 165000, 7, 0, 1, 0, 'Imprimante HP LaserJet Pro MFP M130nw', 'Imprimante HP LaserJet Pro MFP M130nw', 'Imprimante HP LaserJet Pro MFP M130nw', '2023-06-11 16:58:33', '2023-06-11 16:58:33'),
(34, 10, 'Imprimante multifonction HP LaserJet Pro M130a', 'imprimante-multifonction-hp-laserjet-pro-m130a', 'HP', '<p>L\'imprimante multifonction HP LaserJet Pro M130a combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité USB 2.0, elle sera un atout de votre productivité.</p>', '<p> L\'imprimante multifonction HP LaserJet Pro M130a combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité USB 2.0, elle sera un atout de votre productivité.</p>\r\n\r\n<p>L’imprimante multifonction HP LaserJet Pro M130a combine vitesse, haute résolution et praticité. Avec une vitesse de 22 ppm, une résolution maximale de 1200 x 1200 dpi et une connectivité USB 2.0, elle sera un atout de votre productivité. Compacte, elle trouvera facilement sa place pour vous permettre d’imprimer, de copier et de numériser.</p>\r\n\r\n<h3>Tirez le meilleur parti de vos impressions</h3>\r\n\r\n<p>Travaillez en toute simplicité avec l\'imprimante multifonction LaserJet la plus petite de HP– optimisée par des toners JetIntelligence. Imprimez des documents de qualité professionnelle et numérisez, copiez et économisez de l’énergie grâce à une imprimante multifonction compacte conçue pour une efficacité optimale.</p>\r\n<ul><li> Imprimez, numérisez et copiez grâce à l\'imprimante multifonction LaserJet la plus petite de HP conçue pour s’adapter aux espaces réduits.</li>\r\n<li> Attendez moins ! Imprimez jusqu\'à 22 pages par minute avec une sortie des premières pages en 7,3 secondes seulement.</li>\r\n<li> Economisez l\'énergie grâce à la technologie HP Auto-On/Auto-Off.</li>\r\n<li> Raccordez cette imprimante laser HP directement à votre ordinateur via le port USB 2.0 haut débit inclus.</li></ul>\r\n\r\n<h3>Caractéristiques principales :</h3>\r\n<ul><li> Tout-en-un Laser noir et blanc</li>\r\n<li> Impression, copie, scan</li>\r\n<li> Formats : A4 ; A5 ; A6 ; B5 ; étiquettes ; cartes postales ; enveloppes</li>\r\n<li> Port USB 2.0 haut débit</li>\r\n<li> Vitesse d\'impression : jusqu\'à 22 ppm en mode normal</li>\r\n<li> Résolution d\'impression : Jusqu’à 600 x 600 ppp, HP FastRes 1200 (qualité 1 200 ppp)</li>\r\n<li> Résolution de copie (texte noir) : jusqu\'à 600 x 400 ppp</li>\r\n<li> Vitesse de copie : jusqu\'à 22 cpm</li>\r\n<li> Recto-verso manuel</li></ul>', 130000, 125000, 9, 0, 1, 0, 'Imprimante multifonction HP LaserJet Pro M130a', 'Imprimante multifonction HP LaserJet Pro M130a', 'Imprimante multifonction HP LaserJet Pro M130a', '2023-06-11 17:08:41', '2023-09-05 09:51:45'),
(35, 11, 'Clé USB KINGSTON 64 Go. PABX', 'cle-usb-kingston-64-go-pabx', 'KINGSTON', 'Une solution facile Ã  utiliser pour stocker, transporter et échanger des données entre ordinateurs et autres dispositifs.', '<h3> Transférer et sauvegarder les données</h3>\r\n<p>Une solution facile à utiliser pour stocker, transporter et échanger des données entre ordinateurs et autres dispositifs.</p>\r\n\r\n<h3>Caractéristiques principales :</h3>\r\n<ul><li>Capacité de 64 Go</li>\r\n<li>Connecteur USB 2.0</li>\r\n<li>Clé USB compatible Windows XP/Vista/7/8/10/Mac OS X 10.5+/Linux</li></ul>', 31500, 25000, 26, 1, 0, 0, 'Clé USB KINGSTON 64 Go. PABX', 'Clé USB KINGSTON 64 Go. PABX', 'Clé USB KINGSTON 64 Go. PABX', '2023-06-24 06:48:53', '2023-09-01 08:36:42'),
(36, 11, 'Clé USB IMATION 32 Go IMATION', 'cle-usb-imation-32-go-imation', 'IMATION', 'Une solution facile Ã  utiliser pour stocker, transporter et échanger des données entre ordinateurs et autres dispositifs.', '<h3> Transférer et sauvegarder les données</h3>\r\n<p>Une solution facile à utiliser pour stocker, transporter et échanger des données entre ordinateurs et autres dispositifs.<p>\r\n\r\n<h3>Caractéristiques principales :<h3>\r\n<ul><li> Capacité de 32 Go</li>\r\n<li> Connecteur USB 2.0</li>\r\n<li>Clé USB compatible Windows XP/Vista/7/8/10/Mac OS X 10.5+/Linux</li></ul>', 12500, 10000, 20, 1, 0, 0, 'Clé USB IMATION 32 Go IMATION', 'Clé USB IMATION 32 Go IMATION', 'Clé USB IMATION 32 Go IMATION', '2023-06-24 08:27:26', '2023-06-24 08:27:26'),
(37, 11, 'Clé USB SCANDISK 64 Go SCANDISK', 'cle-usb-scandisk-64-go-scandisk', 'SCANDISK', 'Une solution facile Ã  utiliser pour stocker, transporter et échanger des données entre ordinateurs et autres dispositifs.', '<h3> Transférer et sauvegarder les données</h3>\r\n<p>Une solution facile à utiliser pour stocker, transporter et échanger des données entre ordinateurs et autres dispositifs.</p>\r\n\r\n<h3>Caractéristiques principales :</h3>\r\n<ul><li>Capacité de 64 Go</li>\r\n<li> Connecteur USB 2.0</li>\r\n<li>Clé USB compatible Windows XP/Vista/7/8/10/Mac OS X 10.5+/Linux</li></ul>', 32500, 25000, 15, 0, 0, 0, 'Clé USB SCANDISK 64 Go SCANDISK', 'Clé USB SCANDISK 64 Go SCANDISK', 'Clé USB SCANDISK 64 Go SCANDISK', '2023-06-24 08:34:14', '2023-06-24 08:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(69, 21, 'uploads/products/16861819341.png', '2023-06-07 22:52:14', '2023-06-07 22:52:14'),
(70, 21, 'uploads/products/16861819342.png', '2023-06-07 22:52:14', '2023-06-07 22:52:14'),
(71, 21, 'uploads/products/16861819343.png', '2023-06-07 22:52:14', '2023-06-07 22:52:14'),
(72, 21, 'uploads/products/16861819344.png', '2023-06-07 22:52:14', '2023-06-07 22:52:14'),
(73, 22, 'uploads/products/16861828221.png', '2023-06-07 23:07:02', '2023-06-07 23:07:02'),
(74, 22, 'uploads/products/16861828222.png', '2023-06-07 23:07:02', '2023-06-07 23:07:02'),
(75, 22, 'uploads/products/16861828223.png', '2023-06-07 23:07:02', '2023-06-07 23:07:02'),
(76, 22, 'uploads/products/16861828224.png', '2023-06-07 23:07:02', '2023-06-07 23:07:02'),
(77, 22, 'uploads/products/16861828225.png', '2023-06-07 23:07:02', '2023-06-07 23:07:02'),
(79, 23, 'uploads/products/16861837461.png', '2023-06-07 23:22:26', '2023-06-07 23:22:26'),
(80, 23, 'uploads/products/16861837462.png', '2023-06-07 23:22:26', '2023-06-07 23:22:26'),
(81, 23, 'uploads/products/16861837463.png', '2023-06-07 23:22:26', '2023-06-07 23:22:26'),
(82, 23, 'uploads/products/16861837464.png', '2023-06-07 23:22:26', '2023-06-07 23:22:26'),
(84, 24, 'uploads/products/16861844201.png', '2023-06-07 23:33:40', '2023-06-07 23:33:40'),
(85, 24, 'uploads/products/16861844202.png', '2023-06-07 23:33:40', '2023-06-07 23:33:40'),
(86, 24, 'uploads/products/16861844203.png', '2023-06-07 23:33:40', '2023-06-07 23:33:40'),
(87, 24, 'uploads/products/16861844204.png', '2023-06-07 23:33:40', '2023-06-07 23:33:40'),
(88, 25, 'uploads/products/16861850871.png', '2023-06-07 23:44:47', '2023-06-07 23:44:47'),
(89, 25, 'uploads/products/16861850872.png', '2023-06-07 23:44:47', '2023-06-07 23:44:47'),
(90, 25, 'uploads/products/16861850873.png', '2023-06-07 23:44:47', '2023-06-07 23:44:47'),
(91, 25, 'uploads/products/16861850874.png', '2023-06-07 23:44:47', '2023-06-07 23:44:47'),
(92, 25, 'uploads/products/16861850875.png', '2023-06-07 23:44:47', '2023-06-07 23:44:47'),
(98, 26, 'uploads/products/16861864831.png', '2023-06-08 00:08:03', '2023-06-08 00:08:03'),
(99, 27, 'uploads/products/16861868791.png', '2023-06-08 00:14:39', '2023-06-08 00:14:39'),
(100, 27, 'uploads/products/16861868792.png', '2023-06-08 00:14:39', '2023-06-08 00:14:39'),
(101, 28, 'uploads/products/16864792141.png', '2023-06-11 09:26:54', '2023-06-11 09:26:54'),
(102, 28, 'uploads/products/16864792142.png', '2023-06-11 09:26:54', '2023-06-11 09:26:54'),
(103, 29, 'uploads/products/16864811911.png', '2023-06-11 09:59:51', '2023-06-11 09:59:51'),
(104, 29, 'uploads/products/16864811912.png', '2023-06-11 09:59:51', '2023-06-11 09:59:51'),
(105, 29, 'uploads/products/16864811913.png', '2023-06-11 09:59:51', '2023-06-11 09:59:51'),
(106, 29, 'uploads/products/16864811914.png', '2023-06-11 09:59:51', '2023-06-11 09:59:51'),
(107, 29, 'uploads/products/16864811915.png', '2023-06-11 09:59:51', '2023-06-11 09:59:51'),
(108, 30, 'uploads/products/16864831001.png', '2023-06-11 10:31:40', '2023-06-11 10:31:40'),
(109, 30, 'uploads/products/16864831002.png', '2023-06-11 10:31:40', '2023-06-11 10:31:40'),
(110, 30, 'uploads/products/16864831003.png', '2023-06-11 10:31:40', '2023-06-11 10:31:40'),
(112, 31, 'uploads/products/16864947202.png', '2023-06-11 13:45:20', '2023-06-11 13:45:20'),
(113, 31, 'uploads/products/16864947203.png', '2023-06-11 13:45:20', '2023-06-11 13:45:20'),
(114, 31, 'uploads/products/16864953061.png', '2023-06-11 13:55:06', '2023-06-11 13:55:06'),
(115, 32, 'uploads/products/16864971681.png', '2023-06-11 14:26:08', '2023-06-11 14:26:08'),
(116, 32, 'uploads/products/16864971682.png', '2023-06-11 14:26:08', '2023-06-11 14:26:08'),
(117, 32, 'uploads/products/16864971683.png', '2023-06-11 14:26:08', '2023-06-11 14:26:08'),
(118, 32, 'uploads/products/16864971684.png', '2023-06-11 14:26:08', '2023-06-11 14:26:08'),
(119, 32, 'uploads/products/16864971685.png', '2023-06-11 14:26:08', '2023-06-11 14:26:08'),
(120, 33, 'uploads/products/16865063131.png', '2023-06-11 16:58:33', '2023-06-11 16:58:33'),
(121, 33, 'uploads/products/16865063132.png', '2023-06-11 16:58:33', '2023-06-11 16:58:33'),
(122, 33, 'uploads/products/16865063133.png', '2023-06-11 16:58:33', '2023-06-11 16:58:33'),
(123, 33, 'uploads/products/16865063134.png', '2023-06-11 16:58:33', '2023-06-11 16:58:33'),
(124, 34, 'uploads/products/16865069211.png', '2023-06-11 17:08:41', '2023-06-11 17:08:41'),
(125, 34, 'uploads/products/16865069212.png', '2023-06-11 17:08:41', '2023-06-11 17:08:41'),
(126, 34, 'uploads/products/16865069213.png', '2023-06-11 17:08:41', '2023-06-11 17:08:41'),
(127, 34, 'uploads/products/16865069214.png', '2023-06-11 17:08:41', '2023-06-11 17:08:41'),
(128, 35, 'uploads/products/16875929331.png', '2023-06-24 06:48:53', '2023-06-24 06:48:53'),
(129, 36, 'uploads/products/16875988461.png', '2023-06-24 08:27:26', '2023-06-24 08:27:26'),
(130, 36, 'uploads/products/16875988462.png', '2023-06-24 08:27:26', '2023-06-24 08:27:26'),
(131, 37, 'uploads/products/16875992541.png', '2023-06-24 08:34:14', '2023-06-24 08:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'ITE E-Commerce', 'http://localhost:8000/', 'Home Page', 'ITE EXPERT SARL (Experts de l’Innovation Technologique et de l’Entrepreneuriat) est une entité qui offre des services dans le commerce général (vente et installation des matériels de sécurité.)...', 'ITE EXPERT SARL (Experts de l’Innovation Technologique et de l’Entrepreneuriat) est une entité qui offre des services dans les domaines de l’industrie, du commerce général (vente et installation des matériels de sécurité.)...', 'Centre-Equestre, Bonabéri, Douala, Littoral, Cameroon', '671817484', '621139664', 'sime.appolos@icloud.com', 'lamareloulou10@gmail.com', 'http://facebook.com', 'http://twitter.com', 'http://instagram.com', 'http://youtube.com', '2023-05-31 19:28:48', '2023-09-05 12:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '<span>Best Ecommerce Solutions </span>', 'We offer an industry-driven and succesful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/sliders/1684622190.jpg', 0, '2023-05-17 13:31:20', '2023-06-24 07:08:06'),
(2, 'E-commerce', 'We offer an industry-driven and succesful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/sliders/1684620775.jpg', 0, '2023-05-17 20:45:38', '2023-06-24 07:04:51'),
(3, 'Produits de très haute qualité', 'We offer an industry-driven and succesful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/sliders/1684622216.jpg', 0, '2023-05-17 20:59:29', '2023-06-24 07:04:22'),
(5, '<span>Vente de produits électroniques </span>', 'We offer an industry-driven and succesful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/sliders/1684621166.jpg', 0, '2023-05-18 07:42:15', '2023-06-24 07:03:19'),
(6, '<span>Best Ecommerce Solutions  </span> Faites vos acats en toute securite Sales', 'We offer an industry-driven and succesful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/sliders/1684693655.jpg', 0, '2023-05-21 17:11:47', '2023-06-24 07:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Gw8Y2iIAvSiTfMgeaARXLuBx6XZmckv7IOuZmtCkK7vupBbB.OeHi', 'wPjxSVOwMJ9a1cNPgKfGKOurHGBYEER1LRz50qK5cRasMSWVqNnZyj8ewKHf', '2023-04-28 22:32:31', '2023-06-03 17:27:30', 1),
(3, 'Jenny', 'Jenny@gmail.com', NULL, '$2y$10$lAMOi.rk/UrL36dGARRAYeYDgnVJk3OowzoYSwRDLI2VrXFJrAyk.', NULL, '2023-05-18 09:41:50', '2023-05-18 09:41:50', 0),
(6, 'Sime mbacob', 'sime.appolos@icloud.com', NULL, '$2y$10$WE6YaDDipoMYpqWGGv7KeOTrqUWeJvbXENdtQ7MBKgz2kQMiOQcbO', '1NWHraHpg7dE2KoFGCUkYwDjzC6DGYHGMO5rjBcqZKcCa9cfkmti8KDiCeZ0', '2023-06-30 02:09:28', '2023-06-30 02:09:28', 1),
(8, 'Donald', 'simembacob@gmail.com', NULL, '$2y$10$897Zxty.EETnAEbk1J90VuQ.EsQiJ6k6gTi9JfifhRjIT3mM8CS4.', NULL, '2023-09-05 09:01:20', '2023-09-05 09:01:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `phone`, `pin_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '672052482', '986545', 'PETIT BOABAB-BONBERI, Douala, Littoral, Cameroun', '2023-06-02 22:20:06', '2023-06-02 22:22:18'),
(2, 3, '659066477', '897531', 'Douala, Bépanda,', '2023-06-02 22:24:12', '2023-06-02 22:24:12'),
(3, 6, '671817484', '123456', 'Yaounde', '2023-06-30 02:11:13', '2023-06-30 02:11:13'),
(4, 8, '676161474', '784561', 'Bangangte Rue 2045 Pont Cassé', '2023-09-05 09:37:31', '2023-09-05 09:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(14, 6, 29, '2023-06-30 02:12:51', '2023-06-30 02:12:51'),
(16, 8, 35, '2023-09-05 09:03:54', '2023-09-05 09:03:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_details_user_id_unique` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
