Create Laravel Project

1. laravel new project-name
2. cd project-name
3. php artisan serve
4. Create a database from php admin mysql
5. Go to .env, refactor the DB code, replace code to DB_HOST=localhost 
DB_DATABASE=laravel_ajax `This is the name of the data base in the my SQL`
6. php artisan make:model Employee -m `Create a model and migration`
7. php artisan make:controller EmployeeController `Create a controller`