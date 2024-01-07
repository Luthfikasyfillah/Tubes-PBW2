-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jan 2024 pada 04.03
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dberit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_06_025953_create_pemasukans_table', 1),
(6, '2024_01_06_030801_create_pengeluarans_table', 1),
(7, '2024_01_06_031918_create_tabungans_table', 1),
(8, '2024_01_06_185941_create_riwayats_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukans`
--

CREATE TABLE `pemasukans` (
  `idPemasukan` int NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `nominalPemasukan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemasukans`
--

INSERT INTO `pemasukans` (`idPemasukan`, `idUser`, `nominalPemasukan`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
(23, 2, 1000000.00, 'Gajian', '2024-01-06', '2024-01-06 14:07:12', '2024-01-06 14:07:12'),
(26, 5, 1000000.00, 'Gaji', '2024-01-07', '2024-01-07 02:52:31', '2024-01-07 02:52:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `idPengeluaran` int NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `nominalPengeluaran` decimal(10,2) NOT NULL DEFAULT '0.00',
  `keterangan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluarans`
--

INSERT INTO `pengeluarans` (`idPengeluaran`, `idUser`, `nominalPengeluaran`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
(8, 2, 10000.00, 'makan', '2024-01-06', '2024-01-06 14:07:27', '2024-01-06 14:07:27'),
(9, 2, 25000.00, 'makan', '2024-01-06', '2024-01-06 14:07:36', '2024-01-06 14:07:36'),
(10, 2, 466000.00, 'tagihan', '2024-01-05', '2024-01-06 14:08:01', '2024-01-06 14:08:01'),
(11, 2, 7500.00, 'transportasi', '2024-01-06', '2024-01-06 14:08:24', '2024-01-06 14:08:24'),
(12, 2, 130000.00, 'transportasi', '2024-01-06', '2024-01-06 14:08:32', '2024-01-06 14:08:32'),
(13, 2, 50000.00, 'hiburan', '2024-01-06', '2024-01-06 14:08:43', '2024-01-06 14:08:43'),
(14, 2, 300000.00, 'lainnya', '2024-01-06', '2024-01-06 14:09:05', '2024-01-06 14:09:05'),
(15, 4, 200000.00, 'hiburan', '2024-01-07', '2024-01-07 01:36:59', '2024-01-07 01:36:59'),
(16, 5, 20000.00, 'makan', '2024-01-07', '2024-01-07 02:52:45', '2024-01-07 02:52:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayats`
--

CREATE TABLE `riwayats` (
  `id` bigint UNSIGNED NOT NULL,
  `idPemasukan` int DEFAULT NULL,
  `idPengeluaran` int DEFAULT NULL,
  `nominalTabungan` decimal(30,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayats`
--

INSERT INTO `riwayats` (`id`, `idPemasukan`, `idPengeluaran`, `nominalTabungan`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, 100000000.00, '2024-01-06 13:12:50', '2024-01-06 13:12:50'),
(8, NULL, NULL, 5000000.00, '2024-01-06 13:48:54', '2024-01-06 13:48:54'),
(9, 23, NULL, NULL, '2024-01-06 14:07:12', '2024-01-06 14:07:12'),
(10, NULL, 8, NULL, '2024-01-06 14:07:27', '2024-01-06 14:07:27'),
(11, NULL, 9, NULL, '2024-01-06 14:07:36', '2024-01-06 14:07:36'),
(12, NULL, 10, NULL, '2024-01-06 14:08:01', '2024-01-06 14:08:01'),
(13, NULL, 11, NULL, '2024-01-06 14:08:24', '2024-01-06 14:08:24'),
(14, NULL, 12, NULL, '2024-01-06 14:08:32', '2024-01-06 14:08:32'),
(15, NULL, 13, NULL, '2024-01-06 14:08:43', '2024-01-06 14:08:43'),
(16, NULL, 14, NULL, '2024-01-06 14:09:05', '2024-01-06 14:09:05'),
(19, NULL, 15, NULL, '2024-01-07 01:36:59', '2024-01-07 01:36:59'),
(20, NULL, NULL, 100000000.00, '2024-01-07 01:37:10', '2024-01-07 01:37:10'),
(21, 26, NULL, NULL, '2024-01-07 02:52:31', '2024-01-07 02:52:31'),
(22, NULL, 16, NULL, '2024-01-07 02:52:45', '2024-01-07 02:52:45'),
(23, NULL, NULL, 1000000.00, '2024-01-07 02:53:34', '2024-01-07 02:53:34'),
(26, NULL, NULL, 1000000.00, '2024-01-07 03:09:50', '2024-01-07 03:09:50'),
(27, NULL, NULL, 1000000.00, '2024-01-07 03:10:17', '2024-01-07 03:10:17'),
(31, NULL, NULL, 1000000.00, '2024-01-07 03:32:00', '2024-01-07 03:32:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungans`
--

CREATE TABLE `tabungans` (
  `idTabungan` int NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `namaTabungan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `targetTabungan` decimal(30,2) NOT NULL DEFAULT '0.00',
  `rencanaPengisian` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominalPengisian` decimal(30,2) NOT NULL DEFAULT '0.00',
  `jumlahTabungan` decimal(30,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tabungans`
--

INSERT INTO `tabungans` (`idTabungan`, `idUser`, `namaTabungan`, `targetTabungan`, `rencanaPengisian`, `nominalPengisian`, `jumlahTabungan`, `created_at`, `updated_at`) VALUES
(4, 2, 'Laptop', 15000000.00, 'bulanan', 5000000.00, 15000000.00, '2024-01-06 11:48:00', '2024-01-06 11:50:23'),
(5, 2, 'Rumah', 800000000.00, 'tahunan', 100000000.00, 400000000.00, '2024-01-06 11:53:50', '2024-01-07 01:37:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idUser`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Luthfi Kasyfillah', 'lukas', 'lukas@gmail.com', NULL, '$2y$12$BNrA/MGBilMdkkq6fdDKnO7Un6gNG9DfB2yWAbLnQOxRaLImOefGm', NULL, '2024-01-05 21:05:40', '2024-01-06 13:35:06'),
(4, 'luthfi kasyfillah 234', 'luthfi2', 'luthfi2@gmail.com', NULL, '$2y$12$TTy2Q9dCiXTtgy/pobrq2.GDCAzPaCDBhRoeqzktFGNyGbr5NmUty', NULL, '2024-01-07 01:22:04', '2024-01-07 01:37:31'),
(5, 'bumandhala', 'bumandhala', 'bumandhala@gmail.com', NULL, '$2y$12$072bP3pXWDKhYcIIl7kJ5OOG/vaUZyLqxDsiN9rHDgNPtO0YZmViq', NULL, '2024-01-07 02:29:08', '2024-01-07 03:11:10'),
(6, 'Rayyanza Malik Ahmad', 'Cipung', 'Rayyanza@gmail.com', NULL, '$2y$12$wvyQPO.x/QrT5qzNioYX7.OIYlWz9GtbIqaM4TcP2NzqcS9uN7jSO', NULL, '2024-01-07 03:27:02', '2024-01-07 03:42:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  ADD PRIMARY KEY (`idPemasukan`),
  ADD KEY `pemasukans_iduser_foreign` (`idUser`);

--
-- Indeks untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`idPengeluaran`),
  ADD KEY `pengeluarans_iduser_foreign` (`idUser`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayats_idpemasukan_foreign` (`idPemasukan`),
  ADD KEY `riwayats_idpengeluaran_foreign` (`idPengeluaran`);

--
-- Indeks untuk tabel `tabungans`
--
ALTER TABLE `tabungans`
  ADD PRIMARY KEY (`idTabungan`),
  ADD KEY `tabungans_iduser_foreign` (`idUser`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  MODIFY `idPemasukan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `idPengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tabungans`
--
ALTER TABLE `tabungans`
  MODIFY `idTabungan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemasukans`
--
ALTER TABLE `pemasukans`
  ADD CONSTRAINT `pemasukans_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  ADD CONSTRAINT `riwayats_idpemasukan_foreign` FOREIGN KEY (`idPemasukan`) REFERENCES `pemasukans` (`idPemasukan`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayats_idpengeluaran_foreign` FOREIGN KEY (`idPengeluaran`) REFERENCES `pengeluarans` (`idPengeluaran`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabungans`
--
ALTER TABLE `tabungans`
  ADD CONSTRAINT `tabungans_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
