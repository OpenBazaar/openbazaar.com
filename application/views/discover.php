<?php $this->load->view('discover_header'); ?>

<div class="Rectangle-10 clearfix">
	<div class="Page-Sub-Content">
		<div class="Search-Results-Container">	
			<div class="Search-Results-Filter-Container">
				<div class="modal-close-button-container" style="width:100%;justify-content: flex-end;display:flex;padding-right:10px;box-sizing: border-box">
				<div class="modal-close-button-mobile" onclick="$('.Search-Results-Filter-Container').toggleClass('flex-visible');$('.Search-Results-Listings-Container').toggle();"><img src="<?=asset_url()?>img/ios7-close-empty.png"/></div></div>
				
				<form method="get" id="search-form">
					
					<input type=hidden name="q" value="<?=$q?>"/>
					
				<?php foreach($search_options as $option=>$value) { 
/*
					$split_option = explode("_", $option);
					$option_name = (count($split_option) > 1) ? $split_option[1]: $split_option[0];
*/
					$option_name = $option;
				?>
				
				<div class="Search-Filter-Box-Mobile">
				<div class="Search-Filter-Box" style="margin-right:10px;">
					<div class="filter-box-header">
						<label for="<?=$option_name?>"><?=$value->label?></label>
					</div>
					
					<?php if($value->type == "radio") { 
						foreach($value->options as $suboption) {								
					?>
					<p>
						<input type=radio id="<?=$option_name."-".$suboption->value?>" name="<?=$option_name?>" value="<?=$suboption->value?>" <?php if(($suboption->checked || (!$suboption->checked && $suboption->default)) || ($option_name == "acceptedCurrencies" && $suboption->value == "BTC") ) { echo 'checked'; } ?> onclick="this.form.submit();"/> <label for="<?=$option_name."-".$suboption->value?>"><?=$suboption->label?></label>
					</p>
					<?php } } ?>
					
					
					<?php if($value->type == "dropdown") { ?>
					<select name="<?=$option_name?>" onchange="this.form.submit()" style="width:200px;">
					<?php
						foreach($value->options as $suboption) {								
					?>
						<option value="<?=$suboption->value?>" <?php if($suboption->checked) { ?>selected<?php } ?>><?=$suboption->label?></option>
					<?php } ?>
					</select>
					<?php } ?>
					
				</div>
				</div>
				<?php } ?>
				
				
			</div>



		<div class="Search-Results-Listings-Container">
		
		<div class="search-results-results-found" style="display: flex;align-items: center">
			<div class="Listings-Total" style="flex:1;"><strong><?=number_format($total)?> listings</strong> found</div>
			<div class="Listings-Sort" style="width:auto">
				Sort by <select name="sortBy" onchange="this.form.submit();">
					<?php foreach($search_sorts as $key=>$sort) { ?>
					<option value="<?=$key?>" <?php if($sort->selected) { ?>selected<?php } ?>><?=$sort->label?></option>
					
					<?php } ?>
				</select>
			</div>
			<div class="filters-toggle"><a href="javascript:undefined" onclick="$('.Search-Results-Filter-Container').toggleClass('flex-visible');$('.Search-Results-Listings-Container').toggle();">Filters</a></div>
		</div>
		</form>
		<div class="Discover-Body">	
			<?php if(sizeof($listings) == 0) { ?>
			<div class="box">
				<p style="font-size: 14px;">No listings match your search criteria</p>
				<a href="/discover/results" style="text-decoration: none"><button class="user-btn button" style="float: none">Reset Search</button></a>
			</div>
			<?php } ?>

			<?php if(count($listings) > 0 && isset($query_string['type']) && $query_string['type'] == "cryptocurrency") { ?>
			<div class="list-view-header" style="width:100%;">
				<div class="header-row row" style="display: flex;width:100%;background: #f8f8f8">
					<div class="column column-sm" style="width:72px;">TRADE</div>
					<div class="column column-sm" style="width:52px;"></div>
					<div class="column column-sm" style="width:134px;">FOR</div>
					<div class="column column-sm" style="flex:1;">TRADER</div>
					<div class="column column-sm" style="width:114px;text-align: right;">PRICE <span style="color:#777777;font-weight:normal;">(market price)</span></div>	
					<div class="column column-sm" style="width:114px;text-align: right;">INVENTORY</div>						
				</div>
			</div>
			
			<?php } ?>						
			
			<?php						
			$i = 0;

			foreach($listings as $listing) { 	

				$verified = false;
				foreach($listing->relationships->moderators as $mod) {
					foreach($verified_mods as $vermod) {
						if($mod == $vermod->peerID) {
							$verified = true;
							break;
						}
					}
					if($verified) {
						break;
					}
				}
				$listing->has_verified_mod = $verified;
				
				if(!isset($query_string['type']) || $query_string['type'] != "cryptocurrency") {

					$is_crypto_listing = $listing->data->contractType == "CRYPTOCURRENCY";

					if($is_crypto_listing) {
						$price = pretty_price(1, $listing->data->coinType, 8);
					} else {
						$price = pretty_price($listing->data->price->amount, $listing->data->price->currencyCode);
					}
												
			?>				
				<div class="Discover-Body-Listing-Box-Mobile">																				
				<div class="Discover-Body-Listing-Box">
					<a class="Discover-Body-Listing-Link" href="/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>" title="<?=$listing->data->title?>"></a>

						<?php if($listing->has_verified_mod) { ?>
								<div class="verified-mod-badge" style="float:left;cursor:pointer;background-position: center center;width:36px;height:36px;background-size:24px 24px; background-repeat: no-repeat;background-image: url(https://search.ob1.io/images/verified_moderator_badge_tiny.png), url('../imgs/verifiedModeratorBadgeDefault-tiny.png');">
									
									<div class="verified-mod-tip hidden up-arrow" style="width:250px">
										<div style="margin-left:auto;margin-right:auto;text-align: center;display: table">
											<img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=24 style="width:24px;text-align:right;display: table-cell;vertical-align: middle; " />
											<span style="vertical-align: middle;display: table-cell; font-weight: 700; font-size: 14px">Verified Moderator</span>
										</div>
										<p class="verified-mod-text" style="font-size:13px;">You can purchase this listing with a moderator verified by <b>OB1</b>. <br/> <a href="https://ob1.io/verified-moderators.html" style="text-decoration: underline !important; cursor: pointer !important;" target="_blank">Learn more</a></p>
									
									</div>
								</div>																										
						<?php } ?>
						
					<div class="Discover-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$listing->data->thumbnail->small?>'), url('<?=asset_url()?>img/defaultItem.png');">
						<?php if(isset($listing->data->freeShipping)) { ?>
						<div class="phraseBox" style="margin:8px 8px 0 0;">FREE SHIPPING</div>
						<?php } ?>
					</div>
					
					<div style="display: flex; margin-top: 10px;">						
						<div class="reportBtnShell" data-peerID="<?=$listing->relationships->vendor->data->peerID?>" data-slug="<?=$listing->data->slug?>" data-tip="Report this listing" style="margin-top:-25px;margin-left:5px;flex:1;display:none;">
						  <button class="iconBtnTn button clrP clrBr tx2 " style="width: 30px;padding:0;height: 30px;cursor:pointer;background-color:white;">
						    <img src="<?=asset_url()?>img/ios7-flag.png" width=24 />
						  </button>
						</div>
							
							<div style="flex:1">
						<a href="/store/<?=$listing->relationships->vendor->data->peerID?>" title="<?=$listing->relationships->vendor->data->name?>">
						<div class="Search-Avatar-Circle" style="background-image: url('<?php echo (($listing->relationships->vendor->data->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$listing->relationships->vendor->data->avatarHashes->small : asset_url()."img/defaultAvatar.png"?>');" title="<?=$listing->relationships->vendor->data->name?>"></div>
						</a>
							</div>
				
					</div>
					
<!-- 					<div class="Search-Avatar-Circle" style="z-index:1000;float:right;margin-top:-21px;background-image: url('<?php echo (($listing->relationships->vendor->data->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$listing->relationships->vendor->data->avatarHashes->small : asset_url()."img/defaultAvatar.png"?>');" title="<?=$listing->relationships->vendor->data->name?>" onclick="location.href='/store/<?=$listing->relationships->vendor->data->peerID?>'"></div> -->
					
					<div class="Discover-Body-Listing-Box-Desc">
						<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>">
							<?php if($is_crypto_listing) {  ?>
							<div style="font-size:13.5px;align-items: center;display: flex;">	
							
								<img src="<?=asset_url()?>img/coins/64x64/<?=coin_to_icon($listing->data->acceptedCurrencies[0])?>.png" width=16 height=16 style="margin-right:4px;"/> <?=$listing->data->acceptedCurrencies[0]?> 
								<img src="<?=asset_url()?>img/icon-arrow.png" width=12 height=12 style="margin:0 7px;" />
								<img src="<?=asset_url()?>img/coins/64x64/<?=coin_to_icon($listing->data->coinType)?>.png" width=16 height=16 style="margin-right:4px;"/> <?=$listing->data->coinType;?> 
							</div>
							<?php } else { ?><?=$listing->data->title?>
							<?php } ?>
						</a></div>
					</div>
					<div class="Listing-Details">
						<div class="Listing-Star">⭐</div>
						<div class="Listing-Rating">&nbsp;<?=number_format($listing->data->averageRating, 1)?> (<span class="underline"><?=$listing->data->ratingCount?></span>)</div>
						<div class="Listing-Price"><?php if($is_crypto_listing) { ?><span style="font-weight: normal;color:#000000"><?=$price?> (<img src="<?=asset_url()?>img/ios7-checkmark-empty.png" width=12 height=12 />)</span><?php } else { ?><?=$price?><?php } ?></div>
					</div>
				</div>
				</div>

			
			<?php 
				
				} else {
					
					$crypto_listing = $listing;
					
					$coin_amount = get_coin_amount($crypto_listing->data->coinType);
					
					?>
					
					<div class="list-view-content" onclick="document.location.href='/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>';">						
						<div class="row" style="align-items: center">					
							<div class="column" style="width:78px;font-weight:bold;display: flex;align-items: center">
								<img src="<?=asset_url()?>img/coins/64x64/<?=coin_to_icon($crypto_listing->data->acceptedCurrencies[0])?>.png" width=18 height=18/> &nbsp; <?=$crypto_listing->data->acceptedCurrencies[0];?>
							</div>
							<div class="column" style="width:45px;">
								<img src="<?=asset_url()?>img/icon-arrow.png" width=12 height=12 />
							</div>
							<div class="column" style="width:134px;font-weight:bold;display: flex;align-items: center">
								
								<img src="<?=asset_url()?>img/coins/64x64/<?=coin_to_icon($crypto_listing->data->coinType)?>.png" width=18 height=18/> &nbsp; <?=$crypto_listing->data->coinType;?>
							</div>
							
							<div class="column" style="flex:1;">
								<div class="Listview-Avatar-Circle" style="z-index:1000;float:left;background-image: url('<?php echo (($crypto_listing->relationships->vendor->data->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$crypto_listing->relationships->vendor->data->avatarHashes->small : asset_url()."img/defaultAvatar.png"?>');" title="<?=$crypto_listing->relationships->vendor->data->name?>" onclick="location.href='/store/<?=$crypto_listing->relationships->vendor->data->peerID?>'"></div>
								<div>
									<div style="width:130px; white-space:nowrap;overflow: hidden;text-overflow: ellipsis;"><a href="/store/<?=$crypto_listing->relationships->vendor->data->peerID?>"><?=$crypto_listing->relationships->vendor->data->name?></a></div>
									<div style="display:flex;align-items: center">
										<div class="Listing-Star" style="width:15px;margin-left:0;font-size:10px;">⭐</div>
										<div class="Listing-Rating" style="flex:1;font-size:12px;display: flex;">
											
											<div style="float:left;color:#777777">
											<?=number_format($crypto_listing->relationships->vendor->data->stats->averageRating, 1)?> (<span class="underline"><?=$crypto_listing->relationships->vendor->data->stats->ratingCount?></span>)
											</div>
											
											<?php if($crypto_listing->has_verified_mod) { ?>
										
												<div class="verified-mod-badge" style="float:left;cursor:pointer;background-position: center center;width:16px;height:18px;background-size:16px 18px; background-repeat: no-repeat;background-image: url(https://search.ob1.io/images/verified_moderator_badge_tiny.png), url('../imgs/verifiedModeratorBadgeDefault-tiny.png');margin-left: 4px;">
													
													<div class="verified-mod-tip hidden up-arrow" style="width:250px">
														<div style="margin-left:auto;margin-right:auto;text-align: center;display: table">
															<img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=24 style="width:24px;text-align:right;display: table-cell;vertical-align: middle; " />
															<span style="vertical-align: middle;display: table-cell; font-weight: 700; font-size: 14px">Verified Moderator</span>
														</div>
														<p class="verified-mod-text" style="font-size:13px;">You can purchase this listing with a moderator verified by <b>OB1</b>. <br/> <a href="https://ob1.io/verified-moderators.html" style="text-decoration: underline !important; cursor: pointer !important;" target="_blank">Learn more</a></p>
													
													</div>
												</div>																											
											<?php } ?>
										</div>
										
									</div>
								</div>
							</div>
							<div class="column" style="width:114px;">
								<div style="float:right"><span style="font-size:14px;"><?=pretty_price($coin_amount, $crypto_listing->data->coinType, 8)?></span> (<img src="<?=asset_url()?>img/ios7-checkmark-empty.png" width=12 height=12 />)</div>
							</div>
							<div class="column" style="width:114px;text-align:right;">
								
								<div style="display: flex;align-items: center;float:right;">
									<?php
										if(isset($crypto_listing->data->totalInventoryQuantity)) {
											$inventory = $crypto_listing->data->totalInventoryQuantity / $crypto_listing->data->coinDivisibility;
											echo number_format($inventory). " " . $crypto_listing->data->coinType;
										} else { 
											echo '<span class="unknown">Unknown</span>';
										}																		
									?> &nbsp; <img src="<?=asset_url()?>img/coins/64x64/<?=coin_to_icon($crypto_listing->data->coinType)?>.png" width=18 height=18/>
								</div>
							</div>
							
						</div>
						
					</div>	
						
					
					<?php
					
				}
				
				
				$i++; } ?>
			
		</div>
		
		
		<br clear="both"/>
		<?php if($page_count > 1) { ?>
		<div class="Discover-Pagination">
			
			<?php 
				$dead_back = ($page == 0) ? true : false;
				$dead_forward = ($page == $page_count-1) ? true : false;
			?>
			<div class="Pagination-Box button <?php if($dead_back) { echo "Dead-Back"; }?>" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" <?php if(!$dead_back) { ?>onclick="location.href='<?=$pagination_url?><?=$page-1?>?<?=$_SERVER['QUERY_STRING']?>'"<?php } ?>>&lt; Previous</div>

			<div class="Pagination-Box" style="width: 40px; border-radius: 0; border-left: 0; border-right: 0; background-color: #fbfbfb; cursor: default;"><?=$page+1?></div>
			
			<?php if($page_count > 1) { ?>
			<div class="Pagination-Box button <?php if($dead_forward) { echo "Dead-Forward"; }?>" style="border-top-left-radius: 0; border-bottom-left-radius: 0;" <?php if(!$dead_forward) { ?>onclick="location.href='<?=$pagination_url?><?=$page+1?>?<?=$_SERVER['QUERY_STRING']?>'"<?php } ?>>Next &gt;</div>
			<?php } ?>
			
		</div>
		<?php } ?>
		
		
</div>
		
	</div>
	
	</div>
	
</div>
		

		
	
