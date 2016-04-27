# Lara Commerce

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

#### Now you can register for a  new account from http://ecommerce.ohidul.com/auth/register and after login you can add product

Now you are all setup to go. Thanks

## Have any  question?
ask me at ohidul.islam951@gmail.com


# Screenshots

##### Home page 
![Home page ](https://51a1cb64ccf988db62251900e9a17dcc2ca25907.googledrive.com/host/0B6SVI7iK7bjjb3M1VXkwNm0yMDA)


##### Category page
![Category page](https://d8962e48bf3fa1f030870c45233997a261e16f54.googledrive.com/host/0B6SVI7iK7bjjbmNubXVyWlAteEk)


##### Shopping cart page 
![Shopping cart page ](https://c7623b9e507e8cbbff07bb574e7cffa616fa558d.googledrive.com/host/0B6SVI7iK7bjjaXZOU2EtRS1feVk)

##### Admin panel all product listing page
![Admin panel all product listing page](https://03b135dfeaa0d5f80b767afdb4a38b5c5c0c0760.googledrive.com/host/0B6SVI7iK7bjjQjNMOGMwREhnajA)


##### Add product and photo page
![Add product and photo page](https://66ef003719a16dfc0edb83064526d4a280aab88b.googledrive.com/host/0B6SVI7iK7bjjUGZISGxQZmJDS3c)

