<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use EasySlug\EasySlug\EasySlugFacade as EasySlug;

use Storage;

use Image;

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

    public function image($slug,$id){
        $company = Company::find($id);

        $file = $company->alias."/background.jpg";

        $img = Storage::exists($file);

        return view("company.image",compact('img','company'));
    }

    public function returnBackground($id){
        $company = Company::find($id);
        $img = Image::make('images/'.$company->alias.'/background.jpg')->resize(400, 150);

        $img->text('background example', 200, 100, function($font) {
            $font->file('fonts/GOODTIME.TTF');
            $font->size(15);
            $font->color('#ff0000');
            $font->align('center');
            //$font->valign('top');
            $font->angle(15);
        });
        return $img->response('jpg');
    }
}
