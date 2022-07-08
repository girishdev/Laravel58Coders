php artisan help make:controller => Controller can be plural
php artisan make:controller CustomersController

Model Should be singular Not Plural
php artisan make:model Customer -m

php artisan tinker
>>> $customer = new Customer();
>>> $customer->name = 'Girish';
>>> $customer->save();
>>> Customer::all();

Note:
Till Pushing to Production Server you can generate as many Migration you want
but when you Release Specific Version in PS, then you need to create New Migration file

Note: Migration Describes Database
php artisan migrate:rollback => This will go One Step backwords
php artisan migrate

Model are the Singular version what we do
php artisan make:model Company -m

Adding Company:
php artisan tinker
$c = Company::create(['name' => 'ABC Company', 'phone' => '123-123-1234']);
Relationship
1. A Company has Many Customers
2. A Customer Belongs to the Company

Note: If you keep It Naming convention Singular to Plural
the all it works

php artisan migrate:fresh => Generate Fresh Tables

$c = Company::first();
$c = $c->customers;

$c = Customer::first();
$c = $c->company;

Calling as a Property and Calling as a methods

.col-2 (Created Html div)

php artisan help make:controller
php artisan make:controller TestController -r
php artisan make:controller TestagainController -r -m Customer

php artisan make:model qanda -m
php artisan make:controller qandasController - r -m qanda


Model - Singular
Controller - Plural
php artisan make:model Qanda -m
php artisan make:controller QandasController - r -m Qanda

Eloquent ia able to handel many Different Databases Drivers

IDE Setup:
https://www.jetbrains.com/help/phpstorm/2022.1/laravel.html
https://www.javatpoint.com/laravel-tinker#:~:text=Laravel%20Tinker%20allows%20you%20to,works%20with%20a%20php%20artisan.
https://stillat.com/blog/2016/12/07/laravel-artisan-the-tinker-command

Concept Learning In this Project:
1. Routes:

2. Controller

3. Views(Blade File)

4. HTML forms(Blade)

5. Validation
https://laravel.com/docs/master/validation#available-validation-rules

6. Eloquent

7. Sending Mails
8. Flashing Data (Session/Cookies)
9. Helper Function(URL Helpers)
10. Authentication
11. Middleware
12. Events & Listeners
13. Queues
14. Deployment: Basic Server Setup
15. Artisan Commands
16. Model Factories
17. Database & Table Seeders
18. Image Upload
19. Telescope
20. Lazy Loading vs. Eager Loading (Fixing N + 1 Problem)
21. Pagination
22. Policies
23. Eloquent Relationships
24. Testing 101 Using PHPUnit
25. SEO Friendly URLS
26. Localization, Translations & Language Files
27. Multi Image File Upload & Gallery

28. Vue Basics

29. Git Push and Pull

php artisan serve --host=192.168.1.7 --port=8000
