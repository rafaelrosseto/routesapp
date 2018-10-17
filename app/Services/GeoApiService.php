<?php

namespace App\Services;

class GeoApiService{

	public function getGeolocation($address, $fix_adress=True)
	{
		if($fix_adress){
			$address = "{$address['logradouro']}, {$address['numero']} {$address['bairro']}, {$address['cidade']}";
		}
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

	public function getRoutes($initial, $address, $route = [])
	{

		if(!is_array($initial)){
			$node_a = $this->getGeolocation($initial, false);
		}else{
			$node_a = $initial;
		}

		$route[] = $initial;

		for ($i=0; $i < count($address); $i++) { 
			$distance = $this->getDistance($node_a['latitude'], $node_a['longitude'], $address[$i]['latitude'], $address[$i]['longitude']);
			if(isset($minor_distance) && $distance < $minor_distance){
				$minor_distance = $distance;
				$node = $i;
			}elseif(!isset($minor_distance)){
				$minor_distance = $distance;
				$node = $i;
			}
		}

		if(count($address) > 0){
			$new_initial = $address[$node];
			unset($address[$node]);
			$address = array_values($address);
			return $this->getRoutes($new_initial, $address, $route);
		}else{
			return $route;
		}

	}

	private function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
	{
		/*
		* Haversine formula
		*/
		$latFrom = deg2rad($latitudeFrom);
		$lonFrom = deg2rad($longitudeFrom);
		$latTo = deg2rad($latitudeTo);
		$lonTo = deg2rad($longitudeTo);

		$latDelta = $latTo - $latFrom;
		$lonDelta = $lonTo - $lonFrom;

		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
		cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
		return $angle * $earthRadius;
	}


}