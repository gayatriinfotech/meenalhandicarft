-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 08:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handcraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogins`
--

CREATE TABLE `adminlogins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogins`
--

INSERT INTO `adminlogins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2023-09-30 15:21:40', '2023-09-30 15:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_ip`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'maheshyangandul@gmail.com', 24, 2, '2023-10-14 12:29:02', '2023-10-15 02:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Wedding', 'wedding.jpg', 'active', 0, '2023-10-06 05:00:48', '2023-10-06 05:00:48'),
(2, 'Toys', 'toys.jpg', 'active', 0, '2023-10-06 05:01:06', '2023-10-06 05:01:06'),
(3, 'Home & Living', 'home-and-living.jpg', 'active', 0, '2023-10-06 05:02:15', '2023-10-06 05:02:15'),
(4, 'Wedding Decoration', 'wedding-decoration.png', 'active', 1, '2023-10-06 05:44:31', '2023-10-06 05:44:31'),
(5, 'Wedding Gifts', 'wedding-gifts.png', 'active', 1, '2023-10-06 05:45:04', '2023-10-06 05:45:04'),
(6, 'Invitations & Paper', 'Invitations-Paper.png', 'active', 1, '2023-10-06 05:45:35', '2023-10-06 05:45:35'),
(7, 'Toys & Games', 'toys.jpg', 'active', 2, '2023-10-06 05:46:57', '2023-10-06 05:46:57'),
(8, 'Cleaning Supplies', 'cleaning.png', 'active', 3, '2023-10-06 05:47:48', '2023-10-06 05:47:48'),
(9, 'Office', 'office.png', 'active', 3, '2023-10-06 05:48:28', '2023-10-06 05:48:28'),
(10, 'Kitchen & Dining', 'kitchen.png', 'active', 3, '2023-10-06 05:48:58', '2023-10-06 05:48:58'),
(11, 'Furniture', 'furniture.png', 'active', 3, '2023-10-06 05:49:26', '2023-10-06 05:49:26'),
(12, 'Home Decor', 'decor.png', 'active', 3, '2023-10-06 05:49:48', '2023-10-06 05:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile_no`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Mahesh', 'mahesh@gmail.com', 333, 'This is a demo', '2023-10-12 12:58:01', '2023-10-12 12:58:01'),
(2, 'Stranger', 'stranger@gmail.com', 3333333333, 'fsdfs', '2023-10-12 13:09:42', '2023-10-12 13:09:42'),
(3, 'user', 'user@gmail.com', 7777777777, 'message', '2023-10-14 06:41:29', '2023-10-14 06:41:29');

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
-- Table structure for table `inwards`
--

CREATE TABLE `inwards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inwards`
--

INSERT INTO `inwards` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '100', '2023-10-14 01:03:05', '2023-10-14 01:03:05'),
(2, '2', '10', '2023-10-14 01:03:23', '2023-10-14 01:03:23'),
(3, '3', '20', '2023-10-14 01:03:36', '2023-10-14 01:03:36'),
(4, '4', '50', '2023-10-14 01:03:47', '2023-10-14 01:03:47'),
(5, '5', '40', '2023-10-14 01:03:56', '2023-10-14 01:03:56'),
(6, '6', '100', '2023-10-14 01:04:06', '2023-10-14 01:04:06'),
(7, '7', '50', '2023-10-14 01:04:18', '2023-10-14 01:04:18'),
(8, '8', '70', '2023-10-14 01:04:30', '2023-10-14 01:04:30'),
(9, '9', '50', '2023-10-14 01:04:40', '2023-10-14 01:04:40'),
(10, '10', '50', '2023-10-14 01:04:51', '2023-10-14 01:04:51'),
(11, '11', '40', '2023-10-14 01:05:03', '2023-10-14 01:05:03'),
(12, '10', '30', '2023-10-14 01:06:03', '2023-10-14 01:06:03'),
(13, '11', '80', '2023-10-14 01:06:37', '2023-10-14 01:06:37'),
(14, '12', '90', '2023-10-14 01:07:26', '2023-10-14 01:07:26'),
(15, '13', '30', '2023-10-14 01:09:59', '2023-10-14 01:09:59'),
(16, '14', '60', '2023-10-14 01:10:09', '2023-10-14 01:10:09'),
(17, '15', '90', '2023-10-14 01:10:24', '2023-10-14 01:10:24'),
(18, '16', '70', '2023-10-14 01:10:40', '2023-10-14 01:10:40'),
(19, '17', '50', '2023-10-14 01:11:05', '2023-10-14 01:11:05'),
(20, '19', '40', '2023-10-14 01:11:35', '2023-10-14 01:11:35'),
(21, '20', '0', '2023-10-14 01:12:07', '2023-10-14 12:23:09'),
(22, '21', '80', '2023-10-14 01:12:39', '2023-10-14 01:12:39'),
(23, '22', '70', '2023-10-14 01:27:38', '2023-10-14 01:27:38'),
(24, '23', '60', '2023-10-14 01:27:51', '2023-10-14 01:27:51'),
(25, '24', '80', '2023-10-14 01:28:01', '2023-10-14 01:28:01'),
(26, '24', '40', '2023-10-14 01:28:19', '2023-10-14 01:28:19'),
(27, '25', '60', '2023-10-14 01:28:28', '2023-10-14 01:28:28');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_30_114124_create_adminlogins_table', 1),
(6, '2023_09_30_114149_create_bill_details_table', 1),
(7, '2023_09_30_114213_create_categories_table', 1),
(8, '2023_09_30_114224_create_products_table', 1),
(9, '2023_09_30_114242_create_profile_tbls_table', 1),
(10, '2023_09_30_114256_create_registers_table', 1),
(11, '2023_09_30_151428_create_carts_table', 1),
(12, '2023_10_02_051656_create_inwards_table', 2),
(13, '2023_10_02_052039_create_stocks_table', 2),
(14, '2023_10_12_172625_create_wishlists_table', 3),
(15, '2023_10_12_181639_create_contacts_table', 4),
(16, '2023_10_14_105454_create_subscribers_table', 5),
(17, '2023_10_14_112214_create_order_details_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `category_id` int(11) NOT NULL,
  `subcate_id` int(11) NOT NULL,
  `sku_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mrp` double(8,2) NOT NULL,
  `retail_price` double(8,2) NOT NULL,
  `wholesale_price` double(8,2) NOT NULL,
  `material` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `depth` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `shop_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcate_id`, `sku_id`, `product_name`, `product_image`, `description`, `mrp`, `retail_price`, `wholesale_price`, `material`, `width`, `height`, `depth`, `weight`, `tags`, `shop_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'SKUID-1', 'Custom Neon Sign', 'custom-neon-1.png,custom-neon-2.png,custom-neon-3.png,custom-neon-4.png', 'Our neon signs are made with high-quality, durable neon tubing that is bent and shaped by hand to create the desired design. The tubing is then connected to a transformer, which powers the neon and creates the signature glowing effect. The sign is also equipped with a hanging kit, making it easy to install and display.', 2580.00, 600.00, 645.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-06 11:01:01', '2023-10-08 05:25:02'),
(2, 1, 4, 'SKUID-2', 'Delicate Round Engagement Ring Box', 'Ring-Box-1.png,Ring-Box-2.png,Ring-Box-3.png,Ring-Box-4.png', 'The sleek round design, coupled with its premium materials, creates a stunning presentation for your treasured ring. Every aspect of this box, from its smooth exterior to its plush velvet interior, has been thoughtfully designed to enhance the magic and significance of your special moment.', 2093.00, 1200.00, 1256.00, 'Walnut', '.', '.', '.', '.', '.', '.', '2023-10-06 12:09:03', '2023-10-06 12:09:03'),
(3, 1, 4, 'SKUID-3', 'Ring Bearer Box', 'Ring-Bearer-Box-1.png,Ring-Bearer-Box-2.png,Ring-Bearer-Box-3.png,Ring-Bearer-Box-4.png', 'A lovely personalized Walnut Wedding Ring Box with custom words is a great gift idea for lovers, bride&groom, bridesmaids, a friend, or yourself! This box can be used to store jewelry, mini cards or special mementos.', 1907.00, 900.00, 953.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-06 12:22:38', '2023-10-06 12:22:38'),
(4, 1, 5, 'SKUID-32', 'Luxury Eucalyptus Wedding Planner Book', 'Wedding-Planner-Book-1.png,Wedding-Planner-Book-2.png,Wedding-Planner-Book-3.png,Wedding-Planner-Book-4.png', 'This new version of our bestselling \'My Wedding Planner\' now includes an 18-month undated calendar, three sticker sheets, protective gold corners, a stencil sheet to help with your table plans, a pocket at the end for all your loose bits of paper and lots more updated content!', 3154.00, 3100.00, 3154.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 01:46:00', '2023-10-07 01:46:00'),
(5, 1, 5, 'SKUID-32', 'Engagement Love Lock', 'Love-Padlock-1.png,Love-Padlock-2.png,Love-Padlock-3.png,Love-Padlock-4.png', 'Each love lock comes with its own ribbon-tied key, wrapped in white tissue in an exclusive Carriage Trade gift box. Made from metal alloy, the padlock measures 4.5cm in diameter. Height 6cm or 10cm, depending on style chosen.', 2317.00, 2500.00, 2317.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 01:50:40', '2023-10-07 01:50:40'),
(6, 1, 5, 'SKUID-w3', 'Couple Bracelet', 'Couple-Bracelet-1.png,Couple-Bracelet-2.png,Couple-Bracelet-3.png,Couple-Bracelet-4.png', 'Matching Couples Bracelets Set of 2 amazing, unique Leather and Stainless Steel cuff bracelets.', 6533.00, 4500.00, 4899.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 01:55:05', '2023-10-07 01:55:05'),
(7, 1, 5, 'SKUID-31', 'Jewelry Box', 'Jewelry-Box-1.png,Jewelry-Box-2.png,Jewelry-Box-3.png,Jewelry-Box-4.png', 'Handcrafted with meticulous attention to detail, our wooden jewelry box gift box is made from high-quality wood, ensuring its longevity and durability. The smooth surface and expertly crafted floral design evoke a sense of grace and beauty, making it a perfect accessory for storing precious jewelry and cherished mementos.', 1401.00, 1200.00, 1261.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 02:06:59', '2023-10-07 02:17:44'),
(8, 1, 6, 'SKUID-342', 'Blue Mountain Wedding Invitation', 'Blue-1.png,Blue-2.png,Blue-3.png,Blue-4.png', 'Our Blue Mountain Wedding Invitation Suite is thoughtfully curated to infuse the spirit of the mountains into every aspect of your special day, ensuring an unforgettable celebration.', 1253.00, 600.00, 626.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 02:28:09', '2023-10-07 02:28:09'),
(9, 1, 6, 'SKUID-322', 'Watercolor Venue Invitation', 'venue-1.jpg,venue-2.jpg,venue-3.jpg,venue-4.jpg', 'The portrait is created digitally using professional artistic software, it is not created from scratch or by hand.', 3226.00, 1200.00, 1291.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 02:50:13', '2023-10-08 05:37:05'),
(10, 1, 6, 'SKUID-2432', 'Bridal Luncheon Invitation', 'bridal-1.jpg,bridal-2.jpg,bridal-3.jpg,bridal-4.jpg', 'EASY TO EDIT, this file is yours to KEEP FOREVER to use at as many Bridal Shower/Bridal Luncheon parties as you like!', 812.00, 500.00, 569.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 02:54:44', '2023-10-08 05:37:36'),
(11, 2, 7, 'SKUID-423', 'Interstellar Movie Robot', 'interstellar-1.png,interstellar-2.png,interstellar-3.png,interstellar-4.png', 'MADE FROM OVER 120 INDIVIDUAL GENUINE NEW LEGO PIECES AND IS FULLY POSABLE IN NUMEROUS DIFFERENT POSITIONS', 5049.00, 4500.00, 5049.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 04:53:48', '2023-10-07 04:53:48'),
(12, 2, 7, 'SKUID-3211', 'Montessori wood pencil holder', 'pencils-1.png,pencils-2.png,pencils-3.png,pencils-4.png', 'We offer this small, very compact Montessori pencil holder. This is a perfect way to organize your pencils and it does look amazing on the desk. This is our BESTSELLER for more than 8 years and people LOVE it! Many of them return even more than once to buy a new pencil holder as a gift to others.', 3454.00, 2500.00, 2936.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:05:48', '2023-10-07 05:05:48'),
(13, 2, 7, 'SKUID-36636', 'Wooden Magnetic Chess', 'chess-1.png,chess-2.png,chess-3.png,chess-4.png', '14\" Travel Set - The beautiful travel chess set makes for a great companion to take on your trips/ vacations. Very Durable in its construction, this set is handcrafted in high grade maple and golden rosewood. It has 2 extra queens for effortless pawn promotion.', 5673.00, 5300.00, 5438.00, 'Wooden', '.', '.', '.', '.', '.', '.', '2023-10-07 05:11:12', '2023-10-08 05:38:16'),
(14, 3, 8, 'SKUID-3234', 'Wood Pot Brush', 'brush-1.jpg,brush-2.jpg,brush-3.jpg,brush-4.jpg', '.', 842.00, 200.00, 253.00, 'Wooden', '.', '.', '.', '.', '.', '.', '2023-10-07 05:20:03', '2023-10-08 05:40:57'),
(15, 3, 8, 'SKUID-31111', 'Absorbent Dishcloth', 'Absorbent-Dishcloth-1.jpg,Absorbent-Dishcloth-2.jpg,Absorbent-Dishcloth-3.jpg,Absorbent-Dishcloth-4.jpg', 'Tired of struggling with stubborn stains and greasy pots and pans? We\'ve got the ultimate solution for you! Introducing our Kitchen Cleaning Towel and Sponge Set, a game-changer in the world of kitchen hygiene and cleanliness. 🌟', 893.00, 800.00, 893.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:26:55', '2023-10-08 05:40:34'),
(16, 3, 8, 'SKUID-3412', 'Vacuum Cleaner', 'vacuum-1.jpg,vacuum-2.jpg,vacuum-3.jpg,vacuum-4.jpg', '.', 3309.00, 3000.00, 3309.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:32:18', '2023-10-08 05:40:08'),
(17, 3, 9, 'SKUID-232', 'Personalized Desk Name Sign', 'desk-name-1.jpg,desk-name-2.jpg,desk-name-3.jpg,desk-name-4.jpg', 'Add a touch of magic to your workplace with these beautiful desk name plates. Personalised with your name and one of our vibrant colours, they are sure to bring a smile to any room!', 420.00, 350.00, 420.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:38:22', '2023-10-08 05:41:33'),
(19, 3, 9, 'SKUID-732772', 'Wooden Docking Charging Station', 'Charging-station-1.jpg,Charging-station-2.jpg,Charging-station-3.jpg,Charging-station-4.jpg', 'Unique and compact design wooden docking station consists of one piece with lots of necessary \"caves\" and laser-cut places for holding of your most necessary things. You can place you cell phone, wallet, watches, pen and even glasses, or other small items, like USB memory stick, coins, etc.', 3371.00, 2500.00, 2697.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:43:32', '2023-10-08 05:41:59'),
(20, 3, 10, 'SKUID-2131', 'On the Go ! Blender', 'Blender-1.jpg,Blender-2.jpg,Blender-3.jpg,Blender-4.jpg', 'Four generations [touch screen] [5C 2000 mAh power battery] [magnetic induction safety switch]', 1978.00, 1800.00, 1978.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:51:24', '2023-10-08 05:42:28'),
(21, 3, 10, 'SKUID-77272', 'Wooden Chopping Board', 'chopper-1.jpg,chopper-2.jpg,chopper-3.jpg,chopper-4.jpg', 'Wood Chopping/Cutting Board is made of wood so it lasts longer and is gentle on your knives as well. This board is durable and lightweight. An environmentally friendly option for cutting your fruits and vegetables. It is easy to clean. It is the perfect size for cutting fruits, vegetables and other food items.', 199.00, 150.00, 169.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:54:06', '2023-10-08 05:43:18'),
(22, 3, 11, 'SKUID-2772', 'Nightstand with Drawer', 'Drawer-1.jpg,Drawer-2.jpg,Drawer-3.jpg,Drawer-4.jpg', 'The Nightstand with Drawer is a sleek and stylish addition to any bedroom decor. Crafted with care, this walnut colored floating nightstand offers both functionality and aesthetics.', 16087.00, 7500.00, 8044.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 05:59:52', '2023-10-08 05:44:33'),
(23, 3, 11, 'SKUID-28282', 'Live Edge Coffee Table', 'Table-1.jpg,Table-2.jpg,Table-3.jpg,Table-4.jpg', 'This handmade coffee table will add more useful space to your home with its first-class solid wood structure, impeccable workmanship and years of use. This coffee table has a lifetime warranty.', 37851.00, 35000.00, 18925.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 06:04:22', '2023-10-08 05:44:57'),
(24, 3, 12, 'SKUID-32221', 'Modern Mirror for Bathroom', 'Mirror-1.jpg,Mirror-2.jpg,Mirror-3.jpg,Mirror-4.jpg', '.', 4732.00, 2600.00, 2839.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 06:09:35', '2023-10-08 05:45:25'),
(25, 3, 12, 'SKUID-77222', 'Metal Large Wall Clock', 'Clock-1.jpg,Clock-2.jpg,Clock-3.jpg,Clock-4.jpg', '.', 8586.00, 8000.00, 4293.00, '.', '.', '.', '.', '.', '.', '.', '2023-10-07 06:12:27', '2023-10-08 05:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `profile_tbls`
--

CREATE TABLE `profile_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_tbls`
--

INSERT INTO `profile_tbls` (`id`, `firstname`, `lastname`, `mobileno`, `email`, `password`, `gender`, `pincode`, `address`, `city`, `state`, `country`, `landmark`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'Youknow', 'Me', '8282828282', 'user@gmail.com', 'user12345', 'Male', '413005', 'Daji Peth', 'Solapur', 'Maharashtra', 'India', 'Balaji Mandir', NULL, '2023-10-01 02:15:53', '2023-10-10 07:08:50'),
(2, 'Mahesh', 'Yangandul', '9145706236', 'maheshyangandul@gmail.com', 'mahesh123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-13 04:45:07', '2023-10-13 04:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `email`, `firstname`, `lastname`, `mobileno`, `password`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 'user', 'user', '8282828282', 'user12345', '2023-10-01 02:15:53', '2023-10-01 02:15:53'),
(2, 'maheshyangandul@gmail.com', 'Mahesh', 'Yangandul', '9145706236', 'mahesh123', '2023-10-13 04:45:07', '2023-10-13 04:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `stocks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `stocks`, `created_at`, `updated_at`) VALUES
(1, '1', '100', '2023-10-14 01:03:05', '2023-10-14 01:03:05'),
(2, '2', '10', '2023-10-14 01:03:23', '2023-10-14 01:03:23'),
(3, '3', '20', '2023-10-14 01:03:36', '2023-10-14 01:03:36'),
(4, '4', '50', '2023-10-14 01:03:47', '2023-10-14 01:03:47'),
(5, '5', '40', '2023-10-14 01:03:56', '2023-10-14 01:03:56'),
(6, '6', '100', '2023-10-14 01:04:06', '2023-10-14 01:04:06'),
(7, '7', '50', '2023-10-14 01:04:18', '2023-10-14 01:04:18'),
(8, '8', '70', '2023-10-14 01:04:30', '2023-10-14 01:04:30'),
(9, '9', '50', '2023-10-14 01:04:40', '2023-10-14 01:04:40'),
(10, '10', '80', '2023-10-14 01:04:51', '2023-10-14 01:06:03'),
(11, '11', '120', '2023-10-14 01:05:03', '2023-10-14 01:06:37'),
(12, '12', '90', '2023-10-14 01:07:26', '2023-10-14 01:07:26'),
(13, '13', '30', '2023-10-14 01:09:59', '2023-10-14 01:09:59'),
(14, '14', '60', '2023-10-14 01:10:09', '2023-10-14 01:10:09'),
(15, '15', '90', '2023-10-14 01:10:24', '2023-10-14 01:10:24'),
(16, '16', '70', '2023-10-14 01:10:39', '2023-10-14 01:10:39'),
(17, '17', '50', '2023-10-14 01:11:05', '2023-10-14 01:11:05'),
(18, '19', '40', '2023-10-14 01:11:35', '2023-10-14 01:11:35'),
(19, '20', '0', '2023-10-14 01:12:07', '2023-10-14 12:23:09'),
(20, '21', '80', '2023-10-14 01:12:39', '2023-10-14 01:12:39'),
(21, '22', '70', '2023-10-14 01:27:38', '2023-10-14 01:27:38'),
(22, '23', '60', '2023-10-14 01:27:51', '2023-10-14 01:27:51'),
(23, '24', '120', '2023-10-14 01:28:01', '2023-10-14 01:28:19'),
(24, '25', '60', '2023-10-14 01:28:28', '2023-10-14 01:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'maheshyangandul@gmail.com', '2023-10-14 05:50:53', '2023-10-14 05:50:53');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 23, '2023-10-13 07:09:36', '2023-10-13 07:09:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogins`
--
ALTER TABLE `adminlogins`
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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inwards`
--
ALTER TABLE `inwards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_tbls`
--
ALTER TABLE `profile_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogins`
--
ALTER TABLE `adminlogins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inwards`
--
ALTER TABLE `inwards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile_tbls`
--
ALTER TABLE `profile_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
