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
			<div style="float:right;">
				<div class="header-tab active" onclick="location.href='/store/home/<?=$profile->peerID?>'">Home</div>
				<div class="header-tab" onclick="location.href='/store/<?=$profile->peerID?>'">Store <span class="Store-Count"><?=number_format($profile->stats->listingCount)?></span></div>
				<div class="header-tab">Following <span class="Store-Count"><?=number_format($profile->stats->followingCount)?></span></div>
				<div class="header-tab" onclick="location.href='/store/followers/<?=$profile->peerID?>'">Followers <span class="Store-Count"><?=number_format($profile->stats->followerCount)?></span></div>
			</div>
		</div>
	</div>
	
	<div class="Store-Hero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
		<div class="hero-title">Store</div>
	</div>
	
	
	<div class="Page-Sub-Content clearfix" style="margin-top:341px;">
		
		<div style="display:table-cell;width:675px;padding-left:35px;">
			<?php						
			$i = 0;
			
			if($followers) {
				
// 				$followers = array_slice($followers, 0, 6);
			foreach($followers as $follower) { 
				?><a href="/store/<?=$follower->peerId?>"><?=$follower->peerId?></a><?php
/*
				$f = file_get_contents("https://gateway.ob1.io/ipns/".$follower->peerId."/profile.json");
				$f = json_decode($f);
				
				print_r($f);
*/
			?>
			
<!--
				<div class="Store-Body-Listing-Box <?php if($i%3==2) { echo "Discover-Body-Listing-Box-Last"; } ?>" onclick="location.href='/store/<?=$follower->peerID?>';">
					<div class="Store-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$follower->thumbnail->small?>');"></div>
					<div class="Discover-Body-Listing-Box-Desc">
						<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$profile->peerID?>"><?=$follower->name?></a></div>
					</div>
					<div class="Listing-Details">
						<div class="Listing-Star">⭐</div>
						<div class="Listing-Rating"><?=$listing->averageRating?> (<?=$listing->ratingCount?>)</div>
						<div class="Listing-Price"><?=$listing->price->amount/100?><?=$listing->price->currencyCode?></div>
					</div>
				</div>
-->
			
			<?php }  
			$i++; } else { echo '<div style="text-align:center;">This store has no listings.</div>'; } ?>
			<br clear="both"/>
		</div>
		
		
		
		
	</div>
			
</div>
		

	