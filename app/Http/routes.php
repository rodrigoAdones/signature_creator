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

//ver empresas
Route::get('/company/create',['as'=>'create-company','uses'=>'CompanyController@create']);
Route::post('/company/create',['as'=>'save-company','uses'=>'CompanyController@store']);

//ver y crear empleados
Route::get('/company/employees/{slug}/{id}',['as'=>'list-of-employees','uses'=>'CompanyController@employees']);
Route::post('add/employee',['as'=>'save-employee','uses'=>'EmployeeController@store']);

//ver y crear sucursales
Route::get('/company/branches/{slug}/{id}',['as'=>'list-of-branches','uses'=>'CompanyController@branches']);
Route::post('add/branch',['as'=>'save-branch','uses'=>'BranchController@store']);
Route::get('/company/branches/{slug}/edit/{id}',['as'=>'edit-branch','uses'=>'BranchController@edit']);
Route::post('/edit/branch/{id}',['as'=>'update-branch','uses'=>'BranchController@update']);

//editar empleado
Route::get('company/edit/employee/{id}',['as'=>'edit-employee','uses'=>'EmployeeController@edit']);
Route::post('company/edit/employee/{id}',['as'=>'update-employee','uses'=>'EmployeeController@update']);

//imagen empresa
Route::get('company/image/{slug}/{id}',['as'=>'image','uses'=>'CompanyController@image']);
Route::post('upload/image/{id}',['as'=>'upload-image','uses'=>'StorageController@image']);
//mostrar el background cargado
Route::get('company/show/image/{id}',['as'=>'show-background','uses'=>'CompanyController@returnBackground']);
//firma para empleado
Route::get('company/sign/employee/{id}',['as'=>'image-employee','uses'=>'EmployeeController@showSign']);

//Subir

Route::get('storage',['as'=>'storage','uses'=>'StorageController@upload_form']);
Route::post('storage',['as'=>'upload-file','uses'=>'StorageController@upload']);
