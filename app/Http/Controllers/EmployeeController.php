<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
}