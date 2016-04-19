<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasySlug\EasySlug\EasySlugFacade as EasySlug;

use App\Company;

class CompanyController extends Controller
{
    //
    public function index(){
    	//
    }

    public function create(){
    	//
        $companies = Company::all();

    	return view('company.create',compact('companies'));
    }

    public function save(Request $request){
    	$input = $request->only(['name']);

    	$input['alias'] = EasySlug::generateSlug($input['name'], $separator = '-');

    	$rules = [
    		'name'=>'required',
    	];

    	$validation = \Validator::make($input,$rules);

    	if($validation->passes())
        {
        	$company = new Company($input);

        	$company->save();

        	//return view('company.create');
            return back();
        }
    }

    public function employees($slug,$id)
    {
        $company = Company::find($id);

        return view('company.employees',compact('company'));
    }
}
