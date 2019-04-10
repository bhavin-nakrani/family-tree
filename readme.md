<h1 align="center">Genealogy Application</h1>

## About
Genealogy application to record our family members.

## Features
This application uses English based on `config.locale`.

### Logic Concept
1. A person can have one father
2. A person can have one mother
3. A person can have one parent (couple of mother and father)
4. A person can have 0 to many children
5. A person can have 0 to many spouses (husbands or wife)
6. A couple can have 0 to many children (based on parent_id)

### Family Member Entry
1. Enter Name and Gender
2. Set Father
3. Set Mother
4. Add Spouse
5. Add Child

### Person Attribute
1. Nickname
2. Gender
3. Fullname
4. Date of birth
5. Date of death (or at least year of death)
6. Address
7. Phone Number
8. Email
9. Photo

### Couple Attribute (TODO)
1. Husband
2. Wife
3. Marriage Date
4. Divorce Date
5. Address

## How to Install

### Server Requirements

This application can be installed on local server and online server with these specifications :

1. PHP 7.1.3 (and meet [Laravel 5.8 server requirements](https://laravel.com/docs/5.8#server-requirements)),
2. MySQL or MariaDB database,
3. SQlite (for automated testing).

### Installation Steps

1. Download zip file of source code
2. `cd directory name`
3. `composer install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6. Create **database on MySQL**
7. **Set database credentials** on `.env` file
8. `php artisan migrate`
9. `php artisan storage:link`
10. `php artisan serve`
11. Done (Register as new user to start using the application).

## Testing
This application built with testing (TDD) using in-memory sqlite database.
```bash
$ vendor/bin/phpunit
```

## License
The Laravel framework is open-sourced software licensed under the MIT license.
