<?php 
	
function asset_url(){
   return base_url().'assets/';
}

function convert_price($amount, $from, $to, $precision=4) {
	
	$CI =& get_instance();
	
	$CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	
	$ob_ticker = $CI->cache->get('ob_ticker');
	
	if($ob_ticker == "") {
		$ob_ticker = json_decode(file_get_contents("https://ticker.openbazaar.org/api"));	
	}
	
	
	
	$e = $CI->cache->file->save('ob_ticker', $ob_ticker, 3600);

	
	$price_in_bitcoin = ($amount/100) / $ob_ticker->$from->last;
	
	return number_format($price_in_bitcoin, $precision);
	
}

function contract_type_to_friendly($type) {
	switch($type) {
		case "PHYSICAL_GOOD":
			return "Physical Good";
			break;
		case "DIGITAL_GOOD":
			return "Digital Good";
			break;
		case "SERVICE":
			return "Service";
			break;
		default:
			return "";
	}
}

function condition_to_friendly($condition) {
	
	switch($condition) {
		case "NEW":
			return "New";
			break;
		case "USED_EXCELLENT":
			return "Used - Excellent";
			break;
		case "USED_GOOD":
			return "Used - Good";
			break;
		case "USED_POOR":
			return "Used - Poor";
			break;
		case "REFURBISHED":
			return "Refurbished";
			break;
		default:
			return "";
	}
	
}

function set_new_url($url_params, $name, $value) {
	
	//if(isset($url_params[$name])) {
	$url_params[$name] = urlencode($value);
	//}	
	$URI = http_build_query($url_params);
	
	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
	
	return "//$_SERVER[HTTP_HOST]$uri_parts[0]?$URI";
}