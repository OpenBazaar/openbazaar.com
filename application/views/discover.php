
		
		<div class="Rectangle-10 clearfix">
			<div class="Page-Sub-Content">
				<div class="OB1">OB1</div>
				<div class="Search-Bar clearfix">
					<form action="javascript:void();" onsubmit="location.href='/discover/results/'+document.getElementById('frm-search-input').value;">
					<div class="Search-Bar-Box-Left">
						<div class="Rectangle-6">
							<img src="https://ob1.io/images/logo.png" class="logo"/>
						</div>
						<input id="frm-search-input" type="text" class="Search-OB1" placeholder="Search OB1..."/>
						
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
				
				<div class="Listings-Total"><strong><?=number_format($total)?> listings</strong> <?php if($term && $term!="*"){?>found for "<strong><?=urldecode($term)?></strong>"<?php } ?></div>
				
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
					?>

						<div class="Discover-Body-Listing-Box <?php if($i%4==3) { echo "Discover-Body-Listing-Box-Last"; } ?>" onclick="location.href='/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>';">
							<div class="Discover-Body-Listing-Box-Photo" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$listing->data->thumbnail->small?>');">
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
								<div class="phraseBox">FREE SHIPPING</div>
								<?php } ?>
								
							</div>
							<div class="Discover-Body-Listing-Box-Desc">
								<div class="Discover-Body-Listing-Box-Title"><a href="/store/<?=$listing->relationships->vendor->data->peerID?>/<?=$listing->data->slug?>"><?=$listing->data->title?></a></div>
							</div>
							<div class="Listing-Details">
								<div class="Listing-Star">⭐</div>
								<div class="Listing-Rating"><?=$listing->data->averageRating?> (<?=$listing->data->ratingCount?>)</div>
								<div class="Listing-Price"><?=convert_price($listing->data->price->amount, "USD", "BTC");?> BTC</div>
							</div>
						</div>
					
					<?php $i++; } ?>
					
				</div>
				
				
				<br clear="both"/>
				<div class="Discover-Pagination">
					
					<?php 
						$dead_back = ($page == 0) ? true : false;
						$dead_forward = ($page == $page_count-1) ? true : false;
					?>
					<div class="Pagination-Box <?php if($dead_back) { echo "Dead-Back"; }?>" <?php if(!$dead_back) { ?>onclick="location.href='<?=$pagination_url?>/<?=$page-1?>'"<?php } ?>>&lt;</div>
					
					<?php if($page_count > 1) { ?>
					<div class="Pagination-Box <?php if($dead_forward) { echo "Dead-Forward"; }?>" <?php if(!$dead_forward) { ?>onclick="location.href='<?=$pagination_url?>/<?=$page+1?>'"<?php } ?>>&gt;</div>
					<?php } ?>
					
				</div>
				
				
			</div>
			
			
			
		</div>
		

		
	