<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasySlug\EasySlug\EasySlugFacade as EasySlug;

use App\Company;
use App\Branch;

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

    public function store(Request $request){
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

            $defaultBranchData = [
                'name'      =>  'Casa Matriz',
                'address'   =>  'Adress Default',
                'city'      =>  'City Default',
                'phone1'    =>  '0',
                'phone2'    =>  '0',
                'type'      =>  'Principal',
                'company_id'=>  $company->id
            ];

            $branch = new Branch($defaultBranchData);

            $branch->save();

        	//return view('company.create');
            return back();
        }
    }

    public function employees($slug,$id)
    {
        $company = Company::find($id);

        return view('company.employees',compact('company'));
    }

    public function branches($slug,$id){
        $company = Company::find($id);

        return view('company.branches',compact('company'));
    }
}
