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
