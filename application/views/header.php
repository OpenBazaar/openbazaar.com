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

		<link rel="stylesheet" href="<?=asset_url()?>css/styles.css?4">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" href="<?=asset_url()?>css/flickity.css" media="screen">
		<link rel="icon" type="image/png" href="<?=asset_url()?>/img/base-rounded.png" />

		<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.5"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="<?=asset_url()?>js/script.js?7"></script>
		<script src="<?=asset_url()?>js/flickity.pkgd.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.plugins.min.js"></script>
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
	<body id="<?=(isset($body_class)) ? $body_class : "";?>" class="<?php if(isset($_SESSION['hidebanner'])) { ?>no-promotion<?php } ?>">
		
		<svg style="position: absolute; width: 0; height: 0; overflow: hidden">
    <defs>
        <symbol id="havenIcon" viewBox="0 0 109 53">
            <path d="M51.2701217,20.0834631 C51.791955,20.6085209 52.1833299,21.765903 52.4442466,23.5556093 L54.5691038,43.3919111 L55.1838714,43.3919111 L56.9620501,23.5556093 C57.0227519,21.9582991 57.343234,20.8009171 57.9234962,20.0834631 C58.5037585,19.3660091 59.7166909,18.6274306 61.5622937,17.8677274 L109,0 C107.209363,8.40106912 93.2825767,14.5930779 65.9660836,25.9776912 L65.7718396,27.9681169 L103.306644,13.3689452 C101.713516,21.7189074 89.0207268,27.7616855 64.124863,38.8030422 L63.9730588,40.5053256 L95.8764089,26.9340548 C94.9949644,32.4094103 84.17041,40.364508 63.4027459,50.7993478 C60.102278,52.2664493 57.1577306,53 54.5691038,53 C51.980477,53 49.0543997,52.2664493 45.790872,50.7993478 C24.8930015,40.3631584 14.0038941,32.4080607 13.1235497,26.9340548 L45.0268998,40.5053256 L44.8750955,38.8050874 C19.9792317,27.7617062 7.28643414,21.7189281 5.69331479,13.3709903 L43.226502,27.9680858 L43.032258,25.97766 C15.7156819,14.5929949 1.78885433,8.40103797 0,0 L46.7925122,17.471743 C49.0373585,18.468089 50.529895,19.3386623 51.2701217,20.0834631 Z" id="Path"></path>
        </symbol>
    </defs>
</svg>
<div id="havenBar">
    <div style="
        background-color:#f97016;
        border-bottom-left-radius:4px;
        border-bottom-right-radius:4px;
        padding:4px 26px 8px 26px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    ">
        <div style="
            color:#fff;
            font-size:14px;
            font-weight:700;
            font-family:'Helvetica Neue', Arial, sans-serif;
            text-align: center;
        ">
            <svg style="
                width: 1.5em;
                height: 0.75em;
                fill: #fff;
                margin-right: 0.5em;
                position: relative;
                top: -0.1em;
            ">
                <use xlink:href="#havenIcon"></use>
            </svg>
            Want OpenBazaar on mobile? <a href="https://gethaven.app" target="_blank" style="color:#fff; text-decoration:underline;">gethaven.app</a>
        </div>
    </div>
</div>
<style>
    #havenBar {
        position:fixed;
        z-index:1000;
        top: 55px;
        left: 50%;
        transform:translateX(-50%);
        min-width: 400px;
    }
    
    @media only screen and (min-width: 768px) and (max-device-width: 1024px) {

        #havenBar ~.Discover-Header-Bar {
            padding-top: 26px;
        }

        #user-listing #havenBar {
            top: 0px;
        }

        #havenBar ~.Store-Hero .Store-Home-Mini-Header {
            background-color: #fff;
            height: 126px;
        }
    }
</style>


		
		<script>$(window).resize(function(){});</script>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPBD6R9"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div class="Rectangle-3">

			<div class="logo-title">
				<div class="Icon-Frame clickable"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div>
				<div class="OpenBazaar" style="float:left"><a href="/" title="OpenBazaar"><img src="<?=asset_url()?>img/icon-openbazaar-text.png" style="margin-top:22px; width: 100px;" /></a></div>
			</div>

			<div class="back-btn-frame">
				<div class="Back-Button button" style="background-image: url('<?=asset_url()?>img/icon-back.png')">
					<a href="<?php if(isset($_SERVER['HTTP_REFERER'])) { echo strpos($_SERVER['HTTP_REFERER'], '/') ? $_SERVER['HTTP_REFERER'] : '/store'; } ?>"></a>
				</div>
			</div>			

			<div class="config-btn-frame">

				<?php if(isset($_COOKIE['currency']) && $_COOKIE['currency'] != "BTC") { ?>
				<div class="btc-price" style="box-sizing: border-box;padding:8px;padding-left:0px;float:right;margin-right:2px;font-size:13px;">
					<img src="<?=asset_url()?>img/btcIcon128.png" /> <?=pretty_price(100000000, "BTC")?>
					<img src="<?=asset_url()?>img/bchIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "BCH")?>
					<img src="<?=asset_url()?>img/ltcIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "LTC")?>
					<img src="<?=asset_url()?>img/zecIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "ZEC")?>
					<img src="<?=asset_url()?>img/ethIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "ETH")?>
				</div>
				<?php } ?>

				<div class="header-search">
					<form id="frm-header-search" onsubmit="return processHeaderSearch();">
						<input class="header-search-input" type="text" name="q" value="<?=(isset($q))? $q :"";?>" placeholder="🔍 Search" />
						<input type="submit" style="display: none" />
					</form>
				</div>
				
				<div class="Config-Button button" style="background-image: url('<?=asset_url()?>img/icon-gear.png');margin-right:3px;" onclick="$('#Config-Modal').toggle();$('#Config-Modal').load('/config');"></div>

				

			</div>


		</div>
