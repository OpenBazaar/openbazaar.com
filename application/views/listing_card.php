<div class="Store-Body-Listing-Box <?php if($i%3==2) { echo "Discover-Body-Listing-Box-Last"; } ?>" onclick="location.href='/store/<?=$profile->peerID?>/<?=$listing->slug?>';">
	<div class="Store-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small?>');"></div>
	<div class="Discover-Body-Listing-Box-Desc">
		<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$profile->peerID?>/<?=$listing->slug?>"><?=$listing->title?></a></div>
	</div>
	<div class="Listing-Details">
		<div class="Listing-Star">⭐</div>
		<div class="Listing-Rating"><?=number_format($listing->averageRating, 2)?> (<?=$listing->ratingCount?>)</div>
		<div class="Listing-Price"><?=convert_price($listing->price->amount, $listing->price->currencyCode, "BTC");?> BTC</div>
	</div>
</div>