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
php-hmac-rest-api/app/config.php
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


```bash
mysql -u root -p api < php-hmac-rest-api/data.sql
```

Client Test
-------------

Open client-connect.php and make sure the host is pointed to the proper url.

```bash
php client-connect.php
```


