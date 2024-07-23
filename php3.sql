-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 12, 2024 lúc 01:25 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `idpro` bigint UNSIGNED NOT NULL,
  `idorders` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `idpro`, `idorders`, `price`, `name`, `img`, `soluong`, `thanhtien`, `created_at`, `updated_at`) VALUES
(7, 66, 1, 14472, 'Đồ Nam 1', 'null', 1, 14472, '2024-06-09 18:56:35', '2024-06-09 18:56:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `home`, `created_at`, `updated_at`) VALUES
(11, 'Men', 7, '2024-05-09 20:41:23', '2024-05-09 20:41:23'),
(12, 'Women', 7, '2024-05-09 20:41:33', '2024-05-09 20:41:33'),
(13, 'Kid', 3, '2024-05-09 20:41:41', '2024-05-09 20:41:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_10_015731_create_categories_table', 2),
(6, '2024_05_10_015744_create_products_table', 2),
(7, '2024_05_10_015750_create_carts_table', 2),
(8, '2024_05_10_015754_create_orders_table', 2),
(9, '2024_05_10_021015_create_products_table', 3),
(10, '2024_05_10_021905_create_users_table', 4),
(11, '2024_05_10_022100_create_users_table', 5),
(12, '2024_05_10_022747_create_products_table', 6),
(13, '2024_05_10_023451_create_orders_table', 6),
(14, '2024_05_10_023643_create_bill_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `madh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoidat_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoidat_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoidat_tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nguoidat_diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nguoinhan_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoinhan_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoinhan_diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `ship` int DEFAULT '25000',
  `voucher` int DEFAULT NULL,
  `tongthanhtoan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `madh`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_tel`, `nguoinhan_diachi`, `total`, `ship`, `voucher`, `tongthanhtoan`, `created_at`, `updated_at`) VALUES
(1, 2, 'HX8546', 'user', 'user@gmail.com', NULL, NULL, 'bao', '123', '123', 1, 25000, NULL, 14472, '2024-06-09 18:56:35', '2024-06-09 18:56:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `Categories_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `view` int DEFAULT NULL,
  `bestseller` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `Categories_id`, `name`, `img`, `price`, `view`, `bestseller`, `created_at`, `updated_at`) VALUES
(66, 11, 'Đồ Nam 1', 'ao-nam-1.jpg', 14472.00, 6254689, 4, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(67, 11, 'Đồ Nam 2', 'ao-nam-2.jpg', 35955.00, 8321775, 2, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(68, 11, 'Đồ Nam 3', 'ao-nam-3.jpg', 43933.00, 5885707, 8, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(69, 11, 'Áo Nam 4', 'ao-nam-4.jpg', 41947.00, 5921065, 9, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(70, 11, 'Áo Nam 5', 'ao-nam-5.jpg', 13228.00, 5005530, 8, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(71, 11, 'Áo Nam 6', 'ao-nam-6.jpg', 47686.00, 7686641, 4, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(72, 11, 'Áo Nam 7', 'ao-nam-7.jpg', 23998.00, 1776105, 6, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(73, 11, 'Áo Nam 8', 'ao-nam-8.jpg', 12152.00, 7840368, 8, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(74, 11, 'Áo Nam 9', 'ao-nam-9.jpg', 48020.00, 6607570, 8, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(75, 11, 'Áo Nam 10', 'ao-nam-10.jpg', 36224.00, 3069283, 7, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(76, 11, 'Áo Nam 11', 'ao-nam-11.jpg', 38899.00, 1515517, 7, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(77, 11, 'Áo Nam 12', 'ao-nam-12.jpg', 43687.00, 4311884, 1, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(78, 11, 'Áo Nam 13', 'ao-nam-13.jpg', 28028.00, 8159658, 9, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(79, 11, 'Áo Nam 14', 'ao-nam-14.jpg', 35828.00, 7528434, 4, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(80, 11, 'Áo Nam 15', 'ao-nam-15.jpg', 47738.00, 2552540, 5, '2024-05-09 20:47:37', '2024-05-09 20:47:37'),
(81, 12, 'Áo Nữ 1', 'ao-nu-1.jpg', 45586.00, 7503608, 5, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(82, 12, 'Áo Nữ 2', 'ao-nu-2.jpg', 26105.00, 2480675, 2, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(83, 12, 'Áo Nữ 3', 'ao-nu-3.jpg', 42524.00, 7069249, 5, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(84, 12, 'Áo Nữ 4', 'ao-nu-4.jpg', 35111.00, 8451751, 4, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(85, 12, 'Áo Nữ 5', 'ao-nu-5.jpg', 13038.00, 4635753, 5, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(86, 12, 'Áo Nữ 6', 'ao-nu-6.jpg', 25642.00, 3212840, 5, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(87, 12, 'Áo Nữ 7', 'ao-nu-7.jpg', 42448.00, 5948756, 2, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(88, 12, 'Áo Nữ 8', 'ao-nu-8.jpg', 21558.00, 7082923, 7, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(89, 12, 'Áo Nữ 9', 'ao-nu-9.jpg', 23606.00, 8440979, 6, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(90, 12, 'Áo Nữ 10', 'ao-nu-10.jpg', 29432.00, 4100781, 1, '2024-05-09 20:54:02', '2024-05-09 20:54:02'),
(91, 13, 'Áo Trẻ Em 1', 'ao-kid-1.jpg', 12359.00, 297381, 7, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(92, 13, 'Áo Trẻ Em 2', 'ao-kid-2.jpg', 26391.00, 8024327, 7, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(93, 13, 'Áo Trẻ Em 3', 'ao-kid-3.jpg', 22264.00, 4245556, 9, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(94, 13, 'Áo Trẻ Em 4', 'ao-kid-4.jpg', 15880.00, 6269919, 6, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(95, 13, 'Áo Trẻ Em 5', 'ao-kid-5.jpg', 10769.00, 5706864, 3, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(96, 13, 'Áo Trẻ Em 6', 'ao-kid-6.jpg', 24176.00, 4145170, 9, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(97, 13, 'Áo Trẻ Em 7', 'ao-kid-7.jpg', 18145.00, 6168371, 9, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(98, 13, 'Áo Trẻ Em 8', 'ao-kid-8.jpg', 23610.00, 4936099, 3, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(99, 13, 'Áo Trẻ Em 9', 'ao-kid-9.jpg', 28012.00, 7770673, 1, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(100, 13, 'Áo Trẻ Em 10', 'ao-kid-10.jpg', 27827.00, 7636149, 7, '2024-05-09 20:59:35', '2024-05-09 20:59:35'),
(126, 11, 'luffy', '1716783101.jpg', 3000000.00, NULL, NULL, '2024-05-26 20:53:08', '2024-05-26 21:11:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` int DEFAULT '0',
  `role` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `diachi`, `dienthoai`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '123', NULL, NULL, 0, 1, NULL, NULL),
(2, 'user', 'user@gmail.com', NULL, '123', NULL, NULL, 0, 0, NULL, '2024-06-02 19:22:36'),
(58, 'Bảo Phạm', 'baokgvn2@gmail.com', NULL, '123123', NULL, NULL, 0, 0, '2024-05-28 19:47:45', '2024-05-28 22:04:55'),
(59, 'baok', 'bao@gmail.com', NULL, '123', NULL, NULL, 0, 0, '2024-05-28 20:01:52', '2024-05-28 20:01:52'),
(60, 'bao', 'baobao@gmail.com', NULL, '123123', NULL, NULL, 0, 1, '2024-06-02 17:36:32', '2024-06-02 18:06:26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_idorders_foreign` (`idorders`),
  ADD KEY `bill_idpro_foreign` (`idpro`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_iduser_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_iddm_foreign` (`Categories_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bill_idorders_foreign` FOREIGN KEY (`idorders`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_idpro_foreign` FOREIGN KEY (`idpro`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_iduser_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_iddm_foreign` FOREIGN KEY (`Categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
