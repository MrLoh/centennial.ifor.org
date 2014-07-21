-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 11:14 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `centennial`
--

-- --------------------------------------------------------

--
-- Table structure for table `interpretation`
--

CREATE TABLE `interpretation` (
  `id` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` char(255) NOT NULL DEFAULT '',
  `en_de` int(1) unsigned NOT NULL DEFAULT '0',
  `en_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `en_es` int(1) unsigned NOT NULL DEFAULT '0',
  `de_en` int(1) unsigned NOT NULL DEFAULT '0',
  `de_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `de_es` int(1) unsigned NOT NULL DEFAULT '0',
  `fr_en` int(1) unsigned NOT NULL DEFAULT '0',
  `fr_de` int(1) unsigned NOT NULL DEFAULT '0',
  `fr_es` int(1) unsigned NOT NULL DEFAULT '0',
  `es_en` int(1) unsigned NOT NULL DEFAULT '0',
  `es_de` int(1) unsigned NOT NULL DEFAULT '0',
  `es_fr` int(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
