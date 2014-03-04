-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 11:13 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `centennial`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `omni` int(1) unsigned NOT NULL DEFAULT '0',
  `vegy` int(1) unsigned NOT NULL DEFAULT '0',
  `vega` int(1) unsigned NOT NULL DEFAULT '0',
  `lu_fr_omni` int(1) unsigned NOT NULL DEFAULT '0',
  `lu_fr_vegy` int(1) unsigned NOT NULL DEFAULT '0',
  `lu_fr_vega` int(1) unsigned NOT NULL DEFAULT '0',
  `di_fr_omni` int(1) unsigned NOT NULL DEFAULT '0',
  `di_fr_vegy` int(1) unsigned NOT NULL DEFAULT '0',
  `di_fr_vega` int(1) unsigned NOT NULL DEFAULT '0',
  `lu_sa_omni` int(1) unsigned NOT NULL DEFAULT '0',
  `lu_sa_vegy` int(1) unsigned NOT NULL DEFAULT '0',
  `lu_sa_vega` int(1) unsigned NOT NULL DEFAULT '0',
  `di_sa_omni` int(1) unsigned NOT NULL DEFAULT '0',
  `di_sa_vegy` int(1) unsigned NOT NULL DEFAULT '0',
  `di_sa_vega` int(1) unsigned NOT NULL DEFAULT '0',
  `snack_omni` int(1) unsigned NOT NULL DEFAULT '0',
  `snack_vegy` int(1) unsigned NOT NULL DEFAULT '0',
  `snack_vega` int(1) unsigned NOT NULL DEFAULT '0',
  `other` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
