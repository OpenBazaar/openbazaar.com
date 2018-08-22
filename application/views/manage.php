<div class="Rectangle-10 clearfix">
  <div class="Page-Sub-Content">
	  
	  <div style="width:100%;">
	  
		  <div style="display:flex;flex-wrap: wrap;flex-direction: column;">
			  <div style="flex:1;">
			  	<h1>Promotion Codes</h1>
			  </div>
			  
			  <div>
				  <p>Simply click the checkbox next to the code to mark it as claimed or not claimed.</p>
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
					  <div style="width: 200px;"><?=date("Y-m-d\ H:i",$code['timestamp']);?> UTC</div>
					  <div style="flex:1;"><?=$code['code']?></div>
					  
				  </div>
				  <?php } ?>
				  
				  
			  </div>
			  
		  </div>

	  </div>
	  
  </div>
</div>