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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'TestController@welcome');

Route::get('/prueba', function () {
    return 'Hola soy una ruta de prueba';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::get('/search', 'SearchController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
  Route::get('/products', 'ProductController@index');  //listado
  Route::get('/products/create', 'ProductController@create'); //formulario creacion
  Route::post('/products', 'ProductController@store'); //registrar
  Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario creacion
  Route::post('/products/{id}/edit', 'ProductController@update'); //registrar
  //Route::get('/admin/products/{id}/delete', 'ProductController@destroy'); // con get
  //Route::delete('/admin/products/{id}', 'ProductController@destroy');
  Route::post('/products/{id}/delete', 'ProductController@destroy');

  Route::get('/products/{id}/images', 'ImageController@index');
  Route::post('/products/{id}/images', 'ImageController@store');
  Route::delete('/products/{id}/images', 'ImageController@destroy');

  Route::get('/products/{id}/images/select/{image}', 'ImageController@select');

  Route::get('/categories', 'CategoryController@index');  //listado
  Route::get('/categories/create', 'CategoryController@create'); //formulario creacion
  Route::post('/categories', 'CategoryController@store');
  Route::get('/categories/{category}/edit', 'CategoryController@edit');
  Route::post('/categories/{category}/edit', 'CategoryController@update');
  Route::post('/categories/{category}', 'CategoryController@destroy');

});


?>
