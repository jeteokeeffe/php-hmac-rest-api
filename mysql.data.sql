CREATE TABLE `api` (
  `client_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `public_id` char(64) NOT NULL DEFAULT '',
  `private_key` char(64) NOT NULL DEFAULT '',
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `private_key` (`private_key`),
  UNIQUE KEY `public_id` (`public_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO api SET private_key = '593fe6ed77014f9507761028801aa376f141916bd26b1b3f0271b5ec3135b989';

CREATE TABLE `runtimeError` (
  `error_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(2048) NOT NULL DEFAULT '',
  `file` varchar(1024) DEFAULT '',
  `line` int(10) unsigned DEFAULT NULL,
  `error_type` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `server_name` varchar(100) DEFAULT NULL,
  `execution_script` varchar(1024) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(16) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`error_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `queryError` (
  `error_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `query` text,
  `file` varchar(1024) DEFAULT '',
  `line` int(10) unsigned DEFAULT NULL,
  `error_string` varchar(1024) DEFAULT '',
  `error_no` int(10) unsigned DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `execution_script` varchar(1024) DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(16) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`error_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

