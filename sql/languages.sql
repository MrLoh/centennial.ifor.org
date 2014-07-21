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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `de` int(1) unsigned NOT NULL DEFAULT '0',
  `en` int(1) unsigned NOT NULL DEFAULT '0',
  `fr` int(1) unsigned NOT NULL DEFAULT '0',
  `es` int(1) unsigned NOT NULL DEFAULT '0',
  `tour_en` int(1) unsigned NOT NULL DEFAULT '0',
  `friday_en` int(1) unsigned NOT NULL DEFAULT '0',
  `celeb_en` int(1) unsigned NOT NULL DEFAULT '0',
  `saturday_en` int(1) unsigned NOT NULL DEFAULT '0',
  `faith_en` int(1) unsigned NOT NULL DEFAULT '0',
  `tour_de` int(1) unsigned NOT NULL DEFAULT '0',
  `friday_de` int(1) unsigned NOT NULL DEFAULT '0',
  `celeb_de` int(1) unsigned NOT NULL DEFAULT '0',
  `saturday_de` int(1) unsigned NOT NULL DEFAULT '0',
  `faith_de` int(1) unsigned NOT NULL DEFAULT '0',
  `tour_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `friday_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `celeb_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `saturday_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `faith_fr` int(1) unsigned NOT NULL DEFAULT '0',
  `tour_es` int(1) unsigned NOT NULL DEFAULT '0',
  `friday_es` int(1) unsigned NOT NULL DEFAULT '0',
  `celeb_es` int(1) unsigned NOT NULL DEFAULT '0',
  `saturday_es` int(1) unsigned NOT NULL DEFAULT '0',
  `faith_es` int(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
