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

                    foreach($coins as $coin) { ?>
                        <div class="v2-coins">
                            <img class="v2-currencyIconStore" src="<?=asset_url()?>img/<?=$coin['icon']?>"/>
                        </div>
                    <?php } ?>
                </div>

            </div>
            <div class="v2-store-qr"><img src="/store/qr/<?=$profile->peerID?>" class="v2-qr"/>
            Scan to open in Haven</div>
        </div>
        <div class="v2-store-listingsContainer">
            <div class="v2-store-listingsSidebar"></div>
            <div class="v2-store-listingsBody"></div>
        </div>
    </div>
</div>