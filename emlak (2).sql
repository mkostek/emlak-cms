-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Oca 2019, 19:30:54
-- Sunucu sürümü: 5.7.17
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emlak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfoy`
--

CREATE TABLE `portfoy` (
  `pId` int(11) NOT NULL,
  `alan` int(11) DEFAULT NULL,
  `fiyat` mediumint(9) DEFAULT NULL,
  `satilik` bit(1) DEFAULT NULL,
  `aciklama` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `adres` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `pId` int(11) DEFAULT NULL,
  `resimId` int(11) NOT NULL,
  `resimKonum` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `parola` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userId`, `username`, `parola`) VALUES
(1, 'admin', '123456789'),
(2, 'mkostek', '10n0066');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `portfoy`
--
ALTER TABLE `portfoy`
  ADD PRIMARY KEY (`pId`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`resimId`),
  ADD KEY `fk` (`pId`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `portfoy`
--
ALTER TABLE `portfoy`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `resimId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
