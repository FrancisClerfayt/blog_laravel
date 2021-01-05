<?php

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

Route::get('/', 'WelcomeController@index')->name('home');

// CRUD : Create, Read, Update, Delete

// Read
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/{id}', 'ProductController@show')->name('showProduct');
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/employee/{id}', 'EmployeeController@show')->name('showEmployee');
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/company/{id}', 'CompanyController@show')->name('showCompany');

// Route::group(['middleware' => 'auth'], function(){
	// Create
	Route::get('/createProduct', 'ProductController@create')->name('createProduct');
	Route::post('/storeProduct', 'ProductController@store')->name('storeProduct');
	Route::get('/createEmployee', 'EmployeeController@create')->name('createEmployee');
	Route::post('/storeEmployee', 'EmployeeController@store')->name('storeEmployee');
	Route::get('/createCompany', 'CompanyController@create')->name('createCompany');
	Route::post('/storeCompany', 'CompanyController@store')->name('storeCompany');
	
	// Update
	Route::get('/editProduct/{id}', 'ProductController@edit')->name('editProduct');
	Route::post('/updateProduct/{id}', 'ProductController@update')->name('updateProduct');
	Route::get('/editEmployee/{id}', 'EmployeeController@edit')->name('editEmployee');
	Route::post('/updateEmployee/{id}', 'EmployeeController@update')->name('updateEmployee');
	Route::get('/editCompany/{id}', 'CompanyController@edit')->name('editCompany');
	Route::post('/updateCompany/{id}', 'CompanyController@update')->name('updateCompany');
	
	// Delete
	Route::post('/deleteProduct/{id}', 'ProductController@destroy')->name('deleteProduct');
	Route::post('/deleteEmployee/{id}', 'EmployeeController@destroy')->name('deleteEmployee');
	Route::post('/deleteCompany/{id}', 'CompanyController@destroy')->name('deleteCompany');
// });