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
			
			
			<div class="Store-Filter-Box Home-Sidebar Home-Sidebar-Mobile" style="width:282px;">
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
		
		<div class="Home-Content Home-Content-Mobile">						
			
			<div class="Store-Filter-Box" style="box-sizing: border-box;">
				
				<?php $this->load->view('store_social_mobile'); ?>
				
				<div class="filter-box-header">About</div>
				<div style="overflow-x: scroll;width:100%;">
					<?=($profile->about!="")?$profile->about:"This store has no description."?>
				</div>
			</div>
		</div>
	</div>
			
</div>
		
