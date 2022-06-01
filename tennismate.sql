-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Haz 2022, 13:58:57
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tennismate`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aktifoyunlar`
--

CREATE TABLE `aktifoyunlar` (
  `oyunID` int(11) NOT NULL,
  `kurucuID` int(11) NOT NULL,
  `kurucuİsim` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `saat` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `seviye` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `durum` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `aktifoyunlar`
--

INSERT INTO `aktifoyunlar` (`oyunID`, `kurucuID`, `kurucuİsim`, `tarih`, `saat`, `seviye`, `durum`) VALUES
(1022, 1011, 'Sinem', '2022-05-26', '15:00', 'Başlangıç', 0),
(1023, 1010, 'Keremcan', '2022-05-29', '12:00', 'Orta', 0),
(1024, 1010, 'Keremcan', '2022-05-02', '18:00', 'Başlangıç', 0),
(1025, 1010, 'Keremcan', '2022-05-09', '15:00', 'Orta', 0),
(1026, 1010, 'Keremcan', '2022-05-29', '15:00', 'Orta', 0),
(1027, 1015, 'Abdullah', '2022-05-28', '22:59', 'Orta', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degerlendirme`
--

CREATE TABLE `degerlendirme` (
  `degerlendirmeID` int(11) NOT NULL,
  `etkinlikID` int(11) NOT NULL,
  `puanlayan` int(11) NOT NULL,
  `puanlanan` int(11) NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `puan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `degerlendirme`
--

INSERT INTO `degerlendirme` (`degerlendirmeID`, `etkinlikID`, `puanlayan`, `puanlanan`, `yorum`, `puan`) VALUES
(32, 1022, 1010, 1011, 'Deneme 1', 5),
(33, 1022, 1011, 1010, 'Deneme 2', 1),
(34, 1024, 1010, 1012, 'q', 2),
(35, 1023, 1012, 1010, '55', 1),
(36, 1026, 1010, 1011, '559', 5),
(37, 1026, 1011, 1010, 'krenm', 1),
(38, 1027, 1015, 1012, 'Harika oyundu çok eğlendim', 5),
(39, 1027, 1012, 1015, 'Beklediğimden daha iyi bir oyuncu', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyunistek`
--

CREATE TABLE `oyunistek` (
  `istekID` int(11) NOT NULL,
  `oyunID` int(11) NOT NULL,
  `sahipID` int(11) NOT NULL,
  `uyeID` int(11) NOT NULL,
  `uyePosta` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `uyeAD` varchar(20) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyunonay`
--

CREATE TABLE `oyunonay` (
  `islemID` int(11) NOT NULL,
  `etkinlikID` int(11) NOT NULL,
  `katilimciID` int(11) NOT NULL,
  `kurucuID` int(11) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '1',
  `kurucuPuan` int(1) NOT NULL DEFAULT '0',
  `katilimciPuan` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `oyunonay`
--

INSERT INTO `oyunonay` (`islemID`, `etkinlikID`, `katilimciID`, `kurucuID`, `durum`, `kurucuPuan`, `katilimciPuan`) VALUES
(24, 1022, 1010, 1011, 0, 1, 1),
(25, 1023, 1011, 1010, 0, 1, 1),
(26, 1023, 1012, 1010, 0, 1, 1),
(27, 1025, 1011, 1010, 0, 1, 1),
(28, 1024, 1012, 1010, 0, 1, 1),
(29, 1026, 1011, 1010, 0, 1, 1),
(30, 1027, 1012, 1015, 0, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `uyeID` int(11) NOT NULL,
  `uyeAd` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `uyeSoyad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `uyeMail` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `uyeSifre` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `seviye` varchar(22) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Amatör',
  `uyeResim` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'kullanici.png',
  `biyografi` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Belirsiz'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`uyeID`, `uyeAd`, `uyeSoyad`, `uyeMail`, `uyeSifre`, `seviye`, `uyeResim`, `biyografi`) VALUES
(1010, 'Keremcan', 'Çavdar', 'kerem@gmail.com', '3545', 'Amatör', 'kerem.jpeg', 'Boş vakitlerimde tenis oynayarak yeni insanlar tanıyorum. Bu vakitleri değerlendiriyorum.'),
(1011, 'Sinem', 'Kocasu', 'sinem@gmail.com', '3545', 'İleri Düzey', 'sinem.jpg', 'Tenis en sevdiğim hobim. Oynarken çok keyif alıyorum.'),
(1012, 'Samed', 'Olgun', 'samed@gmail.com', '3545', 'Orta', 'samed.jpg', 'Yeni bir aktivite keşfettim ve boş vakitlerimde oynuyorum.'),
(1013, 'Ahmet', 'Hasan', 'ahmet@gmail.com', '3545', 'Amatör', 'kullanici.png', ''),
(1014, 'Ceren', 'Hayat', 'ceren@gmail.com', '123456', 'Başlangıç', 'kullanici.png', 'Tenis aşığı biriyim  ama şu sıralar   '),
(1015, 'Abdullah', 'Kara', 'samed@hotmail.com', '123', 'Orta Düzey', 'kullanici.png', 'Orta seviye tenis oyuncusuyum');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aktifoyunlar`
--
ALTER TABLE `aktifoyunlar`
  ADD PRIMARY KEY (`oyunID`);

--
-- Tablo için indeksler `degerlendirme`
--
ALTER TABLE `degerlendirme`
  ADD PRIMARY KEY (`degerlendirmeID`);

--
-- Tablo için indeksler `oyunistek`
--
ALTER TABLE `oyunistek`
  ADD PRIMARY KEY (`istekID`);

--
-- Tablo için indeksler `oyunonay`
--
ALTER TABLE `oyunonay`
  ADD PRIMARY KEY (`islemID`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`uyeID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aktifoyunlar`
--
ALTER TABLE `aktifoyunlar`
  MODIFY `oyunID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- Tablo için AUTO_INCREMENT değeri `degerlendirme`
--
ALTER TABLE `degerlendirme`
  MODIFY `degerlendirmeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `oyunistek`
--
ALTER TABLE `oyunistek`
  MODIFY `istekID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `oyunonay`
--
ALTER TABLE `oyunonay`
  MODIFY `islemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `uyeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
