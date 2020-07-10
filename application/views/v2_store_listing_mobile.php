<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@openbazaar" />
<meta name="twitter:title" content="OpenBazaar: <?=$listing->item->title?>" />
<?php if($description!="") { ?>
    <meta name="twitter:description" content="<?=$description?>" />
<?php } ?>
<meta name="twitter:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium. "?usecache=true" : ''; ?>" />

<meta property="og:title" content="OpenBazaar: <?=$listing->item->title?>">
<meta property="og:description" content="<?=$description?>">
<meta property="og:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium . "?usecache=true": ''; ?>">
<meta property="og:url" content="https://openbazaar.com/<?=$profile->peerID?>/store/<?=$listing->slug?>">

<div id="v2-bodyContainer-mobile">
    <div class="v2-listingImage-mobile">
        <img src="https://gateway.ob1.io/ob/images/<?php echo $listing->item->images[0]->medium ?>?usecache=true"/>
    </div>

    <div class="v2-listingImageCarousel-mobile">
        <?php foreach($listing->item->images as $image) { ?>
            <div class="v2-listingImageCarouselThumb-mobile">
                <img src="https://gateway.ob1.io/ob/images/<?php echo $image->tiny ?>?usecache=true"/>
            </div>
        <?php } ?>
        <?php foreach($listing->item->images as $image) { ?>
            <div class="v2-listingImageCarouselThumb-mobile">
                <img src="https://gateway.ob1.io/ob/images/<?php echo $image->tiny ?>?usecache=true"/>
            </div>
        <?php } ?>
    </div>

    <div class="v2-storeInfoContainer-mobile">
        <div class="v2-listingStoreName-mobile"><?=$profile->name?></div>
        <div class="v2-listingTitle-mobile"><?=$listing->item->title?></div>
    </div>

    <div class="v2-listingmetadata">
        <div class="v2-metadata-listingreviews">⭐ <?=number_format($rating,1)?> | <?=$ratings?> reviews</div>
        <div class="v2-metadata-listingcondition"><?=contract_type_to_friendly($listing->metadata->contractType)?> - <?=condition_to_friendly($listing->item->condition)?></div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Description</div>
        <div style="overflow-wrap: break-word;">
            <?php if(isset($listing->item->description)) { ?>
                <div><?=strip_tags($listing->item->description)?></div>
            <?php } else { ?>
                <div class="inactive-text" style="font-size: 14px">No description entered</div>
            <?php } ?>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Reviews</div>
        <div>
            <?php $this->load->view('listing_reviews'); ?>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Accepts</div>
        <div>
            <?php
            $coins = array(
                "BCH" => array("label"=>"Bitcoin Cash", "icon"=>"bchIcon128.png"),
                "BTC" => array("label"=>"Bitcoin", "icon"=>"btcIcon128.png"),
                "LTC" => array("label"=>"Litecoin", "icon"=>"ltcIcon128.png"),
                "ZEC" => array("label"=>"Zcash", "icon"=>"zecIcon128.png"),
                "ETH" => array("label"=>"Ethereum", "icon"=>"ethIcon128.png")
            );

            foreach($listing->metadata->acceptedCurrencies as $acceptedCurrency) { ?>
                <div class="v2-acceptedPaymentsRow">
                    <img class="v2-currencyIcon" src="<?=asset_url()?>img/<?=$coins[$acceptedCurrency]['icon']?>"/>
                    <?=$coins[$acceptedCurrency]['label']?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Return policy</div>
        <div>
            <?=(isset($listing->refundPolicy)) ? $listing->refundPolicy : ""?>
            <?php if(empty($listing->refundPolicy)) { ?>
                <div>No return policy entered</div>
            <?php } ?>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Terms of Service</div>
        <div>
            <?=(isset($listing->termsAndConditions)) ? $listing->termsAndConditions : ""?>
            <?php if(empty($listing->termsAndConditions)) { ?>
                <div >No terms and conditions entered</div>
            <?php } ?>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Tags</div>
        <div style="display: flex;flex-wrap: wrap;">
            <?php foreach($listing->item->tags as $tag) { ?>
                <a href="/discover/results?q=<?=urlencode($tag)?>" title="Search for <?=$tag?>"><div class="v2-tag"><?=$tag?></div></a>
            <?php } ?>
            <?php if(count($listing->item->tags) == 0) { ?><span class="inactive-text" style="font-size: 13px">No tags entered</span><?php } ?>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>Seller</div>
        <div class="v2-sellerContainer">
            <a href="/<?=$profile->peerID?>/store"><div class="v2-sellerAvatar" style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny. "?usecache=true" : asset_url().'img/defaultAvatar.png?>'; ?>');"></div></a>
            <div class="v2-sellerDetails">
                <div class="v2-sellerName"><?=$profile->name?></div>
                <a href="/<?=$profile->peerID?>/store"><div class="v2-visitStoreButton">Visit Store</div></a>
            </div>
        </div>
    </div>

    <div class="v2-listingdescription-mobile">
        <div>You may also like</div>
        <?php $this->load->view('listing_mayalsolike');?>
    </div>

</div>

<div id="v2-listingfooter-mobile">
    <div class="v2-listingfooter-pricing">
        <div class="v2-listingfooter-price">
            <?php if($crypto_listing || $listing->metadata->contractType == "CRYPTOCURRENCY") {
                $modifier = (isset($listing->metadata->priceModifier)) ? $listing->metadata->priceModifier : 0;
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
                }?>
                <div>
                    <div class="<?=$style?>" style="font-weight:bold;"><?=pretty_price(get_coin_amount($listing->metadata->coinType)*(1+($modifier/100)), $listing->metadata->coinType, 8)?> (<ion-icon name="<?=$price_symbol?>"></ion-icon>)</div>
                    <div class="modifier-caption <?=$style?>" style="font-weight:normal;"><?=$modifier_caption?></div>
                </div>
            <?php } else {
                if(isset($listing->item->bigPrice)) { ?>
                    <?=pretty_price($listing->item->bigPrice, $listing->item->priceCurrency->code)?>
                <?php } else { ?>
                    <?=pretty_price($listing->item->price, $listing->metadata->pricingCurrency)?>
                <?php } } ?>
        </div>
        <div class="v2-listingfooter-freeshipping">
            <?php if($free_shipping) { ?>Free Shipping<? } ?></div>
    </div>
    <div class="v2-listingfooter-buynow">
        <input type="button" value="BUY NOW"/>
    </div>
</div>

