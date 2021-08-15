# Installation instruction

First, you need to have composer and laravel installer installed (it is described here: https://laravel.com/docs/8.x/installation)

Then, clone the repo.
`git clone git@github.com:Sergey-bhw/testapp.git`

Make a new database for the repo.
Rename `.env.example` to `.env` and add your MySQL DB credentials into this block of the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Next, run these commands from the terminal (one by one), inside of a new cloned repo directory:
```
composer install
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan key:generate
php artisan storage:link
```
After that, launch development server via the command: `php artisan serve`
It will output a link to your local app.

Thank you for reading!