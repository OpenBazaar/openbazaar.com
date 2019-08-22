<div class="Store-Header-Bar">
	<div class="Store-Header-Bar-Inner">
		<div class="Store-Avatar">
			<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny . "?usecache=true" : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
		</div>
		<div class="Store-Header-Info">
			<div class="Store-Header-Info-Name"><?=$profile->name?></div>
			<div class="Store-Header-Info-Details">📍<?=$profile->location?> ⭐ <?=number_format($profile->stats->averageRating, 1)?> (<a href="#"><?=$profile->stats->ratingCount?></a>)</div>	
		</div>
		<div class="Store-Header-Nav">
			<div style="float:right">
				<div class="header-tab <?=($tab == "listings")?"active":""?>" onclick="location.href='/<?=$profile->peerID?>/store'">Store <span class="Store-Count"><?=number_format($profile->stats->listingCount)?></span></div>
				<div class="header-tab <?=($tab == "home")?"active":""?>" onclick="location.href='/<?=$profile->peerID?>/home'">About</div>
				<div class="header-tab <?=($tab == "following")?"active":""?>" onclick="location.href='/<?=$profile->peerID?>/following'">Following <span class="Store-Count"><?=number_format($profile->stats->followingCount)?></span></div>
				<div class="header-tab <?=($tab == "followers")?"active":""?>" onclick="location.href='/<?=$profile->peerID?>/followers'">Followers <span class="Store-Count"><?=number_format($profile->stats->followerCount)?></span></div>
			</div>
		</div>
	</div>
	</div>
	
	<div class="Store-Hero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large . "?usecache=true" : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
		
		<div class="hero-title">Store</div>
		
		<div class="user-action-bar">
			<div class="user-btn follow-btn button" onclick="location.href='/follow/store/<?=$profile->peerID?>'">Follow</div>
			<div class="user-btn message-btn button" onclick="location.href='/message/store/<?=$profile->peerID?>'">Message</div>
		</div>
		
	</div>