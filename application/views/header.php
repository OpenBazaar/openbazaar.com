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
			
			<div style="display: table-cell;width:220px;">
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
				
				<div class="Config-Button" style="background-image: url('<?=asset_url()?>img/icon-gear.png')" onclick="$('body').append('<div class=overlay><div class=content></div></div>');"></div>
				
			</div>
			
			
		</div>