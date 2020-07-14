<div id="v2-bodyContainer-mobile">

    <div class="v2-store-headerContainer">
        <div class="v2-store-smallAvatar" style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->medium . "?usecache=true" : asset_url().'img/defaultAvatar.png?>'; ?>');"></div>
        <div class="v2-storeNameLabel3"><?=$profile->name?></div>
        <div class="v2-storeDescription-mobile"><?=$profile->shortDescription?></div>
        <div class="v2-storeListingMetadataContainer">
            <div class="v2-storeRating">⭐ <?=number_format($profile->stats->averageRating, 1)?> | <?=$profile->stats->ratingCount?> reviews</div>
            <div><?=$profile->location?></div>
        </div>
        <div class="v2-buttonFilterContainer">
            <div class="v2-messageButton" onclick="showMessageMeModal(true);">Message</div>
            <div class="v2-filterHeader-mobile" onclick="toggleStoreFilterSlideup();">
                <div>Filters</div>
                <div><img src="<?=base_url()?>/assets/img/hamburger.png"/></div>
            </div>
        </div>
    </div>

    <div class="v2-store-listingsBody-mobile">

        <?php
        $i = 0;

        if($listings) {
            foreach($listings as $listing) {
                if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") {
                    $coinType = $listing->coinType;
                    $price = pretty_price(get_coin_amount($coinType), $coinType, 8);
                } else {
                    if(isset($listing->price->currencyCode)) {
                        $price = pretty_price($listing->price->amount, $listing->price->currencyCode);
                    } else {
                        $price = pretty_price($listing->price->amount, $listing->price->currency->code);
                    }
                }
                ?>
                <div class="v2-listingBox" onclick="gotoListing('<?=$profile->peerID?>', '<?=$listing->slug?>');" rating="<?=$listing->averageRating?>" freeShipping="<?=implode(",", $listing->freeShipping)?>" category="<?=($listing->categories) ? implode(",", $listing->categories): "";?>">
                    <div class="v2-listingBoxImage">
                        <img src="https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->medium?>?usecache=true"/>
                    </div>
                    <div class="v2-listingBoxMetadata">
                        <?=$listing->title?><br/>
                        <span class="v2-listingBoxPrice"><?=$price;?></span>
                    </div>
                </div>
            <?php }
            $i++;
        } else {
            echo '<div class="box" style="text-align:center;"><p>This store has no listings</p></div>';
        } ?>

    </div>

    <div id="v2-slider-home">
        <div class="v2-slider-title">Filters</div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Ships to</div>
            <select name="v2-filter-option-mobile-shipsto" id="v2-filter-option-mobile-shipsto">
                <?php foreach($countries as $country) { ?>
                    <option value="<?=$country['dataName']?>" <?php if($country['dataName'] == $user_country) { echo 'selected="selected"'; } ?>><?=$country['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Category</div>
            <select name="v2-filter-option-mobile-category" id="v2-filter-option-mobile-category">
                <option value="All">All</option>
                <?php if(!empty($categories)) {
                    foreach($categories as $category) {
                        $sanitized_cat = str_replace(array(" ","/"), "", $category);
                        ?>
                        <option value="<?=$category?>"><?=$category?></option>
                    <?php }
                } ?>
            </select>
        </div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Rating</div>
            <select name="v2-filter-option-mobile-rating" id="v2-filter-option-mobile-rating">
                <option value="0">All</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
            </select>

        </div>

    </div>

</div>

