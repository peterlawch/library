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

Route::get('book/{slug}/', ['as' => 'book.single', 'uses' => 'BookController@getSingle'])
        ->where('slug', '[\w\d\-\_]+');
Route::get('book', ['uses' => 'BookController@getIndex', 'as'=> 'book.index']);
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');


Route::post('/language', array (
  'Middleware'=>'Language',
  'uses'=>'LanguageController@index'
));
//Route::post('/language-chooser', 'LanguageController@changeLanguage');

//Route::post('/language/', array (
//  'before' => 'csrf',
//  'as' => 'language-chooser',
//  'uses' => 'LanguageController@changeLanguage',
//  )
//);

//Route::get('about', function () {
//  return view('about');
//});


//Route::get('/', function () {
//    return view('welcome');
//});



Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function () {
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users', 'UserController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
  Route::resource('/books', 'PostController');
  Route::resource('categories', 'CategoryController', ['except' => 'create']);
  Route::resource('authors', 'AuthorController', ['except' => ['create']]);
});

Route::get('/home', 'HomeController@index')->name('home');
