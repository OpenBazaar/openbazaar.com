<?php $i = 0;
if($all_listings) {

    // Loop through listings and remove the listing for this page
    foreach($all_listings as $k=>$v) {
        if($v->slug == $slug) {
            unset($all_listings[$k]);
        }
    }

    if(!empty($all_listings)) {

        print_r("<div>You may also like</div><div id=\"v2-youmayalsolikeListings\">");

        $all_listings = array_slice($all_listings, 0, 12);
        foreach($all_listings as $listing) {
            if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") {
                $coinType = $listing->coinType;
                $price = pretty_price(get_coin_amount($coinType), $coinType);
            } else {
                if(!isset($listing->price->currencyCode)) {
                    $price = pretty_price($listing->price->amount, $listing->price->currency->code);
                } else {
                    $price = pretty_price($listing->price->amount, $listing->price->currencyCode);
                }

            }
?>

        <div class="v2-youmayalsolikeListing">
            <a href="/<?=$profile->peerID?>/store/<?=$listing->slug?>">
                <div class="v2-listingBox" onclick="gotoListing('<?=$profile->peerID?>', '<?=$listing->slug?>');">
                    <div class="v2-listingBoxImage">
                        <img src="https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->medium?>?usecache=true"/>
                    </div>
                    <div class="v2-listingBoxMetadata">
                        <?=$listing->title?><br/>
                        <span class="v2-listingBoxPrice"><?=$price?></span>
                    </div>
                </div>

            </a>
        </div>


<?php
        }

        print "</div>";
    }

} else {
    echo '<div>This store has no other listings.</div>';
} ?>