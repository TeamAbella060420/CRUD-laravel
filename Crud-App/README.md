Create Laravel Project

1. laravel new project-name
2. cd project-name
3. php artisan serve
4. Create a database from php admin mysql
5. Go to .env, refactor the DB code, replace code to DB_HOST=localhost 
DB_DATABASE=laravel_ajax `This is the name of the data base in the my SQL`
6. php artisan make:model Employee -m `Create a model and migration`
7. php artisan make:controller EmployeeController `Create a controller` 
8. Define a schema in the added migaration file
    `public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('post');
            $table->string('avatar');
            $table->timestamps();
        });
    }`
9. Migrate the migration in to the database `php artisan migrate`
10. Check the database if the tables are created
11. Work on the Model in the create Employee.php file 
    `    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'post',
        'avatar',
    ];
` // add this into the employee extend model
12. Go to web.php file on routes
    a. Create a simple route
        `Route::get('/', [EmployeeController::class, 'index']);`
13. Go to resourse->views directory.
    a. Delete the welcome.blase.php file
    b. Create new file in views directory 
