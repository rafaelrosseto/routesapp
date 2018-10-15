<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Client;
use App\Adress;
use App\Services\GeoApiService;

class ImportHandlerService{

	public function handleImport(Request $request)
	{
		$file = $request->file('file');
		$data = file_get_contents($file);
		$row_delimiter=PHP_EOL; 
		$delimiter = ";";
		$enclosure = '"'; 
		$escape = "\\";
		$data = utf8_decode($data);
		$rows = array_filter(explode($row_delimiter, $data));
	    $header = NULL;
	    $client = array();

	    foreach($rows as $row)
	    {
	        $row = str_getcsv($row, $delimiter, $enclosure , $escape);
	        if(!$header)
	            $header = $row;
	        else
	            $client[] = array_combine($header, $row);
	    }

	    $rs = array(); 
	    foreach ($client as $cli) 
	    {
	    	$address = $this->handleAdress($cli['endereco']);
	    	$geo = new GeoApiService;
	    	$geolocation = $geo->getGeolocation($address);
	    	$address = array_merge($address, $geolocation);
	    	$this->uploadData($cli, $address);
	    }

		return "Data was fully uploaded"; 
	}

	private function handleAdress(String $address)
	{
		$splitted_address = explode('-', $address);
		preg_match("/([0-9])\w+/", $splitted_address[0], $m);
		$len = strlen($m[0]);
		$pos = stripos($splitted_address[0], $m[0]);
		$complement = substr($splitted_address[0], $pos + $len, -1);
		$street = substr($splitted_address[0], 0, $pos);
		$street = str_replace(",", "", $street);

		$fixed_array['logradouro'] = $street;
		$fixed_array['numero'] = $m[0];
		$fixed_array['complemento'] = $complement;
		$fixed_array['bairro'] = $splitted_address[1];
		$fixed_array['cidade'] = $splitted_address[2];

		return $fixed_array;
	}

	private function uploadData(Array $client, Array $address)
	{
		$adr = new Adress;
		$adr->logradouro = $address['logradouro'];
		$adr->numero = $address['numero'];
		$adr->complemento = $address['complemento'];
		$adr->bairro = $address['bairro'];
		$adr->cidade = $address['cidade'];
		$adr->cep = $client['cep'];
		$adr->latitude = $address['latitude'];
		$adr->longitude = $address['longitude'];
		$adr->save();
		$address_id = $adr->id;


		$cli = new Client;
		$cli->name = $client['nome'];
		$cli->email = $client['email'];
		$cli->birthdate = date('Y-m-d', strtotime($client['datanasc']));
		$cli->cpf = $client['cpf'];
		$cli->adress_id = $address_id;
		$cli->save();
		

		return True;
	}


}