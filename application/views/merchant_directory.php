<div class="Rectangle-10 clearfix">
  <div class="Page-Sub-Content">
	  
	  <div style="width:100%;">
	  
		  <div style="display:flex;flex-wrap: wrap;flex-direction: column;">
			  <div style="flex:1;">
			  	<h1>Merchant Directory</h1>
			  </div>
			  
			  <div>
				  <p>This is a merchant directory.</p>
			  </div>
			  
			  		  
		  </div>
		  
		  <div style="display:flex;flex-wrap: wrap">
		  <?php foreach($stores as $store) { 
			  
			  $profile = stripslashes($store['profile']);
			  $profile = json_decode($profile);
			  
			  
			  
		  ?>
		  	
			  	<div style="box-sizing: border-box;padding:5px;width:33%;display: flex;flex-wrap: wrap; box-sizing: border-box;">
			  
			  		<div style="width:75px;padding:5px;">
			  		<a href="/store/<?=$store['guid']?>" title="<?=$store['name']?>"><img src="<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny . "?usecache=true" : asset_url().'img/defaultAvatar.png?>'; ?>" width=75 height=75 /></a>
			  		</div>
			  		<div style="flex:1;padding:5px;overflow: auto; text-overflow: ellipsis">
				  		<span style="font-size:14px;font-weight: bolder;"><?php print_r($store['name'])?></span>
			  		</div>
			  
			  
			  	</div>
			  	
	      <?php } ?>
		  </div>


	  </div>
	  
  </div>
</div>