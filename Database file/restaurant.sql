-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 09:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `concessions`
--

CREATE TABLE `concessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concessions`
--

INSERT INTO `concessions` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(7, 'Classic Beef Burger', 'Juicy, grilled patty with fresh lettuce, tomato, cheese, and our special sauce—served in a soft, toasted bun. Packed with flavor in every bite!', 'concessions/FlKTPrxvKjyHbkBI1FjYtlraEzvKkTYB1G7yPgyV.jpg', 1250.00, '2025-04-21 11:16:06', '2025-04-21 11:16:06'),
(8, 'BBQ Chicken Pizza', 'Cheesy, crispy, and full of flavor! Topped with rich tomato sauce, melty mozzarella, and your favorite toppings on a freshly baked crust.', 'concessions/YePTUbcFVtnVuURp6NFyQInZjaUxTQAmmLCvZDKK.jpg', 1850.00, '2025-04-21 11:18:47', '2025-04-21 11:18:47'),
(9, 'Chicken Fried Rice', 'Deliciously stir-fried rice with fresh veggies, eggs, and your choice of meat—full of flavor and cooked to perfection!', 'concessions/iUae8trWditUeqQrbbZ47sPsD50iUhqp6N2p1peQ.jpg', 1200.00, '2025-04-21 11:20:07', '2025-04-21 11:20:07'),
(10, 'Vanilla Dream Ice Cream', 'Creamy, dreamy, and perfectly chilled! Choose from a variety of rich flavors, each one a sweet, cold treat to satisfy your cravings.', 'concessions/59JyL6DCJ67xJpiXQXtMugYxGVvEseujcbv8dPfx.jpg', 450.00, '2025-04-21 11:21:14', '2025-04-21 11:21:14'),
(11, 'Choco Lava Shake', 'A rich and indulgent blend of smooth chocolate ice cream, milk, and a touch of sweetness—perfectly chilled for a creamy, delicious treat!', 'concessions/Goaap1swGbNTlK8O0FBMw41yR7c7nOks5l9kRH1l.jpg', 650.00, '2025-04-21 11:22:58', '2025-04-21 11:24:31'),
(12, 'Mango-Orange Fusion', 'Freshly squeezed and bursting with citrusy goodness! A refreshing, tangy drink packed with vitamins and natural sweetness.', 'concessions/MeUaT2jz5odQjGxPiHKKN5QNvw3HovOBPdcZfeoH.jpg', 550.00, '2025-04-21 11:26:10', '2025-04-21 11:29:53');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_04_20_000001_create_concessions_table', 1),
(3, '2025_04_20_000002_create_orders_table', 1),
(4, '2025_04_20_000003_create_order_concessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_to_kitchen_time` datetime NOT NULL,
  `status` enum('Pending','In-Progress','Completed') NOT NULL DEFAULT 'Pending',
  `total_cost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `send_to_kitchen_time`, `status`, `total_cost`, `created_at`, `updated_at`) VALUES
(9, '2025-04-21 22:32:00', 'Completed', 1250.00, '2025-04-21 11:32:12', '2025-04-21 11:32:21'),
(10, '2025-04-21 22:32:00', 'Completed', 3050.00, '2025-04-21 11:32:35', '2025-04-21 11:33:02'),
(13, '2025-04-21 23:21:00', 'Completed', 550.00, '2025-04-21 12:21:17', '2025-04-21 12:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_concessions`
--

CREATE TABLE `order_concessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `concession_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_concessions`
--

INSERT INTO `order_concessions` (`id`, `order_id`, `concession_id`, `created_at`, `updated_at`) VALUES
(14, 9, 7, '2025-04-21 11:32:12', '2025-04-21 11:32:12'),
(15, 10, 8, '2025-04-21 11:32:35', '2025-04-21 11:32:35'),
(16, 10, 9, '2025-04-21 11:32:35', '2025-04-21 11:32:35'),
(19, 13, 12, '2025-04-21 12:21:17', '2025-04-21 12:21:17');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concessions`
--
ALTER TABLE `concessions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_concessions`
--
ALTER TABLE `order_concessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_concessions_order_id_foreign` (`order_id`),
  ADD KEY `order_concessions_concession_id_foreign` (`concession_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concessions`
--
ALTER TABLE `concessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_concessions`
--
ALTER TABLE `order_concessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_concessions`
--
ALTER TABLE `order_concessions`
  ADD CONSTRAINT `order_concessions_concession_id_foreign` FOREIGN KEY (`concession_id`) REFERENCES `concessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_concessions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
