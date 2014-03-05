-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2014 at 04:17 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `centennial`
--

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `id` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `friday` int(1) unsigned NOT NULL DEFAULT '0',
  `tour` int(1) unsigned NOT NULL DEFAULT '0',
  `celeb` int(1) unsigned NOT NULL DEFAULT '0',
  `saturday` int(1) unsigned NOT NULL DEFAULT '0',
  `concert` int(1) unsigned NOT NULL DEFAULT '0',
  `faith` int(1) unsigned NOT NULL DEFAULT '0',
  `snack` int(1) unsigned NOT NULL DEFAULT '0',
  `cloth` int(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
