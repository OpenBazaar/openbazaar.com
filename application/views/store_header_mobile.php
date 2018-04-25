<div id="Store-Header-Mobile">
	
	<div class="Store-Home-Mini-Header" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->tiny : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');"></div>
	
	<div class="mobile-store-caption">
		
		<div class="mobile-avatar-title">
			<div class="Store-Home-Avatar">
				<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
			</div>
			<div class="filter-box-header"><?=$profile->name?></div>			
		</div>
		
		<div class="about-box-short">
			<?=$profile->shortDescription?>
		</div>
		
		<div style="display:flex;font-size:14px;padding-top:4px;">
			<div style="width:50%;padding-left:17px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">📍<?=$profile->location?> </div>
			<div style="width:50%;text-align: right;padding-right:17px;"> ⭐ <?=number_format($profile->stats->averageRating, 2)?> (<a href="#"><?=$profile->stats->ratingCount?></a>)</div>
		</div>
		
	</div>
	
	
	<div class="mobile-store-navbar">
		<div <?php if($tab == "listings") { ?>class="active"<?php } ?>><a href="/store/<?=$profile->peerID?>">Store</a></div>
		<div <?php if($tab == "home") { ?>class="active"<?php } ?>><a href="/store/home/<?=$profile->peerID?>">About</a></div>
		<div <?php if($tab == "followers") { ?>class="active"<?php } ?>><a href="/store/followers/<?=$profile->peerID?>">Followers</a></div>
		<div <?php if($tab == "following") { ?>class="active"<?php } ?>><a href="/store/following/<?=$profile->peerID?>">Following</a></div>
	</div>
	
</div>