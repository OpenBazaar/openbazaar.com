<div class="Rectangle-10 clearfix">
	
	<?php $this->load->view('store_header',array('tab'=>'followers')); ?>	
	<?php $this->load->view('store_header_mobile',array('tab'=>'followers')); ?>	
			
	<div class="Page-Sub-Content clearfix Page-Sub-Content-Mobile">
		
		
			<?php						
				$i = 0;			
				if($followers) {				

					foreach($followers as $follower) { 
						if($i < 27000) {
						?>
						<div class="lazy profile-card-div" data-loader="followcard" id="<?=$follower?>">
							<div class="Profile-Card">
								<div class="Profile-Card-Hero" style="background-image: url('<?=asset_url()."img/defaultHeader.png"?>');">
									<div class="Profile-Card-Avatar" style="background-image: url('<?=asset_url()?>img/defaultAvatar.png');"></div>
								</div>
								<div class="Profile-Card-Caption">
									<div class="Profile-Card-Name"><?=(isset($follower->name))?$follower->name:"Unknown"?></div>
									<div class="Profile-Card-ShortDesc"><?=(isset($follower->shortDescription))?$follower->shortDescription:"No description"?></div>
									<div class="Profile-Card-MetaBar">
										<div class="Profile-Card-Location">📍 Unknown Location </div>
										<div class="Profile-Card-Rating">⭐ 0.0 (0)</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++; 
					}  
					}
					
				} else { 
					echo '<div class="mobile-card box" style="text-align:center;"><p>This store has no followers</p></div>'; 
				} 
			?>
			
		
		
		
		
		
	</div>
			
</div>
		

	