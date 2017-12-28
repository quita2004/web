-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2017 lúc 02:44 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `it_request`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `name`, `username`, `password`, `image`, `team_id`, `remember_token`) VALUES
(1, 'Linh', 'linh', '$2y$10$GaDdzTJU5OA60rEAJ2IQiu/0Z4i4FGxLU46ZLE/i1sKVEbaStL77a', NULL, 1, 'Mxh1Ipm68gdteDS1ZurFFnPNE30KuUha36WzSP9ERWxytonWMo8eGxhzHS92'),
(2, 'Nam', 'nam', '$2y$10$VGLnYkr9x4MdmouIPJB/K.w3YEDJVYyqYp3y4NI9rRBgxMZI0XObm', NULL, 2, 'xTFI962fp7ovwyyhaRAmbcfW9S0fLWAr8J5sOVkZPsQii6AiBe96zsNLZ6ZW'),
(3, 'Qui', 'qui', '$2y$10$HbCrC1W8jZBJT5rJY9ah1egzP0/jy7onXfrE93yIAzF0xBlFCpiru', NULL, 1, 'CQGN3tDnjI6wGK7wfiXE2rYtjlYkRk7Qx4XbG0QuBPSYvrCs8hC7q5c5Wx02'),
(4, 'Ngọc', 'ngoc', '$2y$10$gmFUyyGGFOkrWX2JNdxAlu3gjixqD6uLDZIoDkLhXY/WwjN3FTMqy', NULL, 2, 'OLAMJpWJRoruS0FqUJcDSpqa0mGLCS4OFDFlvdORodgfwGUA195NwhYDwamX'),
(5, 'Thiện', 'thien', '$2y$10$EEBCYu0NST8OUYMCCkcKQOS9tn5FBp7wzX0aH7YAyQMuFtIIkiMHS', NULL, 2, NULL),
(6, 'Sơn', 'son', '$2y$10$0RsthmmNwCC16lcoOj50gO13eP3m4U5JzzSWUHa/iJitcTae7VgDS', NULL, 1, 'WtyazshikWn8hOcUNRn1h5G0zSULdGyQLmc9RFfE7YiZC9AcMlEmUcwhFx35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_17_045628_create_employees_table', 1),
(6, '2017_11_19_075952_create_tickets_table', 2),
(7, '2017_11_19_125825_create_ticket_comment_table', 2),
(8, '2017_11_19_130527_create_team_id_table', 2),
(9, '2017_11_19_130642_create_ticket_relaters_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team_id`
--

CREATE TABLE `team_id` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_leader` int(11) NOT NULL,
  `id_subleader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `team_id`
--

INSERT INTO `team_id` (`id`, `name`, `id_leader`, `id_subleader`) VALUES
(1, 'Hanoi-IT', 1, 3),
(2, 'Danang-IT', 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `deadline` datetime NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `resolved_at` datetime DEFAULT NULL,
  `close_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_comment`
--

CREATE TABLE `ticket_comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_read`
--

CREATE TABLE `ticket_read` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_relaters`
--

CREATE TABLE `ticket_relaters` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_username_unique` (`username`),
  ADD KEY `fk_employee_team` (`team_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `team_id`
--
ALTER TABLE `team_id`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_create` (`create_by`),
  ADD KEY `fk_ticket_assign` (`assigned_to`),
  ADD KEY `fk_ticket_team` (`team_id`);

--
-- Chỉ mục cho bảng `ticket_comment`
--
ALTER TABLE `ticket_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_ticket` (`ticket_id`),
  ADD KEY `fk_comment_employee` (`employee_id`);

--
-- Chỉ mục cho bảng `ticket_read`
--
ALTER TABLE `ticket_read`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_read_employee` (`employee_id`),
  ADD KEY `fk_read_ticket` (`ticket_id`);

--
-- Chỉ mục cho bảng `ticket_relaters`
--
ALTER TABLE `ticket_relaters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_relater_employee` (`employee_id`),
  ADD KEY `fk_relater_ticket` (`ticket_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `team_id`
--
ALTER TABLE `team_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ticket_read`
--
ALTER TABLE `ticket_read`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ticket_relaters`
--
ALTER TABLE `ticket_relaters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employee_team` FOREIGN KEY (`team_id`) REFERENCES `team_id` (`id`);

--
-- Các ràng buộc cho bảng `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_ticket_assign` FOREIGN KEY (`assigned_to`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_ticket_create` FOREIGN KEY (`create_by`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_ticket_team` FOREIGN KEY (`team_id`) REFERENCES `team_id` (`id`);

--
-- Các ràng buộc cho bảng `ticket_comment`
--
ALTER TABLE `ticket_comment`
  ADD CONSTRAINT `fk_comment_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_comment_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Các ràng buộc cho bảng `ticket_read`
--
ALTER TABLE `ticket_read`
  ADD CONSTRAINT `fk_read_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_read_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Các ràng buộc cho bảng `ticket_relaters`
--
ALTER TABLE `ticket_relaters`
  ADD CONSTRAINT `fk_relater_employee` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_relater_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
