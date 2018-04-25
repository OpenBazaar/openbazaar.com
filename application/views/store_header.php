<div class="Store-Header-Bar">
		<div class="Store-Avatar">
			<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
		</div>
		<div class="Store-Header-Info">
			<div class="Store-Header-Info-Name"><?=$profile->name?></div>
			<div class="Store-Header-Info-Details">📍<?=$profile->location?> ⭐ <?=number_format($profile->stats->averageRating, 2)?> (<a href="#"><?=$profile->stats->ratingCount?></a>)</div>	
		</div>
		<div class="Store-Header-Nav">
			<div style="float:right">
				<div class="header-tab <?=($tab == "home")?"active":""?>" onclick="location.href='/store/home/<?=$profile->peerID?>'">Home</div>
				<div class="header-tab <?=($tab == "listings")?"active":""?>" onclick="location.href='/store/<?=$profile->peerID?>'">Store <span class="Store-Count"><?=number_format($profile->stats->listingCount)?></span></div>
				<div class="header-tab <?=($tab == "following")?"active":""?>" onclick="location.href='/store/following/<?=$profile->peerID?>'">Following <span class="Store-Count"><?=number_format($profile->stats->followingCount)?></span></div>
				<div class="header-tab <?=($tab == "followers")?"active":""?>" onclick="location.href='/store/followers/<?=$profile->peerID?>'">Followers <span class="Store-Count"><?=number_format($profile->stats->followerCount)?></span></div>
			</div>
		</div>
	</div>
	
	<div class="Store-Hero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
		
		<div class="hero-title">Store</div>
		
		<div class="user-action-bar">
			<div class="user-btn follow-btn" onclick="location.href='/follow/store/<?=$profile->peerID?>'">Follow</div>
			<div class="user-btn message-btn" onclick="location.href='/message/store/<?=$profile->peerID?>'">Message</div>
		</div>
		
	</div>