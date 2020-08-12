<?php foreach($search_results as $listing) { ?>

    <div class="v2-listingBox" onclick="gotoListing('<?=$listing->relationships->vendor->data->peerID?>', '<?=$listing->data->slug?>');">
        <div class="v2-listingBoxImage">
            <img src="https://gateway.ob1.io/ob/images/<?=$listing->data->thumbnail->medium?>?usecache=true"/>
        </div>
        <div class="v2-listingBoxMetadata">
            <?=$listing->data->title?><br/>
            <span class="v2-listingBoxPrice"><?=pretty_price($listing->data->bigPrice->amount, $listing->data->bigPrice->currencyCode);?></span>
        </div>
        <?php if(isset($listing->data->freeShipping) && $listing->data->freeShipping[0] == "ALL") { ?>
            <div class="v2-home-freeshipping"><div style="margin:0 auto;">Free Shipping</div></div>
        <?php } ?>
    </div>

<?php } ?>