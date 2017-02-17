-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 17 2017 г., 15:36
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbtest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE `logs` (
  `date` datetime DEFAULT NULL,
  `level` text,
  `message` text,
  `context` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`date`, `level`, `message`, `context`) VALUES
('2017-02-17 17:35:23', 'info', 'Info message', NULL),
('2017-02-17 17:35:23', 'alert', 'Alert message', NULL),
('2017-02-17 17:35:23', 'error', 'Error message', NULL),
('2017-02-17 17:35:23', 'debug', 'Debug message', NULL),
('2017-02-17 17:35:24', 'notice', 'Notice message', NULL),
('2017-02-17 17:35:24', 'warning', 'Warning message', NULL),
('2017-02-17 17:35:24', 'critical', 'Critical message', NULL),
('2017-02-17 17:35:24', 'emergency', 'Emergency message', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
