# Posts Task 

## Installation instructions
To set up the project, please follow these steps:
- 1- Ensure that your PHP version at least is “8.1”. 
- 2- Open the project and navigate to the project's root directory in a new terminal.
- 3- Run the command "composer install" to install the project dependencies.
- 4- Copy the ".env.example" file in the root directory of the project and rename it to ".env". 
- 5- Generate a key for the application by running the command "php artisan key:generate".
- 6- Create a database on your local machine and copy its name.
- 7- Open the ".env" file and locate the "DB_DATABASE" paste the database name as the value for this key.
- 8- Double-check the database configuration values in the ".env" file to ensure they match your local database configuration.
- 9- Migrate the database tables and seed data by executing the command "php artisan migrate --seed".
- 10- To run the project, use the command "php artisan serve". If you are using Valet, you can access the project via the domain “http://project-name.test". 
- 11- At this point, the project should be running correctly on your machine.
