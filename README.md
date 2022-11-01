## Laravel Relationship Demo

This project is developed in laravel (8.0)
Impelemnt the coding standards
Added the request traking tools

## Laravel Packages

-   [Laravel Telescope](https://laravel.com/docs/8.x/telescope) - For Monitoring request
-   [Laravel Littlegatekeeper](https://github.com/spatie/laravel-littlegatekeeper) - Protect pages from access with a universal username/password combination.It is used for developer panel which includes `Telescope`.
-   [Laravel Passport](https://laravel.com/docs/8.x/passport) - To manage the login authenization
-   [Laravel-query-builder](https://spatie.be/docs/laravel-query-builder/v3/introduction) - Use for the query builder

## Below relationship used

- one To Many
- has Many
- morph Many

## Installation

We need composer to install all packages.
Here the complete instruction to install composer https://getcomposer.org/doc/00-intro.md

Let's install all packages, by running this command from Terminal

```
composer install
```

Let's do some migration.

```
php artisan migrate
```

And run the web server

```
php artisan serve
```

Now, visit http://localhost:8000 to try the demo.

## Defination

Create the below API's

1. Login API
- Login the user with `email address` and `password` and generate the authorization token using `laravel/passport` Package.

2. Products API
- Create the product API
- Product Collection and Resource API
- Product Update API
- Product Delete API
- Product table filed
    1. name
    2. price (Price of the single product)
    
3. Place order API
- After user login will be place the order and with multiple products and quentiry

4. Reports of the orders
- Below data added into the reports listing and single details API
    1. User Name
    2. Products
    3. Product quntity
    4. Order Total
    
5. Add reviews
- User will be add the review of the orders and products.
- Collection and resource API of the review

6. User Listing API
- User collection and resource API

### Rules
1. Create the table using migrations
2. Added the testing data into all table using seeder
3. Create the `Resource` and `Collection` file for the API response
4. The database is must be soft delete
5. The validation is add into the `Request` file
6. User will be do the all operation after the login
