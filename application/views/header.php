<html>
	<head>
		<link rel="stylesheet" href="<?=asset_url()?>css/styles.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7157836/7751992/css/fonts.css" />
		<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.5"></script>
		<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.5"></script>
		<script src="<?=asset_url()?>js/jquery.3.3.1.js"></script>		
		<script src="<?=asset_url()?>js/script.js"></script>	
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75536111-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-75536111-2');
		</script>
	
		
		<title>OpenBazaar</title>
	</head>
	<body>
		
		<div class="Rectangle-3">
			
			<div style="display: table-cell;width:200px;">
				<div class="Icon-Frame clickable" style="float-left"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div> <div class="OpenBazaar" style="float:left;cursor:pointer;" onclick="location.href='/';">OpenBazaar</div>
			</div>
			
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
			
			<div style="display: table-cell;margin-right:10px;vertical-align: middle;padding-right:10px;"> 
				
				<div class="Config-Button" style="background-image: url('<?=asset_url()?>img/icon-gear.png')" onclick="location.href='/config';"></div>
				<form>
					<div class="Header-Select"><select>
						
            
            <option value="AFN">Afghani</option><option value="DZD">Algerian Dinar</option><option value="ARS">Argentine Peso</option><option value="AMD">Armenian Dram</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="AZN">Azerbaijanian Manat</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="THB">Baht</option><option value="PAB">Balboa</option><option value="BBD">Barbados Dollar</option><option value="BYR">Belarussian Ruble</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudian Dollar</option><option value="BTC" selected="">Bitcoin</option><option value="VEF">Bolivar</option><option value="BOB">Boliviano</option><option value="BRL">Brazilian Real</option><option value="BND">Brunei Dollar</option><option value="BGN">Bulgarian Lev</option><option value="BIF">Burundi Franc</option><option value="CVE">Cabo Verde Escudo</option><option value="CAD">Canadian Dollar</option><option value="KYD">Cayman Islands Dollar</option><option value="XOF">CFA Franc BCEAO</option><option value="XAF">CFA Franc BEAC</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="COP">Colombian Peso</option><option value="KMF">Comoro Franc</option><option value="CDF">Congolese Franc</option><option value="BAM">Convertible Mark</option><option value="NIO">Cordoba Oro</option><option value="CRC">Costa Rican Colon</option><option value="CUP">Cuban Peso</option><option value="CZK">Czech Koruna</option><option value="GMD">Dalasi</option><option value="DKK">Danish Krone</option><option value="MKD">Denar</option><option value="DJF">Djibouti Franc</option><option value="STD">Dobra</option><option value="DOP">Dominican Peso</option><option value="VND">Dong</option><option value="XCD">East Caribbean Dollar</option><option value="EGP">Egyptian Pound</option><option value="SVC">El Salvador Colon</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fiji Dollar</option><option value="HUF">Forint</option><option value="GHS">Ghana Cedi</option><option value="GIP">Gibraltar Pound</option><option value="HTG">Gourde</option><option value="PYG">Guarani</option><option value="GNF">Guinea Franc</option><option value="GYD">Guyana Dollar</option><option value="HKD">Hong Kong Dollar</option><option value="UAH">Hryvnia</option><option value="ISK">Iceland Krona</option><option value="INR">Indian Rupee</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="JMD">Jamaican Dollar</option><option value="JOD">Jordanian Dinar</option><option value="KES">Kenyan Shilling</option><option value="PGK">Kina</option><option value="LAK">Kip</option><option value="HRK">Kuna</option><option value="KWD">Kuwaiti Dinar</option><option value="MWK">Kwacha</option><option value="AOA">Kwanza</option><option value="MMK">Kyat</option><option value="GEL">Lari</option><option value="LBP">Lebanese Pound</option><option value="ALL">Lek</option><option value="HNL">Lempira</option><option value="SLL">Leone</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="SZL">Lilangeni</option><option value="LSL">Loti</option><option value="MGA">Malagasy Ariary</option><option value="MYR">Malaysian Ringgit</option><option value="MUR">Mauritius Rupee</option><option value="MXN">Mexican Peso</option><option value="MDL">Moldovan Leu</option><option value="MAD">Moroccan Dirham</option><option value="MZN">Mozambique Metical</option><option value="NGN">Naira</option><option value="ERN">Nakfa</option><option value="NAD">Namibia Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ANG">Netherlands Antillean Guilder</option><option value="ILS">New Israeli Sheqel</option><option value="TWD">New Taiwan Dollar</option><option value="NZD">New Zealand Dollar</option><option value="BTN">Ngultrum</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krone</option><option value="PEN">Nuevo Sol</option><option value="MRO">Ouguiya</option><option value="TOP">Pa'anga</option><option value="PKR">Pakistan Rupee</option><option value="MOP">Pataca</option><option value="UYU">Peso Uruguayo</option><option value="PHP">Philippine Peso</option><option value="GBP">Pound Sterling</option><option value="BWP">Pula</option><option value="QAR">Qatari Rial</option><option value="GTQ">Quetzal</option><option value="ZAR">Rand</option><option value="OMR">Rial Omani</option><option value="KHR">Riel</option><option value="RON">Romanian Leu</option><option value="MVR">Rufiyaa</option><option value="IDR">Rupiah</option><option value="RUB">Russian Ruble</option><option value="RWF">Rwanda Franc</option><option value="SHP">Saint Helena Pound</option><option value="SAR">Saudi Riyal</option><option value="RSD">Serbian Dinar</option><option value="SCR">Seychelles Rupee</option><option value="SGD">Singapore Dollar</option><option value="SBD">Solomon Islands Dollar</option><option value="KGS">Som</option><option value="SOS">Somali Shilling</option><option value="TJS">Somoni</option><option value="SSP">South Sudanese Pound</option><option value="LKR">Sri Lanka Rupee</option><option value="XSU">Sucre</option><option value="SDG">Sudanese Pound</option><option value="SRD">Surinam Dollar</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="BDT">Taka</option><option value="WST">Tala</option><option value="TZS">Tanzanian Shilling</option><option value="KZT">Tenge</option><option value="TTD">Trinidad and Tobago Dollar</option><option value="MNT">Tugrik</option><option value="TND">Tunisian Dinar</option><option value="TRY">Turkish Lira</option><option value="TMT">Turkmenistan New Manat</option><option value="AED">UAE Dirham</option><option value="UGX">Uganda Shilling</option><option value="USD">United States Dollar</option><option value="UZS">Uzbekistan Sum</option><option value="VUV">Vatu</option><option value="KRW">Won</option><option value="YER">Yemeni Rial</option><option value="JPY">Yen</option><option value="CNY">Yuan Renminbi</option><option value="ZMW">Zambian Kwacha</option><option value="ZWL">Zimbabwe Dollar</option><option value="PLN">Zloty</option>
            

					</select></div>
				</form>
			</div>
			
			
		</div>