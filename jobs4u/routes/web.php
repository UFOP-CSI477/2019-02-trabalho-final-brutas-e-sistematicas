<?php

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
use App\Category;

Route::get('/', 'SkillController@index')->name('welcome');
Route::get('categoria/workers/{cat}', 'SkillController@workersByCategorie')->name('workersByCategorie');
Route::get('worker/contact/{user}', 'SkillController@workerContact')->name('workerContact');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);

	Route::post('profile/addPhone', ['as' => 'profile.add.phone', 'uses' => 'ProfileController@addPhone']);
	Route::post('profile/addCat', ['as' => 'profile.add.category', 'uses' => 'ProfileController@addCategory']);
	Route::delete('profile/update', ['as' => 'profile.del.category', 'uses' => 'ProfileController@delCategory']);
	Route::put('profile', ['as' => 'profile.update.phone', 'uses' => 'ProfileController@editPhone']);

	Route::put('profile/update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

