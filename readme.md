Clone the project: git clone https://github.com/AshrafulRasel/CMS

Extract it

cd into your project

Install Composer Dependencies: composer install

cp .env.example .env

Generate an app encryption key : php artisan key:generate

Create an empty database for our application

In the .env file, add database information to allow Laravel to connect to the database

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.

Migrate the database : php artisan migrate
 
Seed the database:php artisan db:seed

Run the project: php artisan serve



 
