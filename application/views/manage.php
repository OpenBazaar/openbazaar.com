<div class="Rectangle-10 clearfix">
  <div class="Page-Sub-Content">
	  
	  <div style="width:100%;">
	  
		  <div style="display:flex;flex-wrap: wrap;flex-direction: column;">
			  <div style="flex:1;">
			  	<h1>Promotion Codes</h1>
			  </div>
			  
			  <div class="promotion-table">
				  
				  <div class="promotion-row">
					  <div style="width:120px;background-color:#ddd;">Claimed</div>
					  <div style="width: 200px;background-color:#ddd;">Timestamp</div>
					  <div style="flex:1;background-color:#ddd;">Code</div>
					  
				  </div>
				  
				  <?php foreach($codes as $code) { ?>
				  <div class="promotion-row promotion-row-data">
					  <div style="width:120px;"><input class="promotion-checkbox" data-id="<?=$code['code']?>" type="checkbox" name="claimed" <?php if($code['claimed']) { ?>checked="checked"<?php } ?> /></div>
					  <div style="width: 200px;"><?=$code['timestamp']?></div>
					  <div style="flex:1;"><?=$code['code']?></div>
					  
				  </div>
				  <?php } ?>
				  
				  
			  </div>
			  
		  </div>

	  </div>
	  
  </div>
</div>