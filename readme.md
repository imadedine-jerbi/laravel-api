# REST API

> This is an implementation of REST API based on Laravel framework and Laravel admin.
> This project is under development et needs further improvement.

## Technologies
- [Laravel Framework](https://laravel.com/) (5.6) 
- Backend based on [Laravel Admin](https://github.com/z-song/laravel-admin) with extensions [API Test](https://github.com/laravel-admin-extensions/api-tester) and [Redis Manager](https://github.com/laravel-admin-extensions/redis-manager) 
## Requirements
- PHP >= 7.1.3 
- OpenSSL PHP Extension 
- PDO PHP Extension 
- Mbstring PHP Extension 
- Tokenizer PHP Extension 
- XML PHP Extension 
- Ctype PHP Extension 
- JSON PHP Extension 
- MySQL 
- Rdis 

## Install and Run 

1. Download the project 
```sh
$ git clone https://github.com/imadedine-jerbi/laravel-api.git
```
2. Generate the new key to your `.env` file
```sh
php artisan key:generate
```
3. Create a user and a database
```sh
$ mysql -u userName –p 
GRANT ALL PRIVILEGES ON *.* TO 'username'@'localhost' IDENTIFIED BY 'password'; 
CREATE DATABASE api;
FLUSH PRIVILEGES;
exit;
```
4. Config the database connection settings in the environment file `.env` 
5. Create Tables and Import test data  
a. Create Tables
```sh
$ php artisan migrate
```
b. Import data 
- Import data from dump file 
```sh
$ mysql api < data.sql
```
- Start with empty database
```sh
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider" 
php artisan admin:install
php artisan admin:import api-tester
php artisan admin:import redis-manager
```
6. Run the development server
To start a development server at http://localhost:8000 
```sh
$ php artisan serve 
```
7. Run tests
```sh
$ php ./vendor/bin/phpunit 
```