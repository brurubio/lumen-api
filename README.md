# Lumen API

This project creates a Laravel Lumen-based API that simulates bank accounts events, such as checking balances, making deposits, withdraws and transfers.

## Pre-Requisites

There are some pre-requisites to run this application, as follows:

- [PHP](https://www.php.net/downloads.php) (can also be installed by command line);
- PHP extensions, like `php-zip` (installed by command line);
- [Composer](https://getcomposer.org);
- [Lumen](https://lumen.laravel.com).

## Installation

After installing pre-requisites and dowloading the project, run the following command to install its dependencies:

```composer install```

## Firing Up

Runs a development server with desired port, as follows:

```php -S localhost:<api-local-port> -t public```

## Tunneling with Ngrok

To simulate a real API, it is possible to tunnel the local server with [Ngrok](https://ngrok.com/).

Observe the given instructions for setting up a tunnel and run the following command:

```./ngrok http <api-local-port>```

## Postman Requests (Optional)

As an additional source for local testing, Postman collections are available at `postman/lumen-api.json` (note the default port is 8080).
