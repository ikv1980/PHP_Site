-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ����� ��������: ��� 16 2011 �., 13:39
-- ������ �������: 5.0.18
-- ������ PHP: 5.1.6
-- 
-- ��: `chat`
-- 

-- --------------------------------------------------------

-- 
-- ��������� ������� `messages`
-- 

CREATE TABLE `messages` (
  `id` int(5) NOT NULL auto_increment,
  `login` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=19 ;


-- --------------------------------------------------------

-- 
-- ��������� ������� `users`
-- 

CREATE TABLE `users` (
  `id` int(5) NOT NULL auto_increment,
  `login` varchar(200) NOT NULL,
  `password` varchar(400) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

        