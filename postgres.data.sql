
CREATE TABLE `api` (
  `client_id` SERIAL,
  `public_id` char(64) NOT NULL DEFAULT '',
  `private_key` char(64) NOT NULL DEFAULT '',
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  UNIQUE(private_key),
  UNIQUE(public_id)
) ;

INSERT INTO api SET private_key = '593fe6ed77014f9507761028801aa376f141916bd26b1b3f0271b5ec3135b989';

CREATE TABLE runtimeError (
	error_id SERIAL,
	title varchar(2048) NOT NULL DEFAULT '', 
	file varchar(1024) DEFAULT '', 
	line integer DEFAULT NULL,
	error_type integer NOT NULL DEFAULT '0',
	create_time timestamp DEFAULT NULL,
	server_name varchar(100) DEFAULT NULL,
	execution_script varchar(1024) NOT NULL DEFAULT '', 
	pid integer NOT NULL DEFAULT '0',
	ip_address varchar(16) DEFAULT NULL,
	user_id integer DEFAULT NULL
) ;

CREATE TABLE queryError (
  error_id SERIAL,
  query text,
  file varchar(1024) DEFAULT '',
  line integer  DEFAULT NULL,
  error_string varchar(1024) DEFAULT '',
  error_no integer  DEFAULT NULL,
  create_time TIMESTAMP DEFAULT NULL,
  execution_script varchar(1024) DEFAULT '',
  pid integer  NOT NULL DEFAULT '0',
  ip_address varchar(16) DEFAULT NULL,
  user_id integer  DEFAULT NULL
) ;
