-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 25 Maj 2020, 21:21
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jedi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jedi`
--

CREATE TABLE `jedi` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `metal` int(11) NOT NULL,
  `krysztal` int(11) NOT NULL,
  `coaxium` int(11) NOT NULL,
  `dnipremium` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `jedi`
--

INSERT INTO `jedi` (`id`, `user`, `pass`, `email`, `metal`, `krysztal`, `coaxium`, `dnipremium`) VALUES
(1, 'adam', '$2y$10$6uH9bxpEoXAsMLCmbyDjKeEfDvIGmZzh3iSZRErkjJBf0s7TceSwm', 'adam@gmail.com', 213, 5675, 342, 0),
(2, 'marek', 'asdfg', 'marek@gmail.com', 324, 1123, 4325, 15),
(3, 'marcinszymczyk', '$2y$10$nQ1HdxonRzcorv0x/D.iDeHr3s3zyqGX2Hv7ULMuiycEyaOGRt9s2', 'szymek@gmail.com', 100, 100, 100, 14),
(4, 'Marcin', '$2y$10$b26jsw98mO7PWjOWA5JxdeA91Y165sMKKgvLplbFNnzX/TboiiG/S', 'm.krykwinski@gmail.com', 100, 100, 100, 14),
(5, 'Kamil', '$2y$10$YaolGNDcYU0yErrVi696kOPUogagupxUv.PwcD2H5BQ8Au5ybE3Z6', 'kamil.ek1@vp.pl', 100, 100, 100, 14);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `jedi`
--
ALTER TABLE `jedi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `jedi`
--
ALTER TABLE `jedi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
