<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Exports\ClientExport;
use Maatwebsite\Excel\Facades\Excel;


class GridController extends Controller
{
    public function index()
    {
    	$clients = Client::with('adress')->get();

    	return response()->view('home', ['clients' => $clients]);
    }

    public function export()
	{
		return Excel::download(new ClientExport, 'clients.csv');
	}
}
