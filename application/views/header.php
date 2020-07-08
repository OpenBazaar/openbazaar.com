<?php

header("Cache-Control: public, max-age=60, s-maxage=60");

// autodetect user's language
if(!isset($_COOKIE['language'])) {

	/**
	 * Get browser language, given an array of avalaible languages.
	 *
	 * @param  [array]   $availableLanguages  Avalaible languages for the site
	 * @param  [string]  $default             Default language for the site
	 * @return [string]                       Language code/prefix
	 */
	function get_browser_language( $available = [], $default = 'en' ) {
		if ( isset( $_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ] ) ) {
			$langs = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
	    if ( empty( $available ) ) {
	      return $langs[ 0 ];
	    }
			foreach ( $langs as $lang ){
				$lang = substr( $lang, 0, 2 );
				if( in_array( $lang, $available ) ) {
					return $lang;
				}
			}
		}
		return $default;
	}

	$languages = file_get_contents(asset_url().'js/languages.json');
	$languages = json_decode($languages, true);

	$available_languages = array();
	foreach($languages as $lang) {
		array_push($available_languages,$lang['code']);
	}

	$language = get_browser_language( $available_languages, "en");

	setcookie("language", $language, time() + (86400 * 30), "/");

}

if(!isset($_COOKIE['country'])) {
	$ipinfo = ip_info();
	if($ipinfo) {
		$country = country_code_to_name($ipinfo['country_code']);
	} else {
		$country = "UNITED_STATES";
	}
	setcookie("country", $country, time() + (86400 * 30), "/");
	$_COOKIE['country'] = $country; // Won't set until page load
}

if(!isset($_COOKIE['currency'])) {
	// Try to map country name to currency otherwise fall back to BTC
	$countries = file_get_contents(asset_url().'js/countries.json');
	$countries = json_decode($countries, true);

	$user_country = $_COOKIE['country'];

	foreach($countries as $json_country) {
		if($_COOKIE['country'] == $json_country['dataName']) {
			setcookie("currency", $json_country['currency'], time() + (86400 * 30), "/");
			$_COOKIE['currency'] = $json_country['currency'];
			break;
		}
	}

	if($_COOKIE['currency'] == "") {
		setcookie("currency", "BTC", time() + (86400 * 30), "/");
	}

}

$locale = ( isset($_COOKIE['locale']) ) ?
            $_COOKIE['locale'] :
            $_SERVER['HTTP_ACCEPT_LANGUAGE'];
setlocale(LC_ALL, $locale);

if(!isset($tab)) {
    $tab = "";
}

?>
<html>
	<head>

		<meta name="description" content="A free online marketplace to buy and sell goods / services using cryptocurrency. OpenBazaar is a peer-to-peer ecommerce platform with no fees or restrictions."/>
		<meta name="keywords" content="shop,online,search,openbazaar,bitcoin,crypto,bitcoin cash,zcash,crypto,buy" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

		<meta property="og:title" content="<?=(isset($page_title))?ucfirst($page_title):"";?>OpenBazaar">
		<meta property="og:description" content="<?=(isset($page_description))?$page_description:"";?>">
		<meta property="og:image" content="<?=(isset($page_image))?$page_image:"";?>">
		<meta property="og:url" content="<?="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="apple-itunes-app" content="app-id=1318395690, app-argument=https://developer.apple.com/wwdc/schedule, affiliate- data=optionalAffiliateData">

		<link rel="stylesheet" href="<?=asset_url()?>css/styles.css?7">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" href="<?=asset_url()?>css/flickity.css" media="screen">
		<link rel="icon" type="image/png" href="<?=asset_url()?>/img/base-rounded.png" />

		<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.5"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="<?=asset_url()?>js/script.js?7"></script>
		<script src="<?=asset_url()?>js/flickity.pkgd.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.plugins.min.js"></script>
        <script type="text/javascript" src="<?=asset_url()?>/js/jquery.inview.min.js"></script>
		<script src="//unpkg.com/ionicons@4.3.0/dist/ionicons.js"></script>
		
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KPBD6R9');</script>
		<!-- End Google Tag Manager -->

		<title><?=(isset($page_title))?ucfirst($page_title):"";?>OpenBazaar</title>
	</head>
	<body id="<?=(isset($body_class)) ? $body_class : "";?>">

        <script>$(window).resize(function(){});</script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPBD6R9"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <?php
            if(!$this->agent->is_mobile()) {
                $this->load->view('header_body', array('tab'=>$tab));
            } else {
                $this->load->view('header_body_mobile');
            }
        ?>

