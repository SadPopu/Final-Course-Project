# README #

This is the Final Course Project of SadPopu web application named AgriShop.

### How do I get repository ###

* [Repository](https://github.com/SadPopu/Final-Course-Project.git)

### How do I get set up? ###

* [Install PHP](https://windows.php.net/index.php)
* [Install Composer](https://getcomposer.org)  
* [Insall MySQL](https://dev.mysql.com/downloads/installer/) or [Install XAMPP](https://sourceforge.net/projects/xampp/) (You will need to create a Database so the application can run without any errors)

### How do I set up my database? ###

* change lines 11 to 16 in .env file with your database info
* If you are running MySQL with XAMPP run the following code on a terminal inside the project directory
* - C:\xampp\php\php.exe artisan migrate
* If you're using MySQL only just run
* - php artisan migrate
* If you see no errors in the terminal its almost all sett to run our application
* Now, we need to create in our database the roles for the users to do that inside the database run the cmd:
* - INSERT INTO `roles` (`id`, `roleName`, `created_at`, `updated_at`) VALUES ('1', 'Admin', NULL, NULL), ('2', 'Customer', NULL, NULL);

### How do I start the application
* Run the following cmd in the main directory:
* - php artisan serve
* if you're using XAMPP use:
* - C:\xampp\php\php.exe artisan serve

### How do I check the application
* Open the following web url: [http://127.0.0.1:8000]

* ### How do I get Admin permissions
* To get Admin permissions on the app you'll have to do it hardcoded the first time, after you create an acc you'll have to go into your database and in the 'users' table change the roleID of that 'user' to 1 (Admin)

### Who do I talk to? ###

* discord popu17
* email ivomarante174@hotmail.com
