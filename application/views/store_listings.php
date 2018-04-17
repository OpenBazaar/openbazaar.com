<div class="Rectangle-10 clearfix">
	
	<div class="Store-Header-Bar">
		<div class="Store-Avatar">
			<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
		</div>
		<div class="Store-Header-Info">
			<div class="Store-Header-Info-Name"><?=$profile->name?></div>
			<div class="Store-Header-Info-Details">📍<?=$profile->location?> ⭐ 0 (<a href="#">0</a>)</div>
			
		</div>
		<div class="Store-Header-Nav">
			<div style="float:right">
			<div class="header-tab" onclick="location.href='/store/home/<?=$profile->peerID?>'">Home</div>
			<div class="header-tab active" onclick="location.href='/store/<?=$profile->peerID?>'">Store <span class="Store-Count"><?=number_format($profile->stats->listingCount)?></span></div>
			<div class="header-tab">Following <span class="Store-Count"><?=number_format($profile->stats->followingCount)?></span></div>
			<div class="header-tab">Followers <span class="Store-Count"><?=number_format($profile->stats->followerCount)?></span></div>
			</div>
		</div>
	</div>
	
	<div class="Store-Hero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
		<div class="hero-title">Store</div>
	</div>
	
	
	<div class="Page-Sub-Content clearfix" style="margin-top:341px;">
		
		<div style="display:table-cell;  width:228px; vertical-align: top">
			<div class="Store-Filter-Box">
				<div class="filter-box-header">Shipping</div>
				<div>Ships to: </div>
				<div style="display: table-row;;vertical-align: middle;">
					<div style="display: table-cell;vertical-align: middle;"><input type="checkbox"/></div>
					<div style="display: table-cell;vertical-align: middle;"><div class="phraseBox">FREE SHIPPING</div></div>
				</div>
			</div>
			
			<div class="Store-Filter-Box" style="padding:0 24px 10px 0">
				<div class="filter-box-header" style="padding:10px;">Category</div>
				<div class="category-row active" style="display: table-row">
					<div style="display: table-cell"></div>
					<div style="display: table-cell">All</div>
				</div>
				<?php if(!empty($categories)) {
					foreach($categories as $category) {
						?>
						<div class="category-row" style="display: table-row;">
							<div style="display: table-cell"></div>
							<div style="display: table-cell"><?=$category?></div>
						</div>
					<?php }
				} ?>
			</div>
			<div class="Store-Filter-Box">
				<div class="filter-box-header">Rating</div>
				
			</div>
		</div>
		<div style="display:table-cell;width:675px;padding-left:35px;">
			<?php						
			$i = 0;
			
			if($listings) {
				
				$listings = array_slice($listings, 0, 64);
			foreach($listings as $listing) { 
			?>
			
				<div class="Store-Body-Listing-Box <?php if($i%3==2) { echo "Discover-Body-Listing-Box-Last"; } ?>" onclick="location.href='/store/<?=$profile->peerID?>/<?=$listing->slug?>';">
					<div class="Store-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small?>');"></div>
					<div class="Discover-Body-Listing-Box-Desc">
						<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$profile->peerID?>/<?=$listing->slug?>"><?=$listing->title?></a></div>
					</div>
					<div class="Listing-Details">
						<div class="Listing-Star">⭐</div>
						<div class="Listing-Rating"><?=round($listing->averageRating, 2)?> (<?=$listing->ratingCount?>)</div>
						<div class="Listing-Price"><?=convert_price($listing->price->amount, $listing->price->currencyCode, "BTC");?> BTC</div>
					</div>
				</div>
			
			<?php }  
			$i++; } else { echo '<div style="text-align:center;">This store has no listings.</div>'; } ?>
			<br clear="both"/>
		</div>
	</div>
			
</div>
		

