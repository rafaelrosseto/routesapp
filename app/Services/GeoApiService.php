<?php

namespace App\Services;

class GeoApiService{

	public function getGeolocation($address)
	{
		$address = "{$address['logradouro']}, {$address['numero']} {$address['bairro']}, {$address['cidade']}";
		$address = urlencode($address);
	    
	    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyDc32_VwDuwlG2R8xJI8xuKyu_zfZ5jkJ0";
	 
	    $resp_json = file_get_contents($url);
	    $resp = json_decode($resp_json, true);

	    if($resp['status']=='OK'){
	    	$geometry = $resp['results'][0]['geometry']['location'];
	        $lati = isset($geometry['lat']) ? $geometry['lat'] : "";
	        $longi = isset($geometry['lng']) ? $geometry['lng'] : "";
	        $geo['latitude'] = $lati;
	        $geo['longitude'] = $longi;

	        return $geo; 
	    }else{
	        return false;
	    }
	}


}