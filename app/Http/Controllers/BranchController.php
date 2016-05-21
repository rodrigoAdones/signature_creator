<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Branch;

class BranchController extends Controller
{
    public function store(Request $request){
    	$input = $request->only(['name','address','city','phone1','phone2','company_id']);

    	$rules = [
    		'name'			=> 'required',
    		'company_id'	=> 'required'
    	];

    	$validation = \Validator::make($input,$rules);

        if($validation->passes())
        {
        	$branch = new Branch($input);

        	$branch->save();

        	$branchResponse = Branch::find($branch->id);

        	$respuesta = "Guardado";

        	return response()->json(compact('respuesta','branchResponse'));
        }

        $messages = $validation->errors();

        $respuesta = "Error";

        $mensaje = "Debe completar el nombre de la sucursal";

        return response()->json(compact('respuesta','mensaje'));
    }

    public function edit($slug,$id){
      $branch = Branch::find($id);

      return view('branch.edit',compact('branch'));
    }

    public function update(Request $request, $id){
      $branch = Branch::find($id);
    }
}
