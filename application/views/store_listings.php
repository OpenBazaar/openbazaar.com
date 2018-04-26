<div class="Rectangle-10 clearfix">
	
	<?php $this->load->view('store_header',array('tab'=>'listings')); ?>
	<?php $this->load->view('store_header_mobile',array('tab'=>'listings')); ?>	
	
	<div class="Page-Sub-Content clearfix Page-Sub-Content-Mobile">		
		<div class="Store-Col1">
			
			<div class="Store-Filter-Box">
				<div class="filter-box-header">Shipping</div>
				<div>Ships to: 
					<select style="width:130px;">
						<option name="country" value="ALL">(Any country)</option>
						<?php foreach($countries as $country) { ?>
            <option value="<?=$country['dataName']?>" ><?=$country['name']?></option>
            <?php } ?>
					</select>
            	</div>
				<div style="display: flex;;vertical-align: middle;padding:5px 0;">
					<div style="display: 1;vertical-align: middle;"><input name="free_checkbox" type="checkbox" onclick="toggleFreeShippingItems(this);"/></div>
					<div style="display: 1;vertical-align: middle;"><div class="phraseBox" style="margin:0;">FREE SHIPPING</div></div>
				</div>
			</div>
			
			<div class="Store-Filter-Box" style="padding:0 24px 10px 0">
				<div class="filter-box-header" style="padding:10px;">Category</div>
				<div class="category-row active" style="display: flex;word-break: break-all; word-wrap: break-word;width:180px;">
					<div style="display: 1"></div>
					<div style="display: 1;" onclick="$('.category-row').removeClass('active');$(this).parent().addClass('active');$('.Store-Body-Listing-Box').show();">All</div>
				</div>
				
				<input type="hidden" id="filter-category" name="category" value="<?=$category?>"/>
				<?php if(!empty($categories)) {
					foreach($categories as $category) {
						$sanitized_cat = str_replace(array(" ","/"), "", $category);
						?>
						
						<div class="category-row" style="display: flex;">
							<div style="display: 1;"></div>
							<div class="category-button" style="display: 1;width:180px;cursor: pointer;" onclick="$('.category-row').removeClass('active');$(this).parent().addClass('active');$('.Store-Body-Listing-Box').not('.category-<?=$sanitized_cat?>').hide();$('.category-<?=$sanitized_cat?>').show();"><?=$category?></div>
						</div>
					<?php }
				} ?>
			</div>
			<div class="Store-Filter-Box">
						<div class="filter-box-header">Rating</div>
						
												<div>
							<input type="radio" name="rating" value="0" checked="" class="ratings-input-control"> All Ratings						</div>
												<div>
							<input type="radio" name="rating" value="5" class="ratings-input-control"> ⭐⭐⭐⭐⭐						</div>
												<div>
							<input type="radio" name="rating" value="4" class="ratings-input-control"> ⭐⭐⭐⭐ &amp; up						</div>
												<div>
							<input type="radio" name="rating" value="3" class="ratings-input-control"> ⭐⭐⭐ &amp; up						</div>
												<div>
							<input type="radio" name="rating" value="2" class="ratings-input-control"> ⭐⭐ &amp; up						</div>
												<div>
							<input type="radio" name="rating" value="1" class="ratings-input-control"> ⭐ &amp; up						</div>
												
					</div>			
			
			
		</div>
		
		
		
		<div class="listings-container">
			<?php						
			$i = 0;
			
			if($listings) {
				
				//$listings = array_slice($listings, 0, 64);
				foreach($listings as $listing) { 
					if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") { 
						$coinType = "ZEC"; //$listing->metadata->coinType
						$price = market_price($coinType);
					} else { 
						$price = pretty_price($listing->price->amount, $listing->price->currencyCode);
					}
				
			?>
				<div class="mobile-listing-box">
				<div rating="<?=$listing->averageRating?>" freeShipping="<?=implode($listing->freeShipping, ",")?>" class="Store-Body-Listing-Box <?php foreach($listing->categories as $lcat) { $sanitized_lcat = str_replace(array(" ","/"), "", $lcat); echo "category-".$sanitized_lcat." "; } ?> <?php if($i%3==2) { echo "Discover-Body-Listing-Box-Last"; } ?>" onclick="location.href='/store/<?=$profile->peerID?>/<?=$listing->slug?>';">
					<div class="Store-Body-Listing-Box-Photo lazy" data-src='https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small?>');">
						<?php if(count($listing->freeShipping) > 0) { ?>
						<div class="phraseBox" style="margin:8px 8px 0 0;">FREE SHIPPING</div>
						<?php } ?>
					</div>
					<div class="Discover-Body-Listing-Box-Desc">
						<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$profile->peerID?>/<?=$listing->slug?>"><?=$listing->title?></a></div>
					</div>
					<div class="Listing-Details">
						<div class="Listing-Star">⭐</div>
						<div class="Listing-Rating"><?=number_format($listing->averageRating, 2)?> (<?=$listing->ratingCount?>)</div>
						<div class="Listing-Price"><?=$price;?></div>
					</div>
				</div>
				</div>
			
			<?php }  
			$i++; } else { echo '<div style="text-align:center;">This store has no listings.</div>'; } ?>
			<br clear="both"/>
		</div>
	</div>
			
</div>
		

