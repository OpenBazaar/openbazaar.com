<?php
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
	setcookie("country", "UNITED_STATES", time() + (86400 * 30), "/");
}

if(!isset($_COOKIE['currency'])) { 
	setcookie("currency", "BTC", time() + (86400 * 30), "/");
}

$locale = ( isset($_COOKIE['locale']) ) ? 
            $_COOKIE['locale'] : 
            $_SERVER['HTTP_ACCEPT_LANGUAGE'];
setlocale(LC_ALL, $locale);

?>
<html>
	<head>
		<link rel="stylesheet" href="<?=asset_url()?>css/styles.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7157836/7751992/css/fonts.css" />
		<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.5"></script>
		<script src="<?=asset_url()?>js/jquery.3.3.1.js"></script>		
		<script src="<?=asset_url()?>js/script.js"></script>	
		<script src="<?=asset_url()?>js/ipfs.js"></script>
		<script src="<?=asset_url()?>js/flickity.pkgd.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.7/jquery.lazy.plugins.min.js"></script>
		

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
		<link rel="stylesheet" href="<?=asset_url()?>css/flickity.css" media="screen">
		
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75536111-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-75536111-2');
		</script>
		
<!--
		 <script type="text/javascript">
		    const node = new Ipfs({ repo: 'ipfs-' + Math.random() })
		    node.once('ready', () => {
		      console.log('Online status: ', node.isOnline() ? 'online' : 'offline')
		      console.log( 'Node status: ' + (node.isOnline() ? 'online' : 'offline'));
		      // You can write more code here to use it. Use methods like 
		      // node.files.add, node.files.get. See the API docs here:
		      // https://github.com/ipfs/interface-ipfs-core
		      
			  const addr = 'QmTTAQsq9TdbpBq69oiV6hFXkFKktsKwAcDnbxFTkNNyv1';

				node.id(function (err, name) {
				    console.log(name)
				    // /ipfs/QmQrX8hka2BtNHa8N8arAq16TCVx5qHcb46c5yPewRycLm
				})
		    })
		  </script>
-->
	
		<title><?=(isset($page_title))?$page_title:"";?>OpenBazaar</title>
	</head>
	<body>

		<div class="Rectangle-3">						
			
			<div class="logo-title">
				<div class="Icon-Frame clickable"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div> 
				<div class="OpenBazaar" style="float:left;cursor:pointer;" onclick="location.href='/';">OpenBazaar</div>
			</div>
			
			<div class="search-icons">
				<div class="search-icon-frame" style="border-bottom:1px solid black;width:36px;">
					<div class="search-icon"><a href="/discover/results"><img src="<?=asset_url()?>/img/icon-ob1.png" width=36 height=36 title="OB1" /></a></div>
				</div>
				<div style="display: table-cell;width:10px;"></div>
				<div class="search-icon-frame" >
					<div class="search-icon"><a href="https://blockbooth.com" target="_blank"><img src="<?=asset_url()?>/img/icon-block-booth.png" width=36 height=36 title="Block Booth" /></a></div>
				</div>
				<div style="display: table-cell;width:10px;"></div>
				<div class="search-icon-frame">
					<div class="search-icon"><a href="https://bazaar.dog" target="_blank"><img src="<?=asset_url()?>/img/icon-bazaar-dog.png" width=36 height=36 title="Bazaar Dog" /></a></div>
				</div>
			</div>
			
			<div class="config-btn-frame"> 
				
				<div class="Config-Button" style="background-image: url('<?=asset_url()?>img/icon-gear.png')" onclick="$('#Config-Modal').toggle();$('#Config-Modal').load('/config');"></div>
				
				<div class="header-search">
					<form id="frm-header-search" onsubmit="return processHeaderSearch();">
						<input class="header-search-input" type="text" name="term" value="" placeholder="🔍 Search OB1..." />
						<input type="submit" style="display: none" />
					</form>
				</div>
				
				<?php if(isset($_COOKIE['currency']) && $_COOKIE['currency'] != "BTC") { ?>
				<div class="btc-price" style="box-sizing: border-box;padding:8px; float:right;margin-right:10px;font-size:13px;">
					BTC <?=pretty_price(100000000, "BTC")?>
					BCH <?=pretty_price(100000000, "BCH")?>
					ZEC <?=pretty_price(100000000, "ZEC")?>
				</div>
				<?php } ?>
				
			</div>
			
			
		</div>				