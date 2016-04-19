<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/pruebaImagen', function()
{
    $img = Image::make('images/evey.jpg')->resize(600, 450);

    $img->text('The quick brown fox jumps over the lazy dog.',10,50);

    $img->text('Daitocar', 200, 100, function($font) {
	    $font->file('fonts/GOODTIME.TTF');
	    $font->size(42);
	    $font->color('#fdf6e3');
	    $font->align('center');
	    $font->valign('top');
	    //$font->angle(45);
	});

    return $img->response('jpg');
});

Route::get('/company/create',['as'=>'create-company','uses'=>'CompanyController@create']);
Route::post('/company/create',['as'=>'save-company','uses'=>'CompanyController@save']);

Route::get('/company/employee/{slug}/{id}',['as'=>'list-of-employees','uses'=>'CompanyController@employees']);