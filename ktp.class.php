<?php 

class Constans
{
	const api_endpoint	= 'https://www.renirails.io';
	const api_password	= 'ReniRails (https://www.renirails.io)';
}

class Request
{
	public function CurlGet($url, $headers){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}

class KTP
{
	
	protected $nik;
	
	public function __construct($nik = null){
		$this->nik = $nik;
	}
	
	public function check(){
		$headers = array(
			'request_key: ' . Constans::api_password,
		);
		return Request::CurlGet(Constans::api_endpoint . "/api/v2.0/e-ktp/" . $this->nik, $headers);
	}
}
