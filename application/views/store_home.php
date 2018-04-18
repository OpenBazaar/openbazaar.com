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
				<div class="header-tab active" onclick="location.href='/store/home/<?=$profile->peerID?>'">Home</div>
				<div class="header-tab" onclick="location.href='/store/<?=$profile->peerID?>'">Store <span class="Store-Count"><?=number_format($profile->stats->listingCount)?></span></div>
				<div class="header-tab">Following <span class="Store-Count"><?=number_format($profile->stats->followingCount)?></span></div>
				<div class="header-tab" onclick="location.href='/store/followers/<?=$profile->peerID?>'">Followers <span class="Store-Count"><?=number_format($profile->stats->followerCount)?></span></div>
			</div>
		</div>
	</div>
	
	<div class="Store-Hero" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
		
		<div class="hero-title">Store</div>
		
		<div class="user-action-bar">
			<div class="user-btn follow-btn">Follow</div>
			<div class="user-btn message-btn">Message</div>
		</div>
		
	</div>
	
	
	<div class="Page-Sub-Content clearfix" style="margin-top:341px;">
		
		<div style="display:table-cell;  width:228px; margin-right: 10px; vertical-align: top">
			<div class="Store-Filter-Box no-padding" style="width:306px;">
				
				<div class="Store-Home-Mini-Header" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->tiny : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
					<div class="Store-Home-Avatar" style="padding-left:11px;padding-top:40px;">
			<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
		</div>
				</div>

				<div style="padding:10px">
				<div class="filter-box-header"><?=$profile->name?></div>
				<div>
					<?=$profile->shortDescription?>
				</div>
				</div>
				
			</div>
			<div class="Store-Filter-Box" style="width:282px;">
				<div class="filter-box-header">Information</div>
				
				<div class="sidebar-label">OpenBazaar ID</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?=$profile->peerID?></div>
				
				<?php if($profile->contactInfo->website != "") { ?>
				<div class="sidebar-label">Web Site</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="<?=$profile->contactInfo->website?>" target="_blank"><?=$profile->contactInfo->website?></a></div>
				<?php } ?>
				
				<?php if($profile->contactInfo->email != "") { ?>
				<div class="sidebar-label">Email</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="mailto:<?=$profile->contactInfo->email?>" ><?=$profile->contactInfo->email?></a></div>
				<?php } ?>

				
			</div>
			
			
		</div>
		<div style="display:table-cell;width:675px;padding-left:35px;">
			
			<div class="Store-Filter-Box">
			<div class="filter-box-header">About</div>
			<div>
				<?=$profile->about?>
			</div>
			</div>
		</div>
	</div>
			
</div>
		
