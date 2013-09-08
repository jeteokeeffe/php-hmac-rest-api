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

Routes
-------------
Routes are stored in `php-hmac-rest-api/app/config/routes.php` as an array. A route has a method (HEAD, GET, POST, PATCH, DELETE, OPTIONS), uri (which can contain regular expressions) and handler/controller to point to.

```php
$routes[] = [
        'method' => 'post',
        'route' => '/ping',
        'handler' => ['Controllers\ExampleController', 'pingAction']
];

$routes[] = [
        'method' => 'get',
        'route' => '/ping',
        'handler' => ['Controllers\ExampleController', 'pingAction']
];
```

Client Requirements
-------------
PHP 5.3+

Required PHP Modules
- Curl

To check for that module
```bash
php -m | egrep "(curl)"
```


Client Test
-------------

Open `php-hmac-rest-api/client-connect.php` and make sure the host is pointed to the proper url.


When you're ready to test, go ahead and execute it
```bash
php client-connect.php
```

Server Test
-------------

With php 5.4, you can use its builtin web server to quickly test functionality. Make sure to be in the public directory when executing the command below.

```bash
cd php-hmac-rest-api/public
php -S localhost:8000 ../.htrouter.php
```

Successful Request
---------------

```http
POST /ping HTTP/1.1
Host: api.example.com
Accept: */*
API-ID: 1
API-TIME: 1377469831
API-HASH: 4cd93cb01ae9a988fbe2922f4ccbc39276ea3626e6016cf80bba32a6447256c5
Content-Length: 143
```

Successful Response
---------------

```http
HTTP/1.1 200 OK
Server: nginx
Date: Sun, 25 Aug 2013 22:27:26 GMT
Content-Type: text/html; charset=utf-8
Transfer-Encoding: chunked
Connection: keep-alive

pong
```
