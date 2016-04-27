# Lara Todo

Lara commerce is a online ecommerce application built on top of Laravel 5 framework. 
Here admin can add products, product images, with tags and category support.


### Version
master

### Live Demo
http://ecommerce.ohidul.com/

### Installation

Clone this repository first-
```sh
$ git clone https://github.com/ohid/lara-commerce.git lara-commerce
```

Now cd into super-shortener-
```sh
$ cd lara-commerce
```

Install composer-
```sh
$ composer install  
```

Duplicate `.env.example` file to `.env` file to create a environment file-
```sh
$ cp .env.example .env
```

Edit `.env` file with with your database credential and mail service

Now create database tables by running this command-
```
php artisan migrate
```

Generate a application key
```
php artisan key:generate
```

## Run on server
```
php artisan serve
```

### Now you can register for a  new account from http://ecommerce.ohidul.com/auth/register and after login you can add product

Now you are all setup to go. Thanks

## Have any  question?
ask me at ohidul.islam951@gmail.com


# Screenshots

Home page shortening url
![Home page shortening url](https://f80b40e2f310199b7fee1416426c7e105de8fafa.googledrive.com/host/0B6SVI7iK7bjjOEFkNDJjXzBQRG8)

