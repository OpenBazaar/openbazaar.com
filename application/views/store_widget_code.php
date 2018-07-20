<html>
	<head>

<link rel="stylesheet" href="<?=asset_url()?>css/widget.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">

</head>
<body>

<div class="Widget-Frame">
    <div class="Widget-Header">
        <div class="Widget-Logo">
            <div class="Icon-Frame clickable"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div>
   			<div class="OpenBazaar"><a href="/" title="OpenBazaar"><img src="<?=asset_url()?>img/icon-openbazaar-text.png" style="width: 86px;height:14px;" /></a></div>
   			<div>A free marketplace✌️</div>
        </div>
        <div class="Widget-Logo-Caption"></div>
    </div>
    <div class="Widget-HeaderImage" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->small : ''; ?>'), url('<?=asset_url()?>img/defaultHeader.png');">
    </div>
    <div class="Widget-Store-Infobox">
        <div class="Widget-Store-Infobox-Header">
            <div class="Store-Avatar">
            <img width="26" height="26" style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
            </div>
            <div><?=$profile->name?></div>
        </div>
        <div class="Widget-Store-Infobox-Description"><?=$profile->shortDescription?></div>
        <div class="Widget-Store-Infobox-Metabar">📍
            <div style="flex:1;"><?=$profile->location?></div>
            <div style="flex:1;text-align:right;">⭐<?=number_format($profile->stats->averageRating, 1)?> (<a href="#"><?=$profile->stats->ratingCount?></a>)</div>
        </div>
    </div>
    <div class="Widget-Listings-Container">
        <div class="Widget-Tabs">
            <div class="Widget-Tab Widget-Tab-Active">Store</div>
            <div class="Widget-Tab">About</div>
        </div>
        <div class="Widget-Listing-Container">
            <?php
                $i = 0;

                if($listings) {
                    foreach($listings as $listing) {
                        if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") {
                            $coinType = $listing->coinType;
                            $price = pretty_price(get_coin_amount($coinType), $coinType, 8);
                        } else {
                            $price = pretty_price($listing->price->amount, $listing->price->currencyCode);
                        }

                ?>

                    <div class="Widget-Listing">

                    <div rating="<?=$listing->averageRating?>" freeShipping="<?=implode($listing->freeShipping, ",")?>" category="<?=($listing->categories) ?implode(",", $listing->categories): "";?>" class="Store-Body-Listing-Box  <?php if($i%3==2) { echo "Discover-Body-Listing-Box-Last"; } ?>">

                        <a class="Discover-Body-Listing-Link" href="/store/<?=$profile->peerID?>/<?=$listing->slug?>" title="<?=$listing->title?>"></a>
                        <?php if($verified_mod) { ?>
                        <div class="verified-mod-badge" style="float:left;cursor:pointer;background-position: center center;width:36px;height:36px;background-size:24px 24px; background-repeat: no-repeat;background-image: url(https://search.ob1.io/images/verified_moderator_badge_tiny.png), url('../imgs/verifiedModeratorBadgeDefault-tiny.png');">

                            <div class="verified-mod-tip hidden up-arrow" style="width:250px">
                                <div style="margin-left:auto;margin-right:auto;text-align: center;display: table">
                                    <img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=24 style="width:24px;text-align:right;display: table-cell;vertical-align: middle; " />
                                    <span style="vertical-align: middle;display: table-cell; font-weight: 700; font-size: 14px">Verified Moderator</span>
                                </div>
                                <p class="verified-mod-text" style="font-size:13px;">You can purchase this listing with a moderator verified by <b>OB1</b>. <br/> <a href="https://ob1.io/verified-moderators.html" style="text-decoration: underline !important; cursor: pointer !important;" target="_blank">Learn more</a></p>

                            </div>
                        </div>
                        <?php } ?>

                        <div class="Store-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small?>'), url('<?=asset_url()?>img/defaultItem.png');" onclick="window.top.location.href='/store/<?=$profile->peerID?>/<?=$listing->slug?>'" title="<?=$listing->title?>">
                            <?php if(count($listing->freeShipping) > 0) { ?>
                            <div class="phraseBox" style="margin:8px 8px 0 0;">FREE SHIPPING</div>
                            <?php } ?>
                        </div>

                    </div>

                    </div>

                <?php }
                $i++; } else { echo '<div class="box" style="text-align:center;"><p>This store has no listings</p></div>'; } ?>
                <br clear="both"/>

            </div>
        </div>
    </div>
</div>


</body>
</html>