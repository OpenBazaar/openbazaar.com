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
				<div class="Store-Avatar-Circle" style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny : asset_url().'img/defaultAvatar.png?>'; ?>');"></div>
				<div class="Store-Title"><?=$profile->name?> <a href="/store/<?=$profile->peerID?>" class="Store-Go">Go to store </a></div>								
			</div>
			
			<?php $this->load->view('listing_carousel_mobile'); ?>
			
			<div class="Listing-Box clearfix no-margins">
						
				<div id="Listing-Box-Mobile" class="clearfix">
					<div class="Listing-Title">
						<?=$listing->item->title?>
					</div>
					<div id="listing-mobile-byline">
						from <a href="/store/<?=$profile->peerID?>"><?=$profile->name?></a>
					</div>
					<div class="Listing-Detailed-Price">
						<?php if($crypto_listing || $listing->metadata->contractType == "CRYPTOCURRENCY") { ?>
							<?=market_price($listing->metadata->coinType)?>
						<?php } else { ?>
							<?=pretty_price($listing->item->price, $listing->metadata->pricingCurrency)?>
						<?php } ?>
					</div>	
					
						<?php if($free_shipping) { ?>
						<div class="free-mobile">
						<div class="phraseBox">Free Shipping</div>
						</div>
						<?php } ?>
					
					<div id="buy-button-social-mobile" class="Buy-Button-Social">
						<a href="https://twitter.com/intent/tweet?text=<?=$listing->item->title?> on @OpenBazaar http://ob1.trade/store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-twitter.png" height=12.5 /></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http://ob1.trade/store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-facebook.png" height=12.5 target="_blank"/></a>
						<a href="http://pinterest.com/pin/create/button/?url=<?=base_url()?>store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>&media=https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium : ''; ?>&description=<?=urlencode($listing->item->title)?>" target="_blank"><img src="<?=asset_url()?>img/icon-pinterest.png" height=12.5 target="_blank"/></a>
					</div>		
				</div>
				
			
			<div class="Listing-Upper">
				<div style="width:100%;">
					<div id="Listing-Upper-Image" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium : ''; ?>');"></div>
					<div id="more-photos-link"><a href="#photos" style="font-size:14px;text-decoration: underline">View <?=count($listing->item->images)?> <?=ngettext('Photo', 'Photos', count($listing->item->images))?></a></div>
				</div>
				
				<div class="Purchase-Button-Col2">
					<div class="Purchase-Button-Box clearfix">
						<div style="display: flex;justify-content: center;align-items: center;">
							<button type="submit" class="Purchase-Button" onclick="location.href='/buy/<?=$listing->vendorID->peerID?>/item/<?=$listing->slug?>';">
								<span class="Purchase-Button-Text">BUY NOW</span>
							</button>
						</div>
						
						
						<div id="listing-metadata-box">
							<div class="Buy-Button-Review-Caption">⭐ <?=$rating?> (<a href="#reviews"><?=$ratings?></a>)</div>
							<div class="Buy-Button-Free-Shipping">
								
								<?php if($free_shipping) { ?>
								<div class="Buy-Button-Divider"></div>
								<div class="phraseBox">Free Shipping</div>
								<?php } ?>
								
							</div>
							<div style="width: inherit; display: flex;  align-items: center;">
								<div class="Buy-Button-Divider"></div>
								<div class="Buy-Button-Social">
									<a href="https://twitter.com/intent/tweet?text=<?=$listing->item->title?> on @OpenBazaar http://ob1.trade/store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-twitter.png" height=12.5 /></a>
									<a href="https://www.facebook.com/sharer/sharer.php?u=http://ob1.trade/store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-facebook.png" height=12.5 target="_blank"/></a>
									<a href="http://pinterest.com/pin/create/button/?url=<?=base_url()?>store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>&media=https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium : ''; ?>&description=<?=urlencode($listing->item->title)?>" target="_blank"><img src="<?=asset_url()?>img/icon-pinterest.png" height=12.5 target="_blank"/></a>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="Listing-Condition-Box">
						<div style="width:100%;text-align: center;">
						
						<?php if(!$crypto_listing) { ?>
						<div style="margin:0 auto;">
						Type: <span style="font-weight: bold;padding-right:10px;"><?=contract_type_to_friendly($listing->metadata->contractType)?></span>	
											
						Condition: <span style="font-weight: bold"><?=condition_to_friendly($listing->item->condition)?></span>
						</div>
						<?php } else { ?>
						<div style="margin:0 auto;">
						Type: <span style="font-weight: bold;padding-right:10px;"><?=contract_type_to_friendly($listing->metadata->contractType)?></span>	
											
						Inventory: <span style="font-weight: bold">0</span>
						</div>

						<?php } ?>											
						
						</div>
					</div>
					
					<div class="verified-mod-container">
						<div style="display: flex;justify-content: center;"><img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=20/> <span style="font-weight:bolder;">Verified Moderator</span></div>
						<div>Purchase this listing with a trusted moderator, verified by <strong>OB1</strong>. <a href="https://ob1.io/verified-moderators.html" target="_blank">Learn more</a>.</div>
					</div>
					
					<?php if(isset($listing->item->tags)) { ?>
					<div class="Listing-Tags">
						<div style="font-weight: bold;font-size:14px;margin-bottom:10px;">Tags</div>
						<?php 														
							foreach($listing->item->tags as $tag) { ?>
						<div class="tag" onclick="location.href='/discover/results/<?=urlencode($tag)?>'"><?=$tag?></div>
						<?php } ?>
						
					</div>
					<?php } ?>
					


				</div>
				
			</div>
			
			
			
			
			</div>		
			
			<div class="Description-Box">
				<div class="Description-Header">Description</div>				
				<div><?=(isset($listing->item->description))?$listing->item->description:"This listing has no description.";?></div>
			</div>
			
			<a name="photos"></a>
			<?php $this->load->view('listing_carousel'); ?>
			
			<div class="Description-Box">
				
				<div class="Description-Header" style="display:flex;">
					<div style="width:70px;"><a name="reviews">Reviews</a></div> 
					<div id="mobile-review-score" style="flex:1;margin-top:-3px;">⭐<?=number_format($rating, 2)?> (<a href="#reviews"><?=$ratings?></a>)</div>
				</div>
				
				<?php if(empty($reviews)) { ?>
					<div style="padding-top:10px;font-size:14px;">There are no reviews yet.</div>
				<?php } ?> 
				
				<?php foreach($reviews as $review) { ?>
					<div class="review-row">
						<div class="review-col1">
							<?php $review_tstamp = DateTime::createFromFormat('Y-m-d\TH:i:s+', $review->ratingData->timestamp)?>
							<div style="font-weight: bolder;margin-bottom:10px;"><?=$review_tstamp->format('Y-m-d H:i:s');?> GMT by <?=(isset($review->ratingData->buyerName)) ? $review->ratingData->buyerName : "Anonymous"?></div>
							<div class="review-text"><?=(trim($review->ratingData->review)!="")?$review->ratingData->review:"No review left."?></div>
						</div>
						<div class="full-rating-box" style="font-size:14px;">
							<div class="full-rating-box-cats">
								<div class="rating-category"><span style="font-weight:bold">Overall</span></div>
								<div class="rating-category">Quality</div>
								<div class="rating-category">Delivery Speed</div>
								<div class="rating-category">Matched Description</div>
								<div class="rating-category">Customer Support</div>
							</div>
							<div style="display: table-cell">
								<div class="overall-rating">
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
					<div style="font-size:14px;">Ships from: <span style="font-weight:bolder;"><?=$profile->location?></span></div>
					<?php }?>
					
					<div style="margin:14px 0;height:1px;background-color:#d2d3d9"></div>
					
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
							<div style="display: table-cell;width:20%"><?=(isset($service->price))?convert_price($service->price,$listing->metadata->pricingCurrency,$_COOKIE['currency']):"FREE"?></div>
							<div style="display: table-cell;width:20%"><?=(isset($service->additionalItemPrice))?convert_price($service->additionalItemPrice,$listing->metadata->pricingCurrency,$_COOKIE['currency']):"FREE"?></div>
						</div>
						<?php  }?>
					
					<?php } }?>
					
					
				</div>
			</div>
			<?php } ?>
			
			<div id="Mobile-Listing-Tags" class="Description-Box">
				<div class="Description-Header">Tags</div>
				<?php if(isset($listing->item->tags)) { ?>
				<div class="Listing-Tags Listing-Tags-Mobile">					
					<?php 														
						foreach($listing->item->tags as $tag) { ?>
					<div class="tag" onclick="location.href='/discover/results/<?=urlencode($tag)?>'"><?=$tag?></div>
					<?php } ?>					
				</div>
				<?php }?>				
				<?php if(count($listing->item->tags) == 0) { ?>No tags specified<?php } ?>
			</div>
			
			<div class="Description-Box">
				<div class="Description-Header">Return Policy</div>
				<div style="padding-top:10px;font-size:14px;"><?=(isset($listing->refundPolicy)) ? $listing->refundPolicy : "This store has no return policy."?></div>
			</div>
			
			<div class="Description-Box">
				<div class="Description-Header">Terms of Service</div>
				<div style="padding-top:10px;font-size:14px;"><?=(isset($listing->termsAndConditions)) ? $listing->termsAndConditions : "This store has no terms and conditions."?></div>
			</div>
			
				
				
			
			
			<div class="Description-Box">
				<div class="Description-Header" style="margin-bottom:10px;">More by <?=$profile->name?></div>
				<div class="More-Listings-Mobile">
					<?php						
					$i = 0;
					
					if($all_listings) {
						
						$all_listings = array_slice($all_listings, 0, 8);
						foreach($all_listings as $listing) { 
							if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") { 
								$coinType = "ZEC"; //$listing->metadata->coinType
								$price = market_price($coinType);
							} else { 
								$price = pretty_price($listing->price->amount, $listing->price->currencyCode);
							}
							
						?>
						
							
						
						
						<div class="More-Listing-Unit">
							<div class="Mobile-More-Listing">
							<div class="Store-Body-Listing-Box" onclick="location.href='/store/<?=$profile->peerID?>/<?=$listing->slug?>';" style="padding-top:0">
								<div class="Store-Body-Listing-Box-Photo" style="background-image:url('https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small?>');"></div>
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
						</div>
						
					<?php }  
						
					} else { echo '<div style="text-align:center;">This store has no other listings.</div>'; } ?>
										
					
					
				</div>
				<?php if($listing_count > 8) { ?>
					<div style="text-align:center;">
						<div style="border-radius: 2px;display: inline-block; box-shadow: 0 1px 0 0 rgba(219, 219, 219, 0.5);  background-color: #ffffff;  border: solid 1px #d2d3d9;margin:0 auto;margin-top:12px;padding:8px 33px;font-size:13px;font-weight:bolder;cursor:pointer" onclick="location.href='/store/<?=$profile->peerID?>';">See All</div>
					</div>
					
					<?php } ?>
					
					<br clear="both"/>
			</div>
			
			<br clear="both"/>
			
		</div>
		
		</div>
		
		