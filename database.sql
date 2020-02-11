-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Şub 2020, 15:20:42
-- Sunucu sürümü: 10.1.44-MariaDB
-- PHP Sürümü: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `crm_freelancer`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_contacts`
--

CREATE TABLE `customer_contacts` (
  `contact_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_mobile` varchar(100) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_list`
--

CREATE TABLE `customer_list` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_surname` varchar(100) NOT NULL,
  `customer_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_notes`
--

CREATE TABLE `customer_notes` (
  `note_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `note_content` varchar(10000) NOT NULL,
  `note_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event_list`
--

CREATE TABLE `event_list` (
  `event_id` int(11) NOT NULL,
  `event_detail` varchar(200) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_categories`
--

CREATE TABLE `project_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `project_categories`
--

INSERT INTO `project_categories` (`category_id`, `category_name`) VALUES
(1, 'Default');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_detail`
--

CREATE TABLE `project_detail` (
  `project_id` int(11) NOT NULL,
  `project_category` int(11) NOT NULL,
  `project_detail` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_list`
--

CREATE TABLE `project_list` (
  `project_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_budget` int(11) NOT NULL,
  `isOpportunity` tinyint(1) NOT NULL,
  `isFinished` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_stages`
--

CREATE TABLE `project_stages` (
  `stages_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stages_detail` varchar(10000) NOT NULL,
  `stages_deadline` date NOT NULL,
  `stages_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings_list`
--

CREATE TABLE `settings_list` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(250) NOT NULL,
  `setting_value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings_list`
--

INSERT INTO `settings_list` (`setting_id`, `setting_name`, `setting_value`) VALUES
(1, 'currency', 'TL');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transaction_list`
--

CREATE TABLE `transaction_list` (
  `transaction_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_list`
--

CREATE TABLE `user_list` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_list`
--

INSERT INTO `user_list` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin', '$2y$10$9W3fN901dgCp6isGm8qSU.HrHF/rlHIeMDidf3r4yADplp4Xjo4rO');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `customer_contacts`
--
ALTER TABLE `customer_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`customer_id`);

--
-- Tablo için indeksler `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Tablo için indeksler `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`event_id`);

--
-- Tablo için indeksler `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `project_detail`
--
ALTER TABLE `project_detail`
  ADD UNIQUE KEY `project_id` (`project_id`);

--
-- Tablo için indeksler `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`project_id`);

--
-- Tablo için indeksler `project_stages`
--
ALTER TABLE `project_stages`
  ADD PRIMARY KEY (`stages_id`);

--
-- Tablo için indeksler `settings_list`
--
ALTER TABLE `settings_list`
  ADD PRIMARY KEY (`setting_id`);

--
-- Tablo için indeksler `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Tablo için indeksler `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `customer_contacts`
--
ALTER TABLE `customer_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `customer_notes`
--
ALTER TABLE `customer_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `event_list`
--
ALTER TABLE `event_list`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `project_list`
--
ALTER TABLE `project_list`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `stages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `settings_list`
--
ALTER TABLE `settings_list`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `transaction_list`
--
ALTER TABLE `transaction_list`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user_list`
--
ALTER TABLE `user_list`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
