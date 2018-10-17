<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeoApiService;
use App\Adress;

class DeliveryRoutesController extends Controller
{
    public function index()
    {
    	return response()->view('delivery');
    }

    public function getRoutes(Request $request, GeoApiService $geo)
    {

    	$start_point = $request->input('start');
    	$address = Adress::all()->toArray();
    	$result = $geo->getRoutes($start_point, $address);
    	return response()->view('delivery', ['routes' => $result]);
    }
}
