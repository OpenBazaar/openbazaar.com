<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@openbazaar" />
<meta name="twitter:title" content="OpenBazaar: <?=$listing->item->title?>" />
<?php if(isset($listing->item->description)) { ?>
<meta name="twitter:description" content="<?=strip_tags($listing->item->description)?>" />
<?php } ?>
<meta name="twitter:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium : ''; ?>" />		
		
		<div class="Rectangle-10 clearfix">
			<div class="Page-Sub-Content">
			<div class="Listing-Breadcrumb">
				<div class="Store-Avatar-Circle" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($profile->avatarHashes)) ? $profile->avatarHashes->tiny : ''; ?>');"></div>
				<div class="Store-Title"><?=$profile->name?> <a href="/store/<?=$profile->peerID?>" class="Store-Go">Go to store </a></div>								
			</div>
			
			<div class="Listing-Box clearfix">
				
				<div class="clearfix">
				<div class="Listing-Title">
					<?=$listing->item->title?>
				</div>
				<div class="Listing-Detailed-Price">

					<?=convert_price($listing->item->price, "USD", "BTC");?> BTC
<!-- 					<?=($listing->item->price)/100?> <?=$listing->metadata->pricingCurrency?> -->
				</div>			
				</div>
				<br clear="both"/>
			
			<div class="Listing-Upper">
				<div id="Listing-Upper-Image" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium : ''; ?>');"></div>
				
				<div style="float:left;">
					<div class="Purchase-Button-Box clearfix">
						<div>
						<button type="submit" class="Purchase-Button" onclick="location.href='/buy/<?=$listing->vendorID->peerID?>/item/<?=$listing->slug?>';">
							<span class="Purchase-Button-Text">BUY NOW</span>
						</button>
						</div>
						<div style="display:table; height:26px; vertical-align: middle;margin:0 auto;margin-top:5px;margin-bottom:10px;">
							<div style="display:table-cell;font-size:12.5px;">⭐ <?=$rating?> (<?=$ratings?>)</div>
							<div style="width: inherit;  height: inherit;    display: table-cell;  vertical-align: middle;">
								
								<?php if(isset($listing->data->freeShipping)) { ?>
								<div style="display:table-cell;float:left;margin: 0 12px;width: 0px;  height: 20px;  border: solid 0.5px #d2d3d9;"></div>
								<div class="phraseBox" style="display: table-cell; vertical-align: middle;margin-top: 0">Free Shipping</div>
								<?php } ?>
								
							</div>
							<div style="width: inherit;  height: inherit;    display: table-cell;  vertical-align: middle;">
								<div style="display:table-cell;float:left;margin: 0 12px;width: 0px;  height: 20px;  border: solid 0.5px #d2d3d9;"></div>
								<a href="https://twitter.com/intent/tweet?text=<?=$listing->item->title?> on @OpenBazaar http://ob1.trade/store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/twitter.png" width=16 height=16 /></a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=http://ob1.trade/store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/facebook.png" width=16 height=16 target="_blank"/></a>
							</div>
						</div>
					</div>
					
					<br clear="both"/>
					
					<div class="Listing-Condition-Box">
						Type: <span style="font-weight: bold"><?=$listing->metadata->contractType?></span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						Condition: <span style="font-weight: bold"><?=$listing->item->condition?></span>
					</div>
					
					<div class="Listing-Tags">
						<div style="font-weight: bold;margin-bottom:10px;">Tags</div>
						<?php foreach($listing->item->tags as $tag) { ?>
						<div class="tag" onclick="location.href='/discover/results/<?=urlencode($tag)?>'"><?=$tag?></div>
						<?php } ?>
						
					</div>

				</div>
				
			</div>
			
			
			
			
			</div>		
			
			<div class="Description-Box">
				<div class="Description-Header">Description</div>
				
				<div style="font-size: 15.5px;"><?=(isset($listing->item->description))?$listing->item->description:"";?>
				
				</div>
			</div>
			
			<div class="Description-Box">
				<div class="Description-Header">Reviews</div>
				
				<?php if(empty($reviews)) { ?>
					<div style="padding-top:10px;">There are no reviews yet.</div>
				<?php } ?> 
				
				<?php foreach($reviews as $review) { ?>
				<div style="display: table;border-bottom:1px solid #d2d3d9;padding: 20px 0;">
				<div style="display: table-cell; width:550px;padding-right:20px;">
					<?php $review_tstamp = DateTime::createFromFormat('Y-m-d\TH:i:s+', $review->ratingData->timestamp)?>
					<div style="font-weight: bolder;margin-bottom:10px;"><?=$review_tstamp->format('Y-m-d H:i:s');?> GMT by <?=(isset($review->ratingData->buyerName)) ? $review->ratingData->buyerName : "Anonymous"?></div>
					<div><?=$review->ratingData->review?></div>
				</div>
				<div style="display: table-cell">
					<div style="display: table-cell;width:240px;">
						<div class="rating-category"><span style="font-weight:bold">Overall</span></div>
						<div class="rating-category">Quality</div>
						<div class="rating-category">Delivery Speed</div>
						<div class="rating-category">Matched Description</div>
						<div class="rating-category">Customer Support</div>
					</div>
					<div style="display: table-cell">
						<div>
							<?php for($i=1; $i<=5; $i++) { 
								if($i <= $review->ratingData->overall) {
									echo "⭐";
								} else {
									echo "<span style=\"opacity:0.35\">⭐</span>";
								}
							} ?>
						</div>
						<div>
							<?php for($i=1; $i<=5; $i++) { 
								if($i <= $review->ratingData->quality) {
									echo "⭐";
								} else {
									echo "<span style=\"opacity:0.35\">⭐</span>";
								}
							} ?>
						</div>
						<div>
							<?php for($i=1; $i<=5; $i++) { 
								if($i <= $review->ratingData->deliverySpeed) {
									echo "⭐";
								} else {
									echo "<span style=\"opacity:0.35\">⭐</span>";
								}
							} ?>
						</div>
						<div>
							<?php for($i=1; $i<=5; $i++) { 
								if($i <= $review->ratingData->description) {
									echo "⭐";
								} else {
									echo "<span style=\"opacity:0.35\">⭐</span>";
								}
							} ?>
						</div>
						<div>
							<?php for($i=1; $i<=5; $i++) { 
								if($i <= $review->ratingData->customerService) {
									echo "⭐";
								} else {
									echo "<span style=\"opacity:0.35\">⭐</span>";
								}
							} ?>
						</div>
					</div>
				</div>
				</div>
				<?php } ?>
			</div>
			
			<?php if($listing->metadata->contractType == "PHYSICAL_GOOD") { ?>
			<div class="Description-Box">
				<div class="Description-Header">Shipping</div>
				<div style="padding-top:10px;">
					
					<?php if($profile->location != "") { ?>
					<div>Ships from: <span style="font-weight:bolder;"><?=$profile->location?></span></div>
					<?php }?>
					
					
					<?php foreach($listing->shippingOptions as $shipping_option) { 
						if($shipping_option->type == "LOCAL_PICKUP") { 
							
						} else {
					?>
					<div class="shipping-header-row" style="border-bottom:1px solid #d2d3d9;display: table-row">
						<div style="display: table-cell;width:40%;"><?=$shipping_option->name?></div>
						<div style="display: table-cell;width:20%;">Delivery Time</div>
						<div style="display: table-cell;width:20%;">Price (first item)</div>
						<div style="display: table-cell;width:20%;">Price (additional item)</div>
					</div>
					
						<?php foreach($shipping_option->services as $service) { ?>
						<div class="shipping-body-row" style="border-bottom:1px solid #d2d3d9;display: table-row">
							<div style="display: table-cell;width:40%;"><?=$service->name?></div>
							<div style="display: table-cell;width:20%"><?=$service->estimatedDelivery?></div>
							<div style="display: table-cell;width:20%"><?=(isset($service->price))?convert_price($service->price,$listing->metadata->pricingCurrency,'BTC',8):"FREE"?> BTC</div>
							<div style="display: table-cell;width:20%"><?=(isset($service->additionalItemPrice))?convert_price($service->additionalItemPrice,$listing->metadata->pricingCurrency,'BTC',8):"FREE"?> BTC</div>
						</div>
						<?php  }?>
					
					<?php } }?>
					
					
				</div>
			</div>
			<?php } ?>
			
			<div class="Description-Box">
				<div class="Description-Header">Return Policy</div>
				<div style="padding-top:10px;"><?=(isset($listing->refundPolicy)) ? $listing->refundPolicy : "This store has no return policy."?></div>
			</div>
			
			<div class="Description-Box">
				<div class="Description-Header">Terms of Service</div>
				<div style="padding-top:10px;"><?=(isset($listing->termsAndConditions)) ? $listing->termsAndConditions : "This store has no terms and conditions."?></div>
			</div>
			
			<div class="Description-Box">
				<div class="Description-Header">More by <?=$profile->name?></div>
			</div>
			
			<br clear="both"/>
			
		</div>
		
		</div>