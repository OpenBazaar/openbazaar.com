<div class="store-social-mobile-container">
	
	<div class="social-row-mobile">
		<div>OpenBazaar ID</div>
		<div><?=$profile->peerID?></div>
	</div>
	
	<?php if($profile->contactInfo->website) { ?>
	<div class="social-row-mobile">
		<div>Web Site</div>
		<div><a target="_blank" href="<?=sani_input($profile->contactInfo->website);?>" target="_blank"><?=sani_input($profile->contactInfo->website);?></a></div>
	</div>
	<?php } ?>
	
	<?php if($profile->contactInfo->email) { ?>
	<div class="social-row-mobile">
		<div>Email</div>
		<div><a href="mailto:<?=sani_input($profile->contactInfo->email)?>"><?=sani_input($profile->contactInfo->email)?></a></div>
	</div>
	<?php } ?>
	
	<?php if($profile->contactInfo->phoneNumber) { ?>
	<div class="social-row-mobile">
		<div>Phone</div>
		<div><?=sani_input($profile->contactInfo->phoneNumber)?></div>
	</div>
	<?php } ?>
	
	<?php foreach($profile->contactInfo->social as $social) { ?>
	<div class="social-row-mobile">
		<div><?=sani_input($social->type)?></div>
		<div><a href="<?=sani_input($social->username)?>" target="_blank"><?=sani_input($social->username)?></a></div>
	</div>
	<?php } ?>
	
</div>