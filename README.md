php-hmac-rest-api
=================

PHP HMAC Restful API that uses Phalcon Micro framework

The framework requires PHP 5.4+ (Could run on 5.3 if you replace 5.4 array syntax with the older php version)

Requirements
---------
PHP 5.4 or greater


Required PHP Modules
- OpenSSL
- Phalcon
- PDO-MySQL


To check for those modules
```bash
php -m | egrep "(phalcon|pdo_mysql|openssl)"
```

Database Configuration
--------------
Open  `php-hmac-rest-api/app/config.php` and setup your database connection credentials

```php
$settings = array(
        'database' => array(
                'adapter' => 'Mysql',
                'host' => 'localhost',
                'username' => 'test',
                'password' => 'test',
                'name' => 'api',
                'port' => 3306
        ),
);
```

Import the tables into your mysql database
```bash
mysql -u root -p api < php-hmac-rest-api/data.sql
```

Client Requirements
-------------
PHP 5.3

Required PHP Modules
- Curl

To check for that module
```bash
php -m | egrep "(curl)"
```


Client Test
-------------

Open `php-hmac-rest-api/client-connect.php` and make sure the host is pointed to the proper url.

```bash
php client-connect.php
```
