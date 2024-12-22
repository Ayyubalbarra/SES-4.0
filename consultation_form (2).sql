-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Des 2024 pada 14.33
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ses`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `consultation_form`
--

CREATE TABLE `consultation_form` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_field` varchar(255) NOT NULL,
  `company_size` int(11) NOT NULL,
  `company_address` text NOT NULL,
  `current_lighting` text DEFAULT NULL,
  `problem_detail` text DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `min_budget` int(11) DEFAULT NULL,
  `max_budget` int(11) DEFAULT NULL,
  `privacy_policy` tinyint(1) DEFAULT 0,
  `updates_promotions` tinyint(1) DEFAULT 0,
  `status` enum('running','finished') DEFAULT 'running',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `preferredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `consultation_form`
--

INSERT INTO `consultation_form` (`id`, `company_name`, `company_field`, `company_size`, `company_address`, `current_lighting`, `problem_detail`, `goals`, `min_budget`, `max_budget`, `privacy_policy`, `updates_promotions`, `status`, `created_at`, `preferredDate`) VALUES
(10, 'SES', 'electronics', 1222, 'sleman', 'y', 'y', 'y', 1, 2, 1, 1, 'running', '2024-12-20 04:14:26', '0000-00-00'),
(11, '1111', '212', 12, '22', '222', '22', '112211221', 1, 7, 1, 1, 'running', '2023-01-01 01:32:58', '0000-00-00'),
(12, 'uii', 'uii', 12, '12', '212', '1', '212', 111, 111, 1, 1, 'running', '2024-12-21 13:28:50', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `consultation_form`
--
ALTER TABLE `consultation_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `consultation_form`
--
ALTER TABLE `consultation_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
