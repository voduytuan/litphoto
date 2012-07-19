-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2012 at 08:36 PM
-- Server version: 5.5.23
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `litphoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `lit_ac_user`
--

CREATE TABLE IF NOT EXISTS `lit_ac_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_fullname` varchar(50) NOT NULL,
  `u_groupid` smallint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`),
  KEY `u_fullname` (`u_fullname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lit_ac_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `lit_ac_user_profile`
--

CREATE TABLE IF NOT EXISTS `lit_ac_user_profile` (
  `u_id` int(11) NOT NULL,
  `up_email` varchar(50) NOT NULL,
  `up_password` text NOT NULL,
  `up_datecreated` int(10) NOT NULL,
  `up_datemodified` int(10) NOT NULL,
  PRIMARY KEY (`u_id`),
  KEY `up_email` (`up_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lit_ac_user_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `lit_moderator_log`
--

CREATE TABLE IF NOT EXISTS `lit_moderator_log` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `ml_id` int(11) NOT NULL AUTO_INCREMENT,
  `ml_ipaddress` int(11) NOT NULL,
  `ml_type` varchar(30) NOT NULL,
  `ml_mainid` bigint(20) NOT NULL,
  `ml_serialized_data` text NOT NULL,
  `ml_datecreated` int(10) NOT NULL,
  PRIMARY KEY (`ml_id`),
  KEY `u_id` (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lit_moderator_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `lit_photo`
--

CREATE TABLE IF NOT EXISTS `lit_photo` (
  `u_id` int(11) NOT NULL,
  `pc_id` smallint(3) NOT NULL,
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_filepath` varchar(255) NOT NULL,
  `p_enable` tinyint(1) NOT NULL DEFAULT '1',
  `p_countcomment` int(11) NOT NULL DEFAULT '0',
  `p_datecreated` int(10) NOT NULL,
  `p_datemodified` int(10) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `u_id` (`u_id`),
  KEY `pc_id` (`pc_id`),
  KEY `p_enable` (`p_enable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lit_photo`
--


-- --------------------------------------------------------

--
-- Table structure for table `lit_photo_category`
--

CREATE TABLE IF NOT EXISTS `lit_photo_category` (
  `pc_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `pc_title` varchar(128) NOT NULL,
  `pc_slug` varchar(100) NOT NULL,
  `pc_description` text NOT NULL,
  `pc_enable` tinyint(1) NOT NULL DEFAULT '1',
  `pc_displayorder` smallint(3) NOT NULL DEFAULT '0',
  `pc_parentid` smallint(3) NOT NULL DEFAULT '0',
  `pc_datecreated` int(10) NOT NULL,
  `pc_datemodified` int(10) NOT NULL,
  PRIMARY KEY (`pc_id`),
  KEY `pc_displayorder` (`pc_displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lit_photo_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `lit_photo_comment`
--

CREATE TABLE IF NOT EXISTS `lit_photo_comment` (
  `p_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_fullname` varchar(50) NOT NULL,
  `pc_email` varchar(50) NOT NULL,
  `pc_website` varchar(50) NOT NULL,
  `pc_text` text NOT NULL,
  `pc_status` tinyint(1) NOT NULL DEFAULT '0',
  `pc_ipaddress` int(11) NOT NULL,
  `pc_datecreated` int(10) NOT NULL,
  `pc_datemodified` int(10) NOT NULL,
  PRIMARY KEY (`pc_id`),
  KEY `p_id` (`p_id`),
  KEY `pc_status` (`pc_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `lit_photo_comment`
--


-- --------------------------------------------------------

--
-- Table structure for table `lit_sess`
--

CREATE TABLE IF NOT EXISTS `lit_sess` (
  `s_id` varchar(32) NOT NULL,
  `s_data` text NOT NULL,
  `s_agent` varchar(200) NOT NULL,
  `s_ipaddress` int(10) NOT NULL,
  `s_hash` varchar(32) NOT NULL,
  `s_userid` int(11) NOT NULL,
  `s_controller` varchar(30) NOT NULL,
  `s_action` varchar(15) NOT NULL,
  `s_datecreated` int(10) NOT NULL,
  `s_dateexpired` int(10) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `s_userid` (`s_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lit_sess`
--

