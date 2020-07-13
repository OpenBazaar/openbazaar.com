<?php
$i = 0;

foreach($listings as $listing) {

    $verified = false;
    foreach($listing->relationships->moderators as $mod) {
        foreach($verified_mods as $vermod) {
            if($mod == $vermod->peerID) {
                $verified = true;
                break;
            }
        }
        if($verified) {
            break;
        }
    }
    $listing->has_verified_mod = $verified;

    if(!isset($query_string['type']) || $query_string['type'] != "cryptocurrency") {
        $is_crypto_listing = $listing->data->contractType == "CRYPTOCURRENCY";
        if($is_crypto_listing) {
            $price = pretty_price(1, $listing->data->coinType, 8);
        } else {
            $price = pretty_price($listing->data->bigPrice->amount, $listing->data->bigPrice->currencyCode);
        }
        ?>

        <div class="v2-listingBox" onclick="gotoListing('<?=$listing->relationships->vendor->data->peerID?>', '<?=$listing->data->slug?>');">
            <div class="v2-listingBoxImage">
                <img src="https://gateway.ob1.io/ob/images/<?=$listing->data->thumbnail->medium?>?usecache=true"/>
            </div>
            <div class="v2-listingBoxMetadata">
                <?=$listing->data->title?><br/>
                <span class="v2-listingBoxPrice"><?=pretty_price($listing->data->bigPrice->amount, $listing->data->bigPrice->currencyCode);?></span>
            </div>
        </div>

        <?php

    } else {

        $crypto_listing = $listing;

        $coin_amount = get_coin_amount($crypto_listing->data->coinType);

        ?>

        <div class="list-view-content" onclick="document.location.href='/<?=$listing->relationships->vendor->data->peerID?>/store/<?=$listing->data->slug?>';">
            <div class="row" style="align-items: center">
                <div class="column" style="width:78px;font-weight:bold;display: flex;align-items: center">
                    <img src="<?=asset_url()?>img/cryptoIcons/<?=$crypto_listing->data->acceptedCurrencies[0]?>-icon.png" width=18 height=18/> &nbsp; <?=$crypto_listing->data->acceptedCurrencies[0];?>
                </div>
                <div class="column" style="width:45px;">
                    <img src="<?=asset_url()?>img/icon-arrow.png" width=12 height=12 />
                </div>
                <div class="column  column-for-mobile" style="width:134px;font-weight:bold;display: flex;align-items: center">

                    <img src="<?=asset_url()?>img/cryptoIcons/<?=$crypto_listing->data->coinType?>-icon.png" width=18 height=18/> &nbsp; <?=$crypto_listing->data->coinType;?>
                </div>

                <div class="column" style="flex:1;">
                    <div class="Listview-Avatar-Circle" style="z-index:1000;float:left;background-image: url('<?php echo (($crypto_listing->relationships->vendor->data->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$crypto_listing->relationships->vendor->data->avatarHashes->small."?usecache=true" : asset_url()."img/defaultAvatar.png"?>');" title="<?=$crypto_listing->relationships->vendor->data->name?>" onclick="location.href='/<?=$crypto_listing->relationships->vendor->data->peerID?>/store'"></div>
                    <div>
                        <div style="width:130px; white-space:nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="/<?=$crypto_listing->relationships->vendor->data->peerID?>/store"><?=$crypto_listing->relationships->vendor->data->name?></a></div>
                        <div style="display:flex;align-items: center">
                            <div class="Listing-Star" style="width:15px;margin-left:0;font-size:10px;">⭐</div>
                            <div class="Listing-Rating" style="flex:1;font-size:12px;display: flex;">

                                <div style="float:left;color:#777777">
                                    <?=number_format($crypto_listing->relationships->vendor->data->stats->averageRating, 1)?> (<span class="underline"><?=$crypto_listing->relationships->vendor->data->stats->ratingCount?></span>)
                                </div>

                                <?php if($crypto_listing->has_verified_mod) { ?>

                                    <div class="verified-mod-badge" style="float:left;cursor:pointer;background-position: center center;width:16px;height:18px;background-size:16px 18px; background-repeat: no-repeat;background-image: url(https://search.ob1.io/images/verified_moderator_badge_tiny.png), url('../imgs/verifiedModeratorBadgeDefault-tiny.png');margin-left: 4px;">

                                        <div class="verified-mod-tip hidden up-arrow" style="width:250px">
                                            <div style="margin-left:auto;margin-right:auto;text-align: center;display: table">
                                                <img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=24 style="width:24px;text-align:right;display: table-cell;vertical-align: middle; " />
                                                <span style="vertical-align: middle;display: table-cell; font-weight: 700; font-size: 14px">Verified Moderator</span>
                                            </div>
                                            <p class="verified-mod-text" style="font-size:13px;">You can purchase this listing with a moderator verified by <b>OB1</b>. <br/> <a href="https://ob1.io/verified-moderators.html" style="text-decoration: underline !important; cursor: pointer !important;" target="_blank">Learn more</a></p>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="column" style="width:114px;">
                    <div style="float:right">
                        <?php
                        $modifier = $crypto_listing->data->bigPrice->modifier;
                        switch(true) {
                            case $modifier == 0:
                                $style = "cryptolisting-marketprice";
                                $modifier_caption = "market price";
                                $price_symbol = "checkmark";
                                break;
                            case $modifier > 0:
                                $style = "cryptolisting-above";
                                $modifier_caption = $modifier . "% above market";
                                $price_symbol = "arrow-round-up";
                                break;
                            case $modifier < 0:
                                $style = "cryptolisting-below";
                                $modifier_caption = abs($modifier) . "% below market";
                                $price_symbol = "arrow-round-down";
                                break;
                        }

                        ?>
                        <div style="text-align: right;">
                            <div class="<?=$style?>" style="font-size:14px;font-weight:bold;"><?=pretty_price(get_coin_amount($crypto_listing->data->coinType)*(1+($modifier/100)), $crypto_listing->data->coinType, 8)?> (<ion-icon name="<?=$price_symbol?>"></ion-icon>)</div>
                            <div class="modifier-caption <?=$style?>"><?=$modifier_caption?></div>
                        </div>
                        <!-- 									<span style="font-size:14px;"><?=pretty_price($coin_amount, $crypto_listing->data->coinType, 8)?></span> (<img src="<?=asset_url()?>img/ios7-checkmark-empty.png" width=12 height=12 />) -->
                    </div>
                </div>
                <div class="column" style="width:114px;text-align:right;">

                    <div style="display: flex;align-items: center;float:right;">
                        <?php
                        if(isset($crypto_listing->data->totalInventoryQuantity)) {
                            $inventory = $crypto_listing->data->totalInventoryQuantity / $crypto_listing->data->coinDivisibility;
                            echo number_format($inventory). " " . $crypto_listing->data->coinType;
                        } else {
                            echo '<span class="unknown">Unknown</span>';
                        }
                        ?> &nbsp; <img src="<?=asset_url()?>img/cryptoIcons/<?=$crypto_listing->data->coinType?>-icon.png" width=18 height=18/>
                    </div>
                </div>

            </div>




<?php } $i++; } ?>