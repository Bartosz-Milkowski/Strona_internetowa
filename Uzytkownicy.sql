-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2019, 12:42
-- Wersja serwera: 10.3.18-MariaDB-50+deb10u1.cba
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mb41449`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uzytkownicy`
--

CREATE TABLE `Uzytkownicy` (
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Uzytkownicy`
--

INSERT INTO `Uzytkownicy` (`login`, `haslo`, `uprawnienia`, `imie`, `nazwisko`) VALUES
('baba', 'abc', 2, 'tfhuyjtfg', 'jfjufrtuj'),
('kolo', 'abc', 2, 'hftyrjuyderxhuy', 'jyfjfjfki'),
('kozak', 'abc', 3, 'jyfkjmytg', 'ktrckicr'),
('adminfajny', 'takiehaslo', 4, 'Adam', 'Takijaki'),
('Takilogin', 'abc', 4, 'srfhgrsh', 'hderfthedrtfh'),
('ziomek', 'abcdefg', 1, 'Gustaw', 'Berek'),
('Milka27', 'bartekbartek', 2, 'MaÅ‚gorzata', 'Milko'),
('Fajnynick', 'takiehaslo', 1, 'fjftjxcjt', 'frtcjrtjuctju'),
('dobrydzien', 'takiehaslo', 0, 'herdthredhre', 'herdjhtredjht'),
('alejaja', 'takiehaslo', 4, 'Gustaw', 'hjtfjjtfj'),
('korneli', 'takiehaslo', 0, 'gustaw', 'baba'),
('facetgg', 'takiehaslo', 3, 'hdrhrdh', 'hdrhdr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
