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

php artisan migrate:rollback => This will go One Step backwords
php artisan migrate

Concept Learning In this Project:



