<html>
	<head>
        <link rel="stylesheet" href="<?=asset_url()?>css/widget.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Noto+Sans:400,700" rel="stylesheet">
        <script>
        function toggleWidgetTab(tab) {
            var pElements = document.getElementsByClassName("Widget-Tab");
            var tabs = [].slice.call(pElements);

            // Clear active tabs
            tabs.forEach(function(e) {
                e.classList.remove("Widget-Tab-Active");
            });

            // Set active tab
            var storeTab = document.getElementById("Widget-Listings-Panel");
            var aboutTab = document.getElementById("Widget-About-Panel");

            if(tab == "store") {
                tabs[0].classList.add("Widget-Tab-Active");
                storeTab.style.display='flex';
                aboutTab.style.display='none';
            } else {
                tabs[1].classList.add("Widget-Tab-Active");
                aboutTab.style.display='flex';
                storeTab.style.display='none';
            }

        }
        </script>
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
                    <div class="Widget-Tab Widget-Tab-Active" onclick="toggleWidgetTab('store')">Store</div>
                    <div class="Widget-Tab" onclick="toggleWidgetTab('about')">About</div>
                </div>
                <div id="Widget-About-Panel" style="display:none;font-size: 14px;flex-direction:column">

                    <div class="store-social-mobile-container">

                    	<div class="social-row-mobile">
                    		<div>OpenBazaar ID</div>
                    		<div><?=$profile->peerID?></div>
                    	</div>

                    	<?php if($profile->contactInfo->website) { ?>
                    	<div class="social-row-mobile">
                    		<div>Web Site</div>
                    		<div><a target="_blank" href="<?=sani_input($profile->contactInfo->website);?>" target="_blank"><?=sani_input($profile->contactInfo->website);?></a></div>
                    	</div>
                    	<?php } ?>

                    	<?php if($profile->contactInfo->email) { ?>
                    	<div class="social-row-mobile">
                    		<div>Email</div>
                    		<div><a href="mailto:<?=sani_input($profile->contactInfo->email)?>"><?=sani_input($profile->contactInfo->email)?></a></div>
                    	</div>
                    	<?php } ?>

                    	<?php if($profile->contactInfo->phoneNumber) { ?>
                    	<div class="social-row-mobile">
                    		<div>Phone</div>
                    		<div><?=sani_input($profile->contactInfo->phoneNumber)?></div>
                    	</div>
                    	<?php } ?>

                    	<?php foreach($profile->contactInfo->social as $social) { ?>
                    	<div class="social-row-mobile">
                    		<div><?=sani_input($social->type)?></div>
                    		<div><a href="<?=sani_input($social->username)?>" target="_blank"><?=sani_input($social->username)?></a></div>
                    	</div>
                    	<?php } ?>

                    </div>

                    <div style="padding:8px;">
                        <div class="filter-box-header">About</div>
                        <div style="overflow-x: scroll;width:100%;">
                            <?=($profile->about!="")?$profile->about:"<span class='inactive-text'>No description entered</span>"?>
                        </div>
                    </div>

                </div>
                <div id="Widget-Listings-Panel"  class="Widget-Listing-Container">
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