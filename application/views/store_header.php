<?php

if(!isset($profile->stats)) {
    $averageRating = 0;
    $ratingCount = 0;
    $listingCount = 0;
    $followingCount = 0;
    $followerCount = 0;
} else {
    $averageRating = $profile->stats->averageRating;
    $ratingCount = $profile->stats->ratingCount;
    $listingCount = $profile->stats->listingCount;
    $followingCount = $profile->stats->followingCount;
    $followerCount = $profile->stats->followerCount;
}
?>
<div class="Store-Header-Bar">
	<div class="Store-Header-Bar-Inner">
		<div class="Store-Avatar">
			<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
		</div>
		<div class="Store-Header-Info">
			<div class="Store-Header-Info-Name"><?=$profile->name?></div>
			<div class="Store-Header-Info-Details">📍<?=$profile->location?> ⭐ <?=number_format($averageRating, 1)?> (<a href="#"><?=$ratingCount?></a>)</div>
		</div>
		<div class="Store-Header-Nav">
			<div style="float:right">
				<div class="header-tab <?=($tab == "listings")?"active":""?>" onclick="location.href='/store/<?=$profile->peerID?>'">Store <span class="Store-Count"><?=number_format($listingCount)?></span></div>
				<div class="header-tab <?=($tab == "home")?"active":""?>" onclick="location.href='/store/home/<?=$profile->peerID?>'">About</div>
				<div class="header-tab <?=($tab == "following")?"active":""?>" onclick="location.href='/store/following/<?=$profile->peerID?>'">Following <span class="Store-Count"><?=number_format($followingCount)?></span></div>
				<div class="header-tab <?=($tab == "followers")?"active":""?>" onclick="location.href='/store/followers/<?=$profile->peerID?>'">Followers <span class="Store-Count"><?=number_format($followerCount)?></span></div>
			</div>
		</div>
	</div>
	</div>
	
	<div class="Store-Hero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
		
		<div class="hero-title">Store</div>
		
		<div class="user-action-bar">
			<div class="user-btn follow-btn button" onclick="location.href='/follow/store/<?=$profile->peerID?>'">Follow</div>
			<div class="user-btn message-btn button" onclick="location.href='/message/store/<?=$profile->peerID?>'">Message</div>
		</div>
		
	</div>