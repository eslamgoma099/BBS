Pull branch staging

copy .env_ex to .env

create a file db.sqlite in database directory

add the path to your .env DB_DATABASE 

run the following commands

composer install

php artisan migrate

php artisan db:seed

php artisan key:gen 

then php artisan serve to start application

