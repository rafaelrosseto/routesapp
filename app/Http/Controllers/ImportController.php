<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\ImportHandlerService;

class ImportController extends Controller
{
    public function index(){

    	return response()->view('import');
    }

    public function handleImport(Request $request, ImportHandlerService $handler){

    	$validator = Validator::make($request->all(), [
    		'file' => 'required'
    	]);

    	if ($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}

    	$rs = $handler->handleImport($request);


    	return redirect('import')->withSuccess($rs);
    }
}
