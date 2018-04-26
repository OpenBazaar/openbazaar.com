<div class="Rectangle-10 clearfix">
	<div class="Page-Sub-Content">
		
		<div class="OB1">OB1</div>
		<div class="Search-Bar clearfix">
			<form action="javascript:void();" onsubmit="location.href='/discover/results/'+document.getElementById('frm-search-input').value;">
			<div class="Search-Bar-Box-Left">
				<div class="Rectangle-6">
					<img src="https://ob1.io/images/logo.png" class="logo"/>
				</div>
				<input id="frm-search-input" type="text" class="Search-OB1" placeholder="Search OB1..." value="<?=$term?>"/>
				
			</div>
			<button class="Search-Button" type="submit">
				<div class="Search">Search</div>
			</button>
			</form>
		</div>
		
		<div class="Suggestions-Box clearfix">
			<div class="lbl clearfix">Suggestions:</div> <a href="/discover/results/electronics">electronics</a> <a href="/discover/results/games">games</a> <a href="/discover/results/books">books</a> <a href="/discover/results/movies">movies</a> <a href="/discover/results/health">health</a> 
		</div>
		
		<div class="Line"></div>
		
		<div class="Search-Results-Container">
		
			<div class="Search-Results-Filter-Container">
				
				<form method="get">
				<?php foreach($search_options as $option=>$value) { ?>
				
				<div class="Search-Filter-Box" style="margin-right:10px;">
					<div class="filter-box-header"><?=$value->label?></div>
					
					<?php if($value->type == "radio") { 
						foreach($value->options as $suboption) {								
					?>
					<div>
						<input type=radio name="<?=$option?>" value="<?=$suboption->value?>" <?php if($accepted_currencies == $suboption->value || $suboption->checked || ($suboption->checked != "" && $suboption->default) ) { echo 'checked'; } ?> onclick="this.form.submit()"/> <?=$suboption->label?>
					</div>
					<?php } } ?>
					
					
					<?php if($value->type == "dropdown") { ?>
					<select name="<?=$option?>" onchange="this.form.submit()" style="width:200px;">
					<?php
						foreach($value->options as $suboption) {								
					?>
						<option value="<?=$suboption->value?>" <?php if($condition == $suboption->value || $shipping == $suboption->value) { ?>selected<?php } ?>><?=$suboption->label?></option>
					<?php } ?>
					</select>
					<?php } ?>
					
				</div>
				<?php } ?>
				</form>
				
			</div>



		<div class="Search-Results-Listings-Container">
		
		<div class="search-results-results-found" style="display: flex;align-items: center">
			<div class="Listings-Total" style="flex:1;"><strong><?=number_format($total)?> listings</strong> found</div>
			<div style=""><a href="">Filters</a></div>
		</div>
		
		<div class="Discover-Body">							
			
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
				
				if($type != "cryptocurrency") {
												
			?>				
				<div class="Discover-Body-Listing-Box-Mobile">
				<div class="Discover-Body-Listing-Box">
					<div class="Discover-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$listing->data->thumbnail->small?>');" href="/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>"" onclick="location.href='/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>';">
						<?php if($listing->has_verified_mod) { ?>
						<div class="verified-mod-badge" style="float:left;cursor:pointer;background-position: center center;width:36px;height:36px;background-size:24px 24px; background-repeat: no-repeat;background-image: url(https://search.ob1.io/images/verified_moderator_badge_tiny.png), url('../imgs/verifiedModeratorBadgeDefault-tiny.png');">
							
							<div class="verified-mod-tip hidden up-arrow" style="width:250px">
								<div style="margin-left:auto;margin-right:auto;text-align: center;display: table">
									<img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=24 style="width:24px;text-align:right;display: table-cell;vertical-align: middle; " />
									<span style="vertical-align: middle;display: table-cell">Verified Moderator</span>
								</div>
								<p style="font-size:15px;">Purchase this listing with a trusted moderator, verified by OB1. <br/> <a href="https://ob1.io/verified-moderators.html">Learn more</a></p>
							
							</div>
							
							
						</div>																											
						<?php } ?>
						
						<?php if(isset($listing->data->freeShipping)) { ?>
						<div class="phraseBox" style="margin:8px 8px 0 0;">FREE SHIPPING</div>
						<?php } ?>
						
					</div>
					
					
					<div class="Search-Avatar-Circle" style="z-index:1000;float:right;margin-top:-21px;background-image: url('<?php echo (($listing->relationships->vendor->data->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$listing->relationships->vendor->data->avatarHashes->small : asset_url()."img/defaultAvatar.png"?>');" title="<?=$listing->relationships->vendor->data->name?>" onclick="location.href='/store/<?=$listing->relationships->vendor->data->peerID?>'"></div>
					
					<div class="Discover-Body-Listing-Box-Desc">
						<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>"><?=$listing->data->title?></a></div>
					</div>
					<div class="Listing-Details">
						<div class="Listing-Star">⭐</div>
						<div class="Listing-Rating"><?=number_format($listing->data->averageRating,2)?> (<?=$listing->data->ratingCount?>)</div>
						<div class="Listing-Price"><?=pretty_price($listing->data->price->amount, $listing->data->price->currencyCode);?></div>
					</div>
				</div>
				</div>

			
			<?php 
				
				} else {
					
					?>
					
					<div class="list-view-header" style="width:700px;">
						<div class="header-row row" style="width:100%;">
							<div class="column" style="width:30%">Title</div>
							<div class="column" style="width:30%">Vendor</div>
							<div class="column" style="width:20%">Price (1 unit)</div>
							<div class="column" style="width:20%">Inventory</div>
						</div>
						</div>
					<div class="list-view-content">
						<div class="row">																			
							<div class="column" style="width:30%">
							
								<?php if($listing->has_verified_mod) { ?>
									<div class="verified-mod-badge" style="float:left;cursor:pointer;background-position: center center;width:24px;height:36px;background-size:24px 24px;background-repeat: no-repeat;background-image: url(https://search.ob1.io/images/verified_moderator_badge_tiny.png), url('../imgs/verifiedModeratorBadgeDefault-tiny.png');margin-right:5px;">
										
										<div class="verified-mod-tip hidden up-arrow" style="width:250px">
											<div style="margin-left:auto;margin-right:auto;text-align: center;display: table">
												<img src="https://search.ob1.io/images/verified_moderator_badge_tiny.png" width=24 style="width:24px;text-align:right;display: table-cell;vertical-align: middle; " />
												<span style="vertical-align: middle;display: table-cell">Verified Moderator</span>
											</div>
											<p style="font-size:15px;">Purchase this listing with a trusted moderator, verified by OB1. <br/> <a href="https://ob1.io/verified-moderators.html">Learn more</a></p>
										
										</div>
										
										
									</div>																											
								<?php } ?>
						
								<?=$listing->data->title?></div>
							
							<div class="column" style="width:30%">
								<div class="Listview-Avatar-Circle" style="z-index:1000;float:left;background-image: url('<?php echo (($listing->relationships->vendor->data->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$listing->relationships->vendor->data->avatarHashes->small : asset_url()."img/defaultAvatar.png"?>');" title="<?=$listing->relationships->vendor->data->name?>" onclick="location.href='/store/<?=$listing->relationships->vendor->data->peerID?>'"></div>
								<div>
									<?=$listing->relationships->vendor->data->name?>
									<div style="display:flex"">
										<div class="Listing-Star" style="flex:1;margin-left:0">⭐</div>
										<div class="Listing-Rating" style="flex:9"><?=$listing->data->averageRating?> (<?=$listing->data->ratingCount?>) <?=$listing->relationships->vendor->data->location?></div>
										
									</div>
								</div>
							</div>
							<div class="column" style="width:20%"><?=number_format(1 / get_market_price($listing->data->coinType) * get_market_price("BTC"), 5) ?> BTC</div>
							<div class="column" style="width:20%">0 <?=$listing->data->coinType?></div>
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
			<div class="Pagination-Box <?php if($dead_back) { echo "Dead-Back"; }?>" <?php if(!$dead_back) { ?>onclick="location.href='<?=$pagination_url?>/<?=$page-1?>?<?=$_SERVER['QUERY_STRING']?>'"<?php } ?>>&lt;</div>
			
			<?php if($page_count > 1) { ?>
			<div class="Pagination-Box <?php if($dead_forward) { echo "Dead-Forward"; }?>" <?php if(!$dead_forward) { ?>onclick="location.href='<?=$pagination_url?>/<?=$page+1?>?<?=$_SERVER['QUERY_STRING']?>'"<?php } ?>>&gt;</div>
			<?php } ?>
			
		</div>
		<?php } ?>
		
		
</div>
		
	</div>
	
	</div>
	
</div>
		

		
	