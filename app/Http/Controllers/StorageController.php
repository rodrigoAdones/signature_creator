<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\Http\Requests;

use App\Company;

class StorageController extends Controller
{
    public function upload_form(){
    	return view('storage.upload');
    }

    public function upload(Request $request){
    	Storage::put(
            $request->file('file')->getClientOriginalName(),
            file_get_contents($request->file('file')->getRealPath())
        );

        return redirect()->back();
    }

    public function image(Request $request,$id){
    	$company = Company::find($id);

    	$file = $company->alias."/background.jpg";

    	if(!Storage::exists($file)){
        	Storage::makeDirectory($company->alias);
        }
        
    	Storage::put(
            $company->alias.'/background.jpg'/*.$request->file('file')->getClientOriginalName()*/,
            file_get_contents($request->file('file')->getRealPath())
        );

        return redirect()->back();
    }
}