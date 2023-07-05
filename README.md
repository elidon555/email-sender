<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# User Posts Email Sender

This is a tool built with Laravel that reads user and post data from two separate APIs and sends an email with the titles of the first 3 posts written by each user.

## Getting Started

### Prerequisites

You will need the following to run this application:
- PHP 8.2 or later
- Composer
- Laravel 10.0 or later
- An account on [Mailtrap](https://mailtrap.io) or similar service that provides SMTP credentials for sending emails

### Installation

1. Clone this repository: 
```bash
git clone https://github.com/elidon555/user-posts-email-sender.git
```
2. Install the dependencies:
```bash
composer install
```
3. Copy the .env.example file to create your own environment file:
```bash
cp .env.example .env
```
4. Edit the .env file with your database and Mailtrap configurations.

5. Generate an application key:

```bash
php artisan key:generate
```

6. Generate swagger documentation

```bash
php artisan l5-swagger:generate
php artisan optimize
```

7. Run migrations and db seed

```bash
php artisan migrate:refresh --seed
```

Run the application:
```bash
php artisan serve
```

### Usage

The application consumes two REST API endpoint:

- https://jsonplaceholder.typicode.com/users  -> to get the list of users
- https://jsonplaceholder.typicode.com/posts  -> to get the list of posts

To send emails, make a POST request to the /api/mail/send/user-posts endpoint with a payload containing the email addresses you wish to send the email to.

### Running Tests

This project is equipped with unit tests. To run the tests, use the following command:
```bash
./vendor/bin/phpunit
```

### Contributing
This project is open source and we welcome any contributions. Please read our CONTRIBUTING guide for details on how to contribute.

### License
This project is licensed under the MIT License. See the LICENSE file for details.