-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Bulan Mei 2024 pada 16.19
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
-- Database: `magang_akti2024`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` char(36) NOT NULL,
  `mahasiswa_id` char(36) NOT NULL,
  `keterangan` enum('hadir','tidak hadir','izin') NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` enum('datang','pulang','lainnya') NOT NULL DEFAULT 'datang',
  `bukti` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departements`
--

CREATE TABLE `departements` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `prodi`, `created_at`, `updated_at`) VALUES
('8840622c-138b-11ef-a261-acde48001122', '9c0e84c8-91ba-40b9-a696-fb2b94d67239', 'jhjhjh', '2024-05-16 13:52:18', '2024-05-16 13:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_empat_bulan`
--

CREATE TABLE `evaluasi_empat_bulan` (
  `id` char(36) NOT NULL,
  `absensi_id` char(36) NOT NULL,
  `departement_id` char(36) NOT NULL,
  `performa` varchar(255) NOT NULL,
  `actual_point` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `range` varchar(255) NOT NULL,
  `strong_point` varchar(255) NOT NULL,
  `weakness_point` varchar(255) NOT NULL,
  `development_skill` varchar(255) NOT NULL,
  `development_knowledge` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `logbook`
--

CREATE TABLE `logbook` (
  `id` char(36) NOT NULL,
  `mahasiswa_id` char(36) NOT NULL,
  `week` varchar(255) NOT NULL,
  `mounth` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tool_used` varchar(255) DEFAULT NULL,
  `safety_key_point` varchar(255) DEFAULT NULL,
  `problem_solf` varchar(255) DEFAULT NULL,
  `hyarihatto` varchar(255) DEFAULT NULL,
  `point_to_remember` varchar(255) DEFAULT NULL,
  `self_evaluation` varchar(255) DEFAULT NULL,
  `komentar_mentor` varchar(255) DEFAULT NULL,
  `status` enum('pending','accept','reject') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logbook`
--

INSERT INTO `logbook` (`id`, `mahasiswa_id`, `week`, `mounth`, `gambar`, `keterangan`, `tool_used`, `safety_key_point`, `problem_solf`, `hyarihatto`, `point_to_remember`, `self_evaluation`, `komentar_mentor`, `status`, `created_at`, `updated_at`) VALUES
('9c0eaf93-e3a6-4d3b-a2ec-7732da6524ac', '9c0eae25-5167-4bd6-9bd4-f1a1d767a792', '3', 'May', NULL, 'hgjhsdjhdfs', NULL, NULL, NULL, NULL, NULL, '2', NULL, 'pending', '2024-05-16 07:14:51', '2024-05-16 07:14:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `mentor_id` char(36) NOT NULL,
  `dosen_id` char(36) NOT NULL,
  `noreg_vokasi` bigint(20) DEFAULT NULL,
  `batch` bigint(20) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `shop` varchar(255) DEFAULT NULL,
  `line` varchar(255) DEFAULT NULL,
  `pos` varchar(255) DEFAULT NULL,
  `shift` enum('white','red') NOT NULL DEFAULT 'white',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `mentor_id`, `dosen_id`, `noreg_vokasi`, `batch`, `divisi`, `shop`, `line`, `pos`, `shift`, `created_at`, `updated_at`) VALUES
('9c0eae25-5167-4bd6-9bd4-f1a1d767a792', '9c0e84c8-91ba-40b9-a696-fb2b94d67239', '9c0e97db-5c56-4b1f-a1cd-763341b6b7e9', '8840622c-138b-11ef-a261-acde48001122', NULL, NULL, NULL, 'test', NULL, NULL, 'white', '2024-05-16 07:10:51', '2024-05-16 07:10:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentors`
--

CREATE TABLE `mentors` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `section_id` char(36) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `leader` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mentors`
--

INSERT INTO `mentors` (`id`, `user_id`, `section_id`, `no_telp`, `leader`, `created_at`, `updated_at`) VALUES
('9c0e97db-5c56-4b1f-a1cd-763341b6b7e9', '9c0e84c8-c623-42fa-bf5a-bc838bcb5b9b', NULL, NULL, 'sanusa', '2024-05-16 06:08:32', '2024-05-16 06:08:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_04_085143_create_departement_table', 1),
(6, '2024_05_04_085337_create_section_table', 1),
(7, '2024_05_04_085549_create_mentor_table', 1),
(8, '2024_05_04_085550_create_dosen_table', 1),
(9, '2024_05_04_085925_create_mahasiswa_table', 1),
(10, '2024_05_04_090353_create_absensi_table', 1),
(11, '2024_05_04_090910_create_logbook_table', 1),
(12, '2024_05_04_091912_create_evaluasi_empat_bulan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parafs`
--

CREATE TABLE `parafs` (
  `id` char(36) NOT NULL,
  `mentor_id` char(36) NOT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_mentors`
--

CREATE TABLE `pengajuan_mentors` (
  `id` char(36) NOT NULL,
  `mahasiswa_id` char(36) NOT NULL,
  `mentor_pertama` char(36) NOT NULL,
  `mentor_kedua` char(36) NOT NULL,
  `status` enum('pending','accept','reject') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `sections`
--

CREATE TABLE `sections` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `departement_id` char(36) NOT NULL,
  `section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id` char(36) NOT NULL,
  `mahasiswa_id` char(36) NOT NULL,
  `presentasi_final` varchar(255) DEFAULT NULL,
  `laporan_ta` varchar(255) DEFAULT NULL,
  `report_a3` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `nomor_induk` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto_profile` varchar(255) NOT NULL DEFAULT 'defalut.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','departement','section','mahasiswa','mentor','dosen') NOT NULL DEFAULT 'mahasiswa',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nomor_induk`, `nama`, `email`, `no_telp`, `alamat`, `foto_profile`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('9c0e84c8-6c92-4eb4-a0f0-cfe5d2c4bcc1', '2024', 'Admin Akti', NULL, '', '', '', NULL, 'admin', '$2y$10$noH96CN1mjExwAyB.8o20ejelVGmjTCJXH99Nh3nrT.1.PDrjctCy', NULL, '2024-05-16 05:15:12', '2024-05-16 05:15:12'),
('9c0e84c8-91ba-40b9-a696-fb2b94d67239', '123456', 'Jono Akti', NULL, '872626378482', 'Karawang', '1715863462.png', NULL, 'mahasiswa', '$2y$10$KazyXgSwCFW4oH8gLO41v.mbRF3jnHOZ1oyHYVyygzo.z1aOGrSE6', NULL, '2024-05-16 05:15:12', '2024-05-16 05:44:22'),
('9c0e84c8-abf7-4afb-a85f-faf89007f17b', '18801980', 'Joni Akti', NULL, '', '', '', NULL, 'departement', '$2y$10$VVw0o1qz5wfBeWoUnmmMSe2yHpqqfBGq9RStAYjtX7sIxwqsakz.a', NULL, '2024-05-16 05:15:12', '2024-05-16 05:15:12'),
('9c0e84c8-c623-42fa-bf5a-bc838bcb5b9b', '11223344', 'Aziz Fatkhu Rohman', NULL, '82736276327', 'Karawang', '1715866996.jpg', NULL, 'mentor', '$2y$10$ioyPH/U/a2CGj5LNoDQSdeS23Lt6gLHrRDzJH5LJFSCcZTfGTWzqG', NULL, '2024-05-16 05:15:12', '2024-05-16 06:43:16'),
('9c0e84c8-e0a3-47f0-908a-9cb681527c38', '12201920', 'Rahmat Akti', NULL, '', '', '', NULL, 'section', '$2y$10$4vNui1KFqGWAfYoiUfTf8OJ0RMEcaZZ3URZqpJ/coxOutCo6/1Xbu', NULL, '2024-05-16 05:15:12', '2024-05-16 05:15:12'),
('9c0e84c8-fadc-4b9a-869a-cd0d4d7e3175', '19952025', 'Akmal Akti', NULL, '', '', '', NULL, 'dosen', '$2y$10$/Ngjl.PkKGcALGhJWAN6S.rl3FVn3SLjry8zjJIlM0IcKkGYMxuI.', NULL, '2024-05-16 05:15:12', '2024-05-16 05:15:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `evaluasi_empat_bulan`
--
ALTER TABLE `evaluasi_empat_bulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasi_empat_bulan_absensi_id_foreign` (`absensi_id`),
  ADD KEY `evaluasi_empat_bulan_departement_id_foreign` (`departement_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logbook_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswa_mentor_id_foreign` (`mentor_id`),
  ADD KEY `mahasiswa_dosen_id_foreign` (`dosen_id`);

--
-- Indeks untuk tabel `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentors_user_id_foreign` (`user_id`),
  ADD KEY `mentors_section_id_foreign` (`section_id`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_user_id_foreign` (`user_id`),
  ADD KEY `sections_departement_id_foreign` (`departement_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `evaluasi_empat_bulan`
--
ALTER TABLE `evaluasi_empat_bulan`
  ADD CONSTRAINT `evaluasi_empat_bulan_absensi_id_foreign` FOREIGN KEY (`absensi_id`) REFERENCES `absensi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluasi_empat_bulan_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `logbook_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mentors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
