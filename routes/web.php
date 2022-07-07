<?php
namespace App;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/', 'home');
Route::view('readme', 'readme');
Route::view('contact', 'contact');

Route::get('qanda/laravelbasic', 'QandAController@laravelbasic');
Route::get('qanda/laravelintermediate', 'QandAController@laravelintermediate');
Route::get('qanda/laraveladvanced', 'QandAController@laraveladvanced');

Route::get('qanda/phpbasic', 'QandAController@phpbasic');
Route::get('qanda/phpintermediate', 'QandAController@phpintermediate');
Route::get('qanda/phpadvanced', 'QandAController@phpadvanced');

Route::get('qanda/mysqlbasic', 'QandAController@mysqlbasic');
Route::get('qanda/mysqlintermediate', 'QandAController@mysqlintermediate');
Route::get('qanda/mysqladvanced', 'QandAController@mysqladvanced');

Route::get('qanda/javascriptbasic', 'QandAController@javascriptbasic');
Route::get('qanda/javascriptintermediate', 'QandAController@javascriptintermediate');
Route::get('qanda/javascriptadvanced', 'QandAController@javascriptadvanced');

Route::get('qanda/awsbasic', 'QandAController@awsbasic');
Route::get('qanda/awsintermediate', 'QandAController@awsintermediate');
Route::get('qanda/awsadvanced', 'QandAController@awsadvanced');

Route::get('qanda/gitbasic', 'QandAController@gitbasic');
Route::get('qanda/gitintermediate', 'QandAController@gitintermediate');
Route::get('qanda/gitadvanced', 'QandAController@gitadvanced');

Route::get('qanda/jquerybasic', 'QandAController@jquerybasic');
Route::get('qanda/jqueryintermediate', 'QandAController@jqueryintermediate');
Route::get('qanda/jqueryadvanced', 'QandAController@jqueryadvanced');

Route::get('qanda/ajaxbasic', 'QandAController@ajaxbasic');
Route::get('qanda/ajaxintermediate', 'QandAController@ajaxintermediate');
Route::get('qanda/ajaxadvanced', 'QandAController@ajaxadvanced');

Route::delete('qanda/{id}', 'QandAController@destroy');
Route::get('qanda/{id}/edit', 'QandAController@edit');
Route::patch('qanda/{id}/edit', 'QandAController@update');
Route::get('qanda/searchQuestion', 'QandAController@searchQuestion');

// Ck-Editor Image Url
Route::post('images', 'QandAController@uploadimage')->name('qanda.uploadimage');

// Laravel Features
// Route::get('qanda/laravelfeatures', 'QandAController@laravelfeatures');
Route::view('laravelfeatures', 'laravelfeatures');

// Question and Answers CRUD Optation Url's
Route::resource('qanda', 'QandAController');

Route::get('/api/{term}', function($term) {
    return ['results' => $term];
})->middleware('throttle:3');

// Auth::routes(['verify' => true]);
// Route::get('/', function() {
//     return action([QandAController:class, 'about']);
// });

//Route::get('customers', 'CustomersController@index');
//Route::get('customers/create', 'CustomersController@create');
//Route::post('customers', 'CustomersController@store');
//Route::get('customers/{customer}', 'CustomersController@show');
//Route::get('customers/{customer}/edit', 'CustomersController@edit');
//Route::patch('customers/{customer}', 'CustomersController@update');
//Route::delete('customers/{customer}', 'CustomersController@destroy');

Route::resource('customers', 'CustomersController');



