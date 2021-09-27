<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

- [What's new?](/docs/whats-new.md)

## Note

- [Installation](https://laravel.com/docs/8.x/installation)
- [Helpers](https://laravel.com/docs/8.x/helpers)
- [Collections](https://laravel.com/docs/8.x/collections)


## Lesson

1. [Simple CRUD Author](/docs/lesson-1.md)
2. [CRUD Book](/docs/lesson-2.md)


## installation

```bash
# install all php dependency
$ composer install

# copy env file
$ cp .env.example .env

# migrate to create table
$ php artisan migrate

# generate key
$ php artisan key:generate
```

<br>

Before you migrate, please set database config in env file.

```sh
# .env | line 12

DB_DATABASE=demo
DB_USERNAME=root
DB_PASSWORD=
```
