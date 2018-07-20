<html>
	<head>

<link rel="stylesheet" href="<?=asset_url()?>css/widget.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">

</head>
<body>

<div class="Widget-Frame">
    <div class="Widget-Header">
        <div class="Widget-Logo"></div>
        <div class="Widget-Logo-Caption"></div>
    </div>
    <div class="Widget-HeaderImage" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->small : ''; ?>'), url('<?=asset_url()?>img/defaultHeader.png');">
    </div>
    <div class="Widget-Store-Infobox">
        <div class="Widget-Store-Infobox-Header"></div>
        <div class="Widget-Store-Infobox-Description"></div>
        <div class="Widget-Store-Infobox-Metabar"></div>
    </div>
    <div class="Widget-Listings-Container">
        <div class="Widget-Tabs">
            <div class="Widget-Tab Widget-Tab-Active">Store</div>
            <div class="Widget-Tab">About</div>
        </div>
        <div class="Widget-Listing"></div>
    </div>
</div>


</body>
</html>