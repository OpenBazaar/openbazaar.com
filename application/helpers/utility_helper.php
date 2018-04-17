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

