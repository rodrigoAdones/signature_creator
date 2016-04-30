<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Image;

use App\Employee;

class EmployeeController extends Controller
{
    public function store(Request $request){
    	$input = $request->only(['name','department','position','annex','email','branch_id','company_id']);

    	$rules = [
    		'name'			=> 'required',
    		'company_id'	=> 'required',
    		'branch_id'		=> 'required'
    	];

    	$validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
        	$employee = new Employee($input);

        	$employee->save();

        	$respuesta = [
        		"respuesta" 	=> "Guardado",
        		"name" 			=> $employee->name,
        		"department" 	=> $employee->department,
        		"position" 		=> $employee->position,
        		"annex" 		=> $employee->annex,
        		"email" 		=> $employee->email,
        		"branch" 		=> $employee->branch->name,
        		"id"			=> $employee->id
        	];

        	return response()->json($respuesta);
        	//die("asdasda");
        }

        $messages = $validation->errors();

        $respuesta = "Error";

        $mensaje = "Debe completar el nombre y elegir la sucursal como minimo";

        return response()->json(compact('respuesta','mensaje'));
    }

    public function edit($id){
    	$employee = Employee::find($id);

    	return view("employee.edit",compact('employee'));
    }

    public function update(Request $request,$id){
    	$input = $request->only(['name','department','position','annex','email','branch_id']);

    	$rules = [
    		'name'			=> 'required',
    		'branch_id'		=> 'required'
    	];

    	$validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
        	$employee = Employee::find($id);

        	$employee->name 		= $input['name'];
        	$employee->department 	= $input['department'];
        	$employee->position 	= $input['position'];
        	$employee->annex 		= $input['annex'];
        	$employee->email 		= $input['email'];
        	$employee->branch_id 	= $input['branch_id'];

        	$employee->save();

        	$ruta = route('list-of-employees',[$employee->company->alias,$employee->company->id]);

        	$respuesta = [
        		"respuesta" => "Guardado",
        		"ruta"		=> $ruta
        	];

        	return response()->json($respuesta);
        	//die("asdasda");
        }

        $messages = $validation->errors();

        $respuesta = "Error";

        $mensaje = "Debe completar el nombre y elegir la sucursal como minimo";

        return response()->json(compact('respuesta','mensaje'));
    }

    public function showSign($id){
        $employee = Employee::find($id);

        $img = Image::make('images/'.$employee->company->alias.'/background.jpg')->resize(400, 150);

        $origin_x=70;

        $img->text($employee->company->name, $origin_x, 5, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(30);
            $font->color('#000000');
            //$font->align('right');
            $font->valign('top');
            //$font->angle(15);
        });

        $img->text($employee->name, $origin_x, 50, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(15);
            $font->color('#ff0000');
            //$font->align('right');
            $font->valign('top');
            //$font->angle(15);
        });
        $img->text($employee->position, $origin_x, 65, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(15);
            $font->color('#ff0000');
            //$font->align('right');
            $font->valign('top');
            //$font->angle(15);
        });
        $img->text("Area ".$employee->department, $origin_x, 80, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(15);
            $font->color('#ff0000');
            //$font->align('right');
            $font->valign('top');
            //$font->angle(15);
        });
        $img->text($employee->branch->name." Direccion: ".$employee->branch->address, 5, 110, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(10);
            $font->color('#000000');
            //$font->align('right');
            $font->valign('top');
            //$font->angle(15);
        });

        $img->text("Telefono: ".$employee->branch->phone1." Anexo: ".$employee->annex, 5, 120, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(10);
            $font->color('#000000');
            //$font->align('right');
            $font->valign('top');
            //$font->angle(15);
        });

        return $img->response('jpg');
    }
}