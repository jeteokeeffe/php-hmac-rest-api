php-hmac-rest-api
=================

PHP HMAC Restful API that uses Phalcon Micro framework

Required PHP Modules
- OpenSSL
- Phalcon
- PDO-MySQL


To check for those modules
php -m | egrep "(phalcon|pdo_mysql|openssl)"

#1 - Add the proper database credentials to connect to MySQL
php-hmac-rest-api/app/config.php

#2 - Add the proper tables to your schema/database (by default, the schema is "api")
mysql -u root -p api < php-hmac-rest-api/data.sql

How to test the client

Open client-connect.php and make sure the host is pointed to the proper url.

php client-connect.php



