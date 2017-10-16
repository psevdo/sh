-- PBDRyVRZ

CREATE TABLE IF NOT EXISTS `sh_event` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `icon_class` varchar(50) NOT NULL DEFAULT 'event1',
  `type` enum('stable','unstable') NOT NULL DEFAULT 'unstable',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `onmain` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'показывать на главной странице',
  `ondropdownmenu` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `male_only` tinyint(1) NOT NULL DEFAULT '0',
  `female_only` tinyint(1) NOT NULL DEFAULT '0',
  `date_stable` tinyint(1) NOT NULL DEFAULT '1',
  `day` smallint(6) NOT NULL,
  `month` smallint(6) NOT NULL,
  `age_min` smallint(6) NOT NULL DEFAULT '0',
  `age_max` smallint(6) NOT NULL DEFAULT '0',
  `page_title` varchar(300) NOT NULL,
  `page_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_ext` varchar(5) NOT NULL,
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `tag_title` text NOT NULL,
  `metaKeywords` text NOT NULL,
  `metaDescription` text NOT NULL,
  `giftsTitle` varchar(200) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `yandexAd_1` text NOT NULL,
  `yandexAd_2` text NOT NULL,
  `yandexAd_3` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=390 ;

CREATE TABLE IF NOT EXISTS `sh_event_gift` (
  `eventId` smallint(6) NOT NULL,
  `giftId` int(11) NOT NULL,
  PRIMARY KEY (`eventId`,`giftId`),
  KEY `eventId` (`eventId`),
  KEY `giftId` (`giftId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sh_gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_ext` varchar(5) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `rating` int(11) NOT NULL DEFAULT '0',
  `intro_text` text NOT NULL,
  `tag_title` text NOT NULL,
  `tag_description` text NOT NULL,
  `description` text NOT NULL,
  `price_min` double NOT NULL,
  `price_max` double NOT NULL,
  `adminad` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1339 ;

CREATE TABLE IF NOT EXISTS `sh_gift_hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gift_id` (`gift_id`),
  KEY `hobby_id` (`hobby_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2686 ;

CREATE TABLE IF NOT EXISTS `sh_gift_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `page_url` varchar(300) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gift_id` (`gift_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13159 ;

CREATE TABLE IF NOT EXISTS `sh_gift_similar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_id` int(11) NOT NULL,
  `similar_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gift_id` (`gift_id`,`similar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9222 ;

CREATE TABLE IF NOT EXISTS `sh_gift_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `gift_id` (`gift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=216 ;

CREATE TABLE IF NOT EXISTS `sh_hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `sx_male` tinyint(1) NOT NULL DEFAULT '0',
  `sx_female` tinyint(1) NOT NULL DEFAULT '0',
  `sx_all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_log`
--

CREATE TABLE IF NOT EXISTS `sh_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_id` int(11) NOT NULL,
  `action` varchar(10) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5630 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_page`
--

CREATE TABLE IF NOT EXISTS `sh_page` (
  `name` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_selection_description`
--

CREATE TABLE IF NOT EXISTS `sh_selection_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age_min` smallint(6) NOT NULL DEFAULT '0',
  `age_max` smallint(6) NOT NULL DEFAULT '0',
  `event_id` smallint(6) NOT NULL,
  `event_type` enum('stable','unstable') NOT NULL DEFAULT 'unstable' COMMENT 'уже не должно использоваться',
  `page_title_male` varchar(100) NOT NULL,
  `page_title_female` varchar(100) NOT NULL,
  `page_title_all` varchar(100) NOT NULL,
  `intro_male` text NOT NULL,
  `intro_female` text NOT NULL,
  `intro_all` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=510 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_selection_gift`
--

CREATE TABLE IF NOT EXISTS `sh_selection_gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` smallint(6) NOT NULL,
  `gift_id` int(11) NOT NULL,
  `gift_active` tinyint(1) NOT NULL DEFAULT '1',
  `age_min` smallint(6) NOT NULL,
  `age_max` smallint(6) NOT NULL,
  `rating_old` int(11) NOT NULL DEFAULT '0' COMMENT 'позже удалить',
  `sx_male` tinyint(1) NOT NULL DEFAULT '0',
  `sx_female` tinyint(1) NOT NULL DEFAULT '0',
  `sx_all` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `gift_id` (`event_id`,`gift_id`,`age_min`,`age_max`,`sx_male`,`sx_female`,`sx_all`,`rating_old`),
  KEY `gift_id_2` (`gift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7811 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_sel_gift_rating`
--

CREATE TABLE IF NOT EXISTS `sh_sel_gift_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_id` int(11) NOT NULL,
  `age` smallint(6) NOT NULL,
  `sex` enum('male','female','all') NOT NULL,
  `event_id` smallint(6) NOT NULL,
  `rating` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37833 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_sel_gift_stat`
--

CREATE TABLE IF NOT EXISTS `sh_sel_gift_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_id` int(11) NOT NULL COMMENT 'позже удалить',
  `gift_id` int(11) NOT NULL,
  `age` smallint(6) NOT NULL,
  `sex` enum('male','female','all') NOT NULL,
  `age_min` smallint(6) NOT NULL COMMENT 'позже удалить',
  `age_max` smallint(6) NOT NULL COMMENT 'позже удалить',
  `event_id` smallint(6) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=174579 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_settings`
--

CREATE TABLE IF NOT EXISTS `sh_settings` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_shop`
--

CREATE TABLE IF NOT EXISTS `sh_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=198 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_subscription`
--

CREATE TABLE IF NOT EXISTS `sh_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=279 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_subscription_data`
--

CREATE TABLE IF NOT EXISTS `sh_subscription_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` enum('male','female','all') NOT NULL,
  `event_id` smallint(6) NOT NULL,
  `before_0_days` tinyint(1) NOT NULL DEFAULT '1',
  `before_3_days` tinyint(1) NOT NULL DEFAULT '1',
  `before_5_days` tinyint(1) NOT NULL DEFAULT '1',
  `before_7_days` tinyint(1) NOT NULL DEFAULT '1',
  `age` smallint(6) NOT NULL,
  `day` smallint(6) NOT NULL,
  `month` smallint(6) NOT NULL,
  `year` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=620 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sh_user`
--

CREATE TABLE IF NOT EXISTS `sh_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sh_authassignment`
--
ALTER TABLE `sh_authassignment`
  ADD CONSTRAINT `sh_authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `sh_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sh_authitemchild`
--
ALTER TABLE `sh_authitemchild`
  ADD CONSTRAINT `sh_authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `sh_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sh_authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `sh_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sh_event_gift`
--
ALTER TABLE `sh_event_gift`
  ADD CONSTRAINT `sh_event_gift_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `sh_event` (`id`),
  ADD CONSTRAINT `sh_event_gift_ibfk_2` FOREIGN KEY (`giftId`) REFERENCES `sh_gift` (`id`);

--
-- Ограничения внешнего ключа таблицы `sh_gift_hobby`
--
ALTER TABLE `sh_gift_hobby`
  ADD CONSTRAINT `sh_gift_hobby_ibfk_1` FOREIGN KEY (`hobby_id`) REFERENCES `sh_hobby` (`id`),
  ADD CONSTRAINT `sh_gift_hobby_ibfk_2` FOREIGN KEY (`gift_id`) REFERENCES `sh_gift` (`id`);

--
-- Ограничения внешнего ключа таблицы `sh_gift_shop`
--
ALTER TABLE `sh_gift_shop`
  ADD CONSTRAINT `sh_gift_shop_ibfk_1` FOREIGN KEY (`gift_id`) REFERENCES `sh_gift` (`id`),
  ADD CONSTRAINT `sh_gift_shop_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `sh_shop` (`id`);

--
-- Ограничения внешнего ключа таблицы `sh_gift_stat`
--
ALTER TABLE `sh_gift_stat`
  ADD CONSTRAINT `sh_gift_stat_ibfk_1` FOREIGN KEY (`gift_id`) REFERENCES `sh_gift` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
