<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@openbazaar" />
<meta name="twitter:title" content="OpenBazaar: <?=$listing->item->title?>" />
<?php if($description!="") { ?>
<meta name="twitter:description" content="<?=$description?>" />
<?php } ?>
<meta name="twitter:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium. "?usecache=true" : ''; ?>" />

<meta property="og:title" content="OpenBazaar: <?=$listing->item->title?>">
<meta property="og:description" content="<?=$description?>">
<meta property="og:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium . "?usecache=true": ''; ?>">
<meta property="og:url" content="https://openbazaar.com/<?=$profile->peerID?>/store/<?=$listing->slug?>">


		<div class="Rectangle-10 clearfix">
			<div class="Page-Sub-Content">

			<div class="Listing-Breadcrumb button">
				<a href="/<?=$profile->peerID?>/store" title="<?=$profile->name?>"><div class="Store-Avatar-Circle" style="background-image: url('<?php echo (isset($profile->avatarHashes)) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->tiny. "?usecache=true" : asset_url().'img/defaultAvatar.png?>'; ?>');"></div></a>
				<div class="Store-Title"><a href="/<?=$profile->peerID?>/store" title="<?=$profile->name?>"><?=$profile->name?></a> <a href="/<?=$profile->peerID?>/store" title="<?=$profile->name?>" class="Store-Go">Go to store </a></div>
			</div>
			<div class="Listing-User-Buttons" style="float: right; margin-left: auto">
				<div class="user-btn follow-btn button" onclick="location.href='/follow/store/<?=$profile->peerID?>'" style="height: 21px; line-height: 21px; border-left: 0">Follow</div>
				<div class="user-btn message-btn button" onclick="location.href='/message/store/<?=$profile->peerID?>'" style="height: 21px; line-height: 21px;">Message</div>
			</div>

			<?php $this->load->view('listing_carousel_mobile'); ?>

			<div class="Listing-Box clearfix no-margins Main-Section">

				<div id="Listing-Box-Mobile" class="clearfix">
					<div class="Listing-Title">
						<?php
						if($listing->metadata->contractType == "CRYPTOCURRENCY") {
						?>
						<div style="font-weight: bolder;font-size:20px;align-items: center;">
							<img src="<?=asset_url()?>img/cryptoIcons/<?=$listing->metadata->acceptedCurrencies[0]?>-icon.png" width=20 height=20 style="margin-right:4px;"/> <?=$listing->metadata->acceptedCurrencies[0]?>
							<img src="<?=asset_url()?>img/icon-arrow.png" width=12 height=12 style="margin:0 12px;" />
							<img src="<?=asset_url()?>img/cryptoIcons/<?=$listing->metadata->coinType?>-icon.png" width=20 height=20 style="margin-right:4px;"/> <?=$listing->metadata->coinType;?>
						</div>
						<?php
						} else {
							echo $listing->item->title;
						}
						?>
					</div>
					<div id="listing-mobile-byline">
						from <a href="/<?=$profile->peerID?>/store"><?=$profile->name?></a>
					</div>
					<div class="Listing-Detailed-Price">
						<?php if($crypto_listing || $listing->metadata->contractType == "CRYPTOCURRENCY") {
							$modifier = (isset($listing->metadata->priceModifier)) ? $listing->metadata->priceModifier : 0;
							switch(true) {
								case $modifier == 0:
									$style = "cryptolisting-marketprice";
									$modifier_caption = "market price";
									$price_symbol = "checkmark";
									break;
								case $modifier > 0:
									$style = "cryptolisting-above";
									$modifier_caption = $modifier . "% above market";
									$price_symbol = "arrow-round-up";
									break;
								case $modifier < 0:
									$style = "cryptolisting-below";
									$modifier_caption = abs($modifier) . "% below market";
									$price_symbol = "arrow-round-down";
									break;
						}?>
									<div>
										<div class="<?=$style?>" style="font-weight:bold;"><?=pretty_price(get_coin_amount($listing->metadata->coinType)*(1+($modifier/100)), $listing->metadata->coinType, 8)?> (<ion-icon name="<?=$price_symbol?>"></ion-icon>)</div>
										<div class="modifier-caption <?=$style?>" style="font-weight:normal;"><?=$modifier_caption?></div>
									</div>
						<?php } else {
                            if(isset($listing->item->bigPrice)) { ?>
							    <?=pretty_price($listing->item->bigPrice, $listing->item->priceCurrency->code)?>
						<?php } else { ?>
                                <?=pretty_price($listing->item->price, $listing->metadata->pricingCurrency)?>
                        <?php } } ?>
					</div>

						<?php if($free_shipping) { ?>
						<div class="free-mobile">
						<div class="phraseBox">Free Shipping</div>
						</div>
						<?php } ?>

					<div id="buy-button-social-mobile" class="Buy-Button-Social">
						<a href="https://twitter.com/intent/tweet?text=<?=$listing->item->title?> on @OpenBazaar http://<?=$_SERVER['HTTP_HOST']?>/<?=$listing->vendorID->peerID?>/store/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-twitter.png" height=12.5 /></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http://<?=$_SERVER['HTTP_HOST']?>/<?=$listing->vendorID->peerID?>/store/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-facebook.png" height=12.5 target="_blank"/></a>
						<a href="http://pinterest.com/pin/create/button/?url=<?=base_url()?><?=$listing->vendorID->peerID?>/store/<?=$listing->slug?>&media=https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium . "?usecache=true": ''; ?>&description=<?=urlencode($listing->item->title)?>" target="_blank"><img src="<?=asset_url()?>img/icon-pinterest.png" height=12.5 target="_blank"/></a>
					</div>
				</div>


			<div class="Listing-Upper">
				<div style="width:100%;">
					<a href="#photos"><div id="Listing-Upper-Image" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium. "?usecache=true" : ''; ?>');"></div></a>
					<div id="more-photos-link"><a href="#photos" style="font-size:14px;text-decoration: underline">View <?=count($listing->item->images)?> <?=ngettext('Photo', 'Photos', count($listing->item->images))?></a></div>
				</div>

				<div class="Purchase-Button-Col2">
					<div class="Purchase-Button-Box clearfix">
						<div style="display: flex;justify-content: center;align-items: center;">
							<button type="submit" class="Purchase-Button" onclick="location.href='/buy/<?=$listing->vendorID->peerID?>/item/<?=$listing->slug?>';">
								<span class="Purchase-Button-Text"><?=($listing->metadata->contractType == "CRYPTOCURRENCY") ? "TRADE NOW" : "BUY NOW"?></span>
							</button>
						</div>


						<div id="listing-metadata-box">
							<div class="Buy-Button-Review-Caption">⭐ <?=number_format($rating,1)?> (<a href="#reviews"><?=$ratings?></a>)</div>
							<div class="Buy-Button-Free-Shipping">

								<?php if($free_shipping) { ?>
								<div class="Buy-Button-Divider"></div>
								<div class="phraseBox">Free Shipping</div>
								<?php } ?>

							</div>
							<div style="width: inherit; display: flex;  align-items: center;">
								<div class="Buy-Button-Divider"></div>
								<div class="Buy-Button-Social">
									<a href="https://twitter.com/intent/tweet?text=<?=urlencode($listing->item->title)?> on @OpenBazaar <?=base_url()?>store/<?=$listing->vendorID->peerID?>/<?=$listing->slug?>" target="_blank" title="Share on Twitter"><img src="<?=asset_url()?>img/icon-twitter.png" height=12.5 style="margin-right: 5px" /></a>
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url()?>/<?=$listing->vendorID->peerID?>/store/<?=$listing->slug?>" target="_blank"><img src="<?=asset_url()?>img/icon-facebook.png" height=12.5 style="margin-right: 5px" target="_blank" title="Share on Facebook"/></a>
									<a href="http://pinterest.com/pin/create/button/?url=<?=base_url()?><?=$listing->vendorID->peerID?>/store/<?=$listing->slug?>&media=https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium . "?usecache=true": ''; ?>&description=<?=urlencode($listing->item->title)?>" target="_blank"  title="Share on Pinterest"><img src="<?=asset_url()?>img/icon-pinterest.png" height=12.5 target="_blank"/></a>
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
						<div style="margin:0 auto;display: flex;width:100%;align-content: center;align-items: center;">

							<div style="flex:1;display:flex;align-content: center; align-items: center">
								<div style="margin:0 auto; display: flex; align-items: center">
								Type: &nbsp; <strong><?=contract_type_to_friendly($listing->metadata->contractType)?> (<?=$listing->metadata->coinType?>)</strong>
								&nbsp;
							Inventory: &nbsp;<span id="crypto-inventory" data-peerID="<?=$profile->peerID?>" data-slug="<?=$listing->slug?>" data-divisibility="<?=$listing->metadata->coinDivisibility?>" style="font-weight: bold">-</span> &nbsp;  <img src="<?=asset_url()?>img/cryptoIcons/<?=$listing->metadata->coinType?>-icon.png" width=16 height=16/>
								</div>
							</div>

						</div>

						<?php } ?>

						</div>
					</div>

					<?php if(isset($listing->item->tags)) { ?>
					<div class="Listing-Tags">
						<div style="font-weight: bold;font-size:14px;margin-bottom:10px;">Tags</div>
						<?php
							foreach($listing->item->tags as $tag) { ?>
						<a href="/discover/results?q=<?=urlencode($tag)?>" title="Search for <?=$tag?>"><div class="tag""><?=$tag?></div></a>
						<?php } ?>
						<?php if(count($listing->item->tags) == 0) { ?><span class="inactive-text" style="font-size: 13px">No tags entered</span><?php } ?>

					</div>
					<?php } ?>

					<div class="Listing-Tags">
						<div style="font-weight: bold;font-size:14px;margin-bottom:10px;margin-top:10px;">Accepted Currency</div>
						<?php

							$coins = array(
								"BCH" => array("label"=>"Bitcoin Cash", "icon"=>"bchIcon128.png"),
								"BTC" => array("label"=>"Bitcoin", "icon"=>"btcIcon128.png"),
								"LTC" => array("label"=>"Litecoin", "icon"=>"ltcIcon128.png"),
								"ZEC" => array("label"=>"Zcash", "icon"=>"zecIcon128.png"),
                                "ETH" => array("label"=>"Ethereum", "icon"=>"ethIcon128.png")
							);

							foreach($listing->metadata->acceptedCurrencies as $acceptedCurrency) { ?>
								<div class="acceptedCurrency">
									<div style="display:flex;align-items:center;">
										<div style="width:15px;""><img src="<?=asset_url()?>img/ios7-checkmark-empty.png" width=12 height=12 /></div>
										<div><img class="currencyIcon" src="<?=asset_url()?>img/<?=$coins[$acceptedCurrency]['icon']?>"/></div>
									</div>
									<div><?=$coins[$acceptedCurrency]['label']?></div>
								</div>

						<?php	}
						?>
					</div>

					<?php if($has_verified_mod) { ?>
					<div class="verified-mod-container">
						<div style="display: flex;justify-content: center; margin-bottom: 5px"><img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=20/> <span style="font-weight:bolder;font-size: 14px">Verified Moderator</span></div>
						<div style="font-size: 14px">You can purchase this listing with a moderator verified by <strong>OB1</strong>. <a href="https://ob1.io/verified-moderators.html" target="_blank">Learn more</a></div>
					</div>
					<?php } ?>





				</div>

			</div>




			</div>

			<div class="Description-Box">
				<div class="Description-Header">Description</div>
				
				<?php if(isset($listing->item->description)) { ?>
					<div><?=$listing->item->description?></div>
				<?php } else { ?>
					<div class="inactive-text" style="font-size: 14px">No description entered</div>
				<?php } ?>
			</div>

			<a name="photos"></a>
			<?php $this->load->view('listing_carousel'); ?>

			<div class="Description-Box">

				<div class="Description-Header" style="display:flex;">
					<div style="width:70px;"><a name="reviews">Reviews</a></div>
					<div id="mobile-review-score" style="flex:1;margin-top:-3px;">⭐<?=number_format($rating, 2)?> (<a href="#reviews"><?=$ratings?></a>)</div>
				</div>

				<?php if(empty($reviews)) { ?>
					<div class="inactive-text" style="padding-top:10px;font-size:14px;">No reviews found</div>
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
						<div style="display: table-cell;width:20%;" class="mobile-hidden">Price (additional item)</div>
					</div>

						<?php foreach($shipping_option->services as $service) { ?>
						<div class="shipping-body-row" style="border-bottom:1px solid #d2d3d9;display: table-row">
							<div style="display: table-cell;width:40%;"><?=$service->name?></div>
							<div style="display: table-cell;width:20%"><?=$service->estimatedDelivery?></div>
							<div style="display: table-cell;width:20%"><?=(isset($service->price))?pretty_price($service->price,$listing->metadata->pricingCurrency):"FREE"?></div>
							<div style="display: table-cell;width:20%" class="mobile-hidden"><?=(isset($service->additionalItemPrice))?pretty_price($service->additionalItemPrice,$listing->metadata->pricingCurrency):"FREE"?></div>
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
				<div style="padding-top:10px;font-size:14px;">
					<?=(isset($listing->refundPolicy)) ? $listing->refundPolicy : ""?>
					<?php if(empty($listing->refundPolicy)) { ?>
						<div class="inactive-text" style="padding-top:10px;font-size:14px;">No return policy entered</div>
					<?php } ?>
				</div>
			</div>

			<div class="Description-Box">
				<div class="Description-Header">Terms of Service</div>
				<div style="padding-top:10px;font-size:14px;">
					<?=(isset($listing->termsAndConditions)) ? $listing->termsAndConditions : ""?>
					<?php if(empty($listing->termsAndConditions)) { ?>
						<div class="inactive-text" style="padding-top:10px;font-size:14px;">No terms and conditions entered</div>
					<?php } ?>
				</div>
			</div>





			<div class="Description-Box">
				<div class="Description-Header More-By" style="margin-bottom:10px;">More by <a href="/store/<?=$profile->peerID?>" title="<?=$profile->name?>"><?=$profile->name?></a></div>
				<div class="More-Listings-Mobile">
					<?php
					$i = 0;

					if($all_listings) {

						// Loop through listings and remove the listing for this page
						foreach($all_listings as $k=>$v) {
							if($v->slug == $slug) {
								unset($all_listings[$k]);
							}
						}

						$all_listings = array_slice($all_listings, 0, 8);
						foreach($all_listings as $listing) {
							if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") {
								$coinType = $listing->coinType;
								$price = pretty_price(get_coin_amount($coinType), $coinType);
							} else {
							    if(!isset($listing->price->currencyCode)) {
                                    $price = pretty_price($listing->price->amount, $listing->price->currency->code);
                                } else {
                                    $price = pretty_price($listing->price->amount, $listing->price->currencyCode);
                                }

							}

						?>

						<div class="More-Listing-Unit">
							<div class="Mobile-More-Listing">
							<a href="/<?=$profile->peerID?>/store/<?=$listing->slug?>">
							<div class="Store-Body-Listing-Box" style="padding-top:0">
								<div class="Store-Body-Listing-Box-Photo" style="background-image:url('https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small. "?usecache=true"?>');"></div>
								<div class="Discover-Body-Listing-Box-Desc">
									<div class="Discover-Body-Listing-Box-Title"><a href="/<?=$profile->peerID?>/store/<?=$listing->slug?>"><?=$listing->title?></a></div>
								</div>
								<div class="Listing-Details">
									<div class="Listing-Star">⭐</div>
									<div class="Listing-Rating">&nbsp;<?=number_format($listing->averageRating, 1)?> (<span class="underline"><?=$listing->ratingCount?></span>)</div>
									<div class="Listing-Price"><?=$price;?></div>
								</div>
							</div>
							</a>
							</div>
						</div>

					<?php }

					} else { echo '<div style="text-align:center;">This store has no other listings.</div>'; } ?>



				</div>
				<?php if($listing_count > 8) { ?>
					<div style="text-align:center;">
						<div class="button" style="border-radius: 2px;display: inline-block; box-shadow: 0 1px 0 0 rgba(219, 219, 219, 0.5);  background-color: #ffffff;  border: solid 1px #d2d3d9;margin:0 auto;margin-top:12px;padding:8px 33px;font-size:13px;font-weight:bolder;cursor:pointer" onclick="location.href='/<?=$profile->peerID?>/store';">See All</div>
					</div>

					<?php } ?>

					<br clear="both"/>
			</div>

			<br clear="both"/>

		</div>

		</div>
