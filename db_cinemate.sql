-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Haz 2023, 20:45:46
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db_cinemate`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `films`
--

INSERT INTO `films` (`id`, `title`, `description`, `image`) VALUES
(10, 'Film 1', 'Film 1 hakkında kısa açıklama.', 'Images/film1.jpg'),
(11, 'Film 2', 'Film 2 hakkında kısa açıklama.', 'Images/film2.jpg'),
(12, 'Film 3', 'Film 3 hakkında kısa açıklama.', 'Images/film3.jpg'),
(13, 'Film 4', 'Film 4 hakkında kısa açıklama.', 'Images/film4.jpeg'),
(14, 'Film 5', 'Film 5 hakkında kısa açıklama.', 'Images/film5.jpeg'),
(15, 'Film 6', 'Film 6 hakkında kısa açıklama.', 'Images/film6.jpeg'),
(16, 'Film 7', 'Film 7 hakkında kısa açıklama.', 'Images/film7.jpeg'),
(17, 'Film 8', 'Film 8 hakkında kısa açıklama.', 'Images/film8.jpeg'),
(18, 'Film 9', 'Film 9 hakkında kısa açıklama.', 'Images/fim9.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `room_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_number`, `room_description`) VALUES
(1, 'Room 1', 'This room is located on the ground floor.'),
(2, 'Room 2', 'This room is located on the first floor.'),
(3, 'Room 3', 'This room is located on the second floor.'),
(4, 'Room 4', 'This room is located on the third floor.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `id` int(6) UNSIGNED NOT NULL,
  `film` varchar(255) NOT NULL,
  `session` varchar(50) NOT NULL,
  `seat` varchar(50) NOT NULL,
  `user_id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tongues`
--

CREATE TABLE `tongues` (
  `tongue_id` int(11) NOT NULL,
  `tongue_rf` varchar(50) DEFAULT NULL,
  `tongue_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tongues`
--

INSERT INTO `tongues` (`tongue_id`, `tongue_rf`, `tongue_name`) VALUES
(1, 'ar', 'Arabic'),
(2, 'cs', 'Czech'),
(3, 'da', 'Danish'),
(4, 'de', 'German'),
(5, 'en', 'English'),
(6, 'es', 'Spanish'),
(7, 'fi', 'Finnish'),
(8, 'fr', 'French'),
(9, 'hu', 'Hungarian'),
(10, 'it', 'Italian'),
(11, 'ja', 'Japanese'),
(12, 'ko', 'Korean'),
(13, 'nl', 'Dutch'),
(14, 'no', 'Norwegian'),
(15, 'pl', 'Polish'),
(16, 'pt', 'Portuguese'),
(17, 'ro', 'Romanian'),
(18, 'ru', 'Russian'),
(19, 'sv', 'Swedish'),
(20, 'tr', 'Turkish'),
(21, 'zh', 'Chinese');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_tongue_id` int(11) NOT NULL,
  `balance` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_email`, `user_phone`, `user_password`, `user_tongue_id`, `balance`) VALUES
(1, 'John', 'Doe', 'john@example.com', '123456789', 'f9e97c43fa827f3b0b9e8c899b13af17a8ae73f6fba9e171f69c0e3c4c44f19f', 1, 0),
(2, 'Jane', 'Smith', 'jane@example.com', '987654321', 'a35c1ff1f98a2d961d1e17e78d4f4d9b3987e0b9033d22969a26f1867182a897', 2, 0),
(3, 'David', 'Johnson', 'david@example.com', '555555555', 'f1355cb3eabf0f3d872a5d37702f6db122ad7e11eae8bda8d7d4d446a90492e6', 1, 0),
(4, 'Emily', 'Brown', 'emily@example.com', '999999999', 'a35c1ff1f98a2d961d1e17e67d4f4d9b3987e0b9033d22969a26f1867182a897', 3, 0),
(5, 'Michael', 'Davis', 'michael@example.com', '111111111', 'f1355cb3eabf0f3d872a5d38902f6db122ad7e11eae8bda8d7d4d446a90492e6', 2, 0),
(8, 'Moussa', 'Bane', 'banemoussa2001@gmail.com', '05446778342', '1843e542dc829a1cbbc4613e2716e0f8a37b8d665e534a4316fe2596bc24a3a5', 8, 0),
(9, 'Personel01', 'Personel_01', 'personel01@personel.gmail.com', '05446778320', '8d44fcd237930ad1390043b9a506b180547cc0314c3d343027217a6f1b75297f', 20, 0),
(10, 'talha', 'ramadan', 'talha_ramadan@hotmail.com', '123123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, -8);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `tongues`
--
ALTER TABLE `tongues`
  ADD PRIMARY KEY (`tongue_id`),
  ADD UNIQUE KEY `tongue_rf` (`tongue_rf`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `tongues`
--
ALTER TABLE `tongues`
  MODIFY `tongue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
