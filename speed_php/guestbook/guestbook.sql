/*
 * Database: guestbook
 */

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64),
  `contents` varchar(255),
  `name` varchar(32),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='A simple guest book';
