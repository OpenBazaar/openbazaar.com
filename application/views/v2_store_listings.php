<div id="v2-bodyContainer">
    <div class="v2-store-bodyContainer">
        <div class="v2-store-headerHero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large . "?usecache=true" : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');"></div>
        <div class="v2-store-headerData">
            <div class="v2-store-bigAvatar" style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->small . "?usecache=true" : asset_url().'img/defaultAvatar.png?>'; ?>');"></div>
            <div class="v2-store-storeMetadata">
                <div class="v2-storeNameLabel2"><?=$profile->name?></div>
                <div class="v2-storeDescription"><?=$profile->shortDescription?></div>
                <div class="v2-storeListingMetadataContainer">
                    <div class="v2-storeRating">⭐ <?=number_format($profile->stats->averageRating, 1)?> | <?=$profile->stats->ratingCount?> reviews</div>
                    <div><?=$profile->location?></div>
                </div>
                <div class="v2-storePaymentRow">
                    <a href="/<?=$profile->peerID?>/store"><div class="v2-visitStoreButton">Message</div></a>
                    <?php
                    $coins = array(
                        "BCH" => array("label"=>"Bitcoin Cash", "icon"=>"bchIcon128.png"),
                        "BTC" => array("label"=>"Bitcoin", "icon"=>"btcIcon128.png"),
                        "LTC" => array("label"=>"Litecoin", "icon"=>"ltcIcon128.png"),
                        "ZEC" => array("label"=>"Zcash", "icon"=>"zecIcon128.png"),
                        "ETH" => array("label"=>"Ethereum", "icon"=>"ethIcon128.png")
                    );

                    foreach($profile->currencies as $coin) {  ?>
                        <div class="v2-coins">
                            <img class="v2-currencyIconStore" src="<?=asset_url()?>img/<?=$coins[$coin]["icon"] ?>"/>
                        </div>
                    <?php } ?>


                </div>

            </div>
            <div class="v2-store-qr"><img src="/store/qr/<?=$profile->peerID?>" class="v2-qr"/>
            Scan to open in Haven</div>
        </div>
        <div class="v2-store-listingsContainer">
            <div class="v2-store-listingsSidebar">
                <div class="v2-store-sidebarBox">
                    <div class="filter-box-header">Shipping</div>
                    <div>Ships to:
                        <select id="filter_country" style="width:130px;">
                            <option name="country" value="ALL">(Any country)</option>
                            <?php foreach($countries as $country) { ?>
                                <option value="<?=$country['dataName']?>" ><?=$country['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="display: flex;;vertical-align: middle;padding:5px 0;">
                        <div style="display: 1;vertical-align: middle;"><input id="filter_freeshipping" name="free_checkbox" type="checkbox" onclick="applyListingsFilter();"/></div>
                        <div style="display: 1;vertical-align: middle;"><div class="phraseBox" style="margin:0;">FREE SHIPPING</div></div>
                    </div>
                </div>

                <div class="v2-store-sidebarBox" style="padding:0 24px 10px 0">
                    <div class="filter-box-header" style="padding:10px;">Category</div>
                    <div class="category-row active" style="display: flex;word-break: break-all; word-wrap: break-word;width:180px;">
                        <div style="display: 1"></div>
                        <div style="display: 1;" class="category-button" category="All">All</div>
                    </div>

                    <input type="hidden" id="filter-category" name="category" value="<?=$category?>"/>
                    <input type="hidden" id="sani-category" value="All"/>
                    <?php if(!empty($categories)) {
                        foreach($categories as $category) {
                            $sanitized_cat = str_replace(array(" ","/"), "", $category);
                            ?>

                            <div class="category-row" style="display: flex;">
                                <div style="display: 1;"></div>
                                <div class="category-button" category="<?=$category?>" style="display: 1;width:180px;cursor: pointer;" ><?=$category?></div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="v2-store-sidebarBox">
                    <div class="filter-box-header">Rating</div>
                    <p><input type="radio" name="rating" value="0" class="ratings-input-control" id="filter-box-ratings-all" checked=""> <label for="filter-box-ratings-all">All</label></p>
                    <p><input type="radio" name="rating" value="5" class="ratings-input-control" id="filter-box-ratings-5"><label for="filter-box-ratings-5">⭐⭐⭐⭐⭐ 5</p>
                    <p><input type="radio" name="rating" value="4" class="ratings-input-control" id="filter-box-ratings-4"><label for="filter-box-ratings-4">⭐⭐⭐⭐ 4+</p>
                    <p><input type="radio" name="rating" value="3" class="ratings-input-control" id="filter-box-ratings-3"><label for="filter-box-ratings-3">⭐⭐⭐ 3+</p>
                    <p><input type="radio" name="rating" value="2" class="ratings-input-control" id="filter-box-ratings-2"><label for="filter-box-ratings-2">⭐⭐ 2+</p>
                    <p><input type="radio" name="rating" value="1" class="ratings-input-control" id="filter-box-ratings-1"><label for="filter-box-ratings-1">⭐ 1+</p>
                </div>
            </div>
            <div class="v2-store-listingsBody">

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
                        <div class="v2-listingBox" onclick="gotoListing('<?=$profile->peerID?>', '<?=$listing->slug?>');">
                            <div class="v2-listingBoxImage">
                                <img src="https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small?>?usecache=true"/>
                            </div>
                            <div class="v2-listingBoxMetadata">
                                <?=$listing->title?><br/>
                                <span class="v2-listingBoxPrice"><?=pretty_price($listing->price->amount, $listing->price->currency->code);?></span>
                            </div>
                        </div>
                <?php }
                    $i++;
                } else {
                    echo '<div class="box" style="text-align:center;"><p>This store has no listings</p></div>';
                } ?>

            </div>
        </div>
    </div>
</div>