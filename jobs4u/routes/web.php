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

Route::get('/', function () {
	$topCategories = [
		[
			'nome' => 'Construção Civil',
			'icon' => 'flaticon-idea',
			'id'   => DB::table('categories')->select('id')->where('name', '=', 'Construção Civil')->get()
		],
		[
			'nome' => 'Transporte Alternativo',
			'icon' => 'flaticon-visitor',
			'id'   => DB::table('categories')->select('id')->where('name', '=', 'Transporte Alternativo')->get()
		],
		[
			'nome' => 'Limpeza Doméstica',
			'icon' => 'flaticon-employees',
			'id'   => DB::table('categories')->select('id')->where('name', '=', 'Limpeza Doméstica')->get()
		],
		[
			'nome' => 'Informatica e Computadores',
			'icon' => 'flaticon-contact',
			'id'   => DB::table('categories')->select('id')->where('name', '=', 'Informatica e Computadores')->get()
		],
	];

	// dd($topCategories[0]['nome']);
	$cidades = DB::table('users')->select('city as name')->distinct()->get();
	$cat = Category::all();
    return view('layouts.skill.index', ['categories' => $cat, 'cidades' => $cidades, 'topCat' => $topCategories]);
})->name('welcome');

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

