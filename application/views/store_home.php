<div class="Rectangle-10 clearfix">
	
	<?php $this->load->view('store_header',array('tab'=>'home')); ?>
	<?php $this->load->view('store_header_mobile',array('tab'=>'home')); ?>
	
	<div class="Page-Sub-Content clearfix Page-Sub-Content-Mobile Store-Content">
		
		<div class="Store-Col1">
			<div class="Store-Filter-Box no-padding" style="width:306px;">
				
				<div class="Store-Home-Mini-Header" style="background-image: url('<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->tiny : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>');">
					<div class="Store-Home-Avatar">
						<img style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"/>
					</div>
				</div>

				<div class="about-box-details">
					<div class="filter-box-header"><?=$profile->name?></div>
					<div class="about-box-short">
						<?=$profile->shortDescription?>
					</div>
				</div>
				
			</div>
			
			
			<div class="Store-Filter-Box Home-Sidebar Home-Sidebar-Mobile" style="width:306px;">
				<div class="filter-box-header">Information</div>
				
				<div class="sidebar-label">OpenBazaar ID</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="ob://<?=$profile->peerID?>"><?=$profile->peerID?></a></div>
				
				<div class="sidebar-label">Last Seen on Network</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?=$last_seen?> GMT</div>
				
				<div class="sidebar-label">Last Indexed By Search</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?=$last_indexed?> GMT</div>
								
				<?php if($profile->contactInfo->website != "") { ?>
				<div class="sidebar-label">Web Site</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="<?=$profile->contactInfo->website?>" target="_blank"><?=$profile->contactInfo->website?></a></div>
				<?php } ?>
				
				<?php if($profile->contactInfo->email != "") { ?>
				<div class="sidebar-label">Email</div>
				<div class="sidebar-detail" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="mailto:<?=$profile->contactInfo->email?>" ><?=$profile->contactInfo->email?></a></div>
				<?php } ?>

				<?php if($profile->contactInfo->phoneNumber) { ?>
				<div class="sidebar-label">Phone</div>
				<div class="sidebar-detail"><?=sani_input($profile->contactInfo->phoneNumber)?></div>
				<?php } ?>
				
				<?php foreach($profile->contactInfo->social as $social) { ?>
				<div class="sidebar-label"><?=sani_input($social->type)?></div>
				<div class="sidebar-detail"><a href="<?=sani_input($social->username)?>" target="_blank"><?=sani_input($social->username)?></a></div>
				<?php } ?>

				
			</div>
			
			
		</div>
		
		<div class="Home-Content Home-Content-Mobile">						
			
			<div class="Store-Filter-Box About-Box" style="box-sizing: border-box;">
				
				<?php $this->load->view('store_social_mobile'); ?>
				
				<div class="filter-box-header">About</div>
				<img src="/store/qr/<?=$profile->peerID?>"/>
				<div style="overflow-x: scroll;width:100%;">
					<?=($profile->about!="")?$profile->about:"<span class='inactive-text'>No description entered</span>"?>
				</div>
			</div>
		</div>
	</div>
			
</div>
		
