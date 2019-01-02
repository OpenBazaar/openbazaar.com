<div class="Rectangle-10 clearfix">
	
	<?php $this->load->view('store_header',array('tab'=>'listings')); ?>
	<?php $this->load->view('store_header_mobile',array('tab'=>'listings')); ?>	
	
	<div class="Page-Sub-Content clearfix Page-Sub-Content-Mobile">		
		<div class="Store-Col1" style="width:220px;">
			
			<div class="Store-Filter-Box">
				<div class="filter-box-header">Shipping</div>
				<div>Ships to: 
					<select id="filter_country" style="width:130px;">
						<option name="country" value="ALL">(Any country)</option>
						<?php foreach($countries as $country) { ?>
            <option value="<?=$country['dataName']?>" ><?=$country['name']?></option>
            <?php } ?>
					</select>
            	</div>
				<div style="display: flex;;vertical-align: middle;padding:5px 0;">
					<div style="display: 1;vertical-align: middle;"><input id="filter_freeshipping" name="free_checkbox" type="checkbox" onclick="applyListingsFilter();"/></div>
					<div style="display: 1;vertical-align: middle;"><div class="phraseBox" style="margin:0;">FREE SHIPPING</div></div>
				</div>
			</div>
			
			<div class="Store-Filter-Box" style="padding:0 24px 10px 0">
				<div class="filter-box-header" style="padding:10px;">Category</div>
				<div class="category-row active" style="display: flex;word-break: break-all; word-wrap: break-word;width:180px;">
					<div style="display: 1"></div>
					<div style="display: 1;" class="category-button" category="All">All</div>
				</div>
				
				<input type="hidden" id="filter-category" name="category" value="<?=$category?>"/>
				<input type="hidden" id="sani-category" value="All"/>
				<?php if(!empty($categories)) {
					foreach($categories as $category) {
						$sanitized_cat = str_replace(array(" ","/"), "", $category);
						?>
						
						<div class="category-row" style="display: flex;">
							<div style="display: 1;"></div>
							<div class="category-button" category="<?=$category?>" style="display: 1;width:180px;cursor: pointer;" ><?=$category?></div>
						</div>
					<?php }
				} ?>
			</div>
			<div class="Store-Filter-Box">
				<div class="filter-box-header">Rating</div>
					<p><input type="radio" name="rating" value="0" class="ratings-input-control" id="filter-box-ratings-all" checked=""> <label for="filter-box-ratings-all">All</label></p>
					<p><input type="radio" name="rating" value="5" class="ratings-input-control" id="filter-box-ratings-5"><label for="filter-box-ratings-5">⭐⭐⭐⭐⭐ 5</p>
					<p><input type="radio" name="rating" value="4" class="ratings-input-control" id="filter-box-ratings-4"><label for="filter-box-ratings-4">⭐⭐⭐⭐ 4+</p>
					<p><input type="radio" name="rating" value="3" class="ratings-input-control" id="filter-box-ratings-3"><label for="filter-box-ratings-3">⭐⭐⭐ 3+</p>
					<p><input type="radio" name="rating" value="2" class="ratings-input-control" id="filter-box-ratings-2"><label for="filter-box-ratings-2">⭐⭐ 2+</p>
					<p><input type="radio" name="rating" value="1" class="ratings-input-control" id="filter-box-ratings-1"><label for="filter-box-ratings-1">⭐ 1+</p>							
            </div>
        </div>
        <div style="flex:1">
		    <div style="display:flex;height:40px;">
		        <div class="Store-Widget-Notice" style="cursor:pointer;font-size:13px;flex:1;box-sizing:border-box;">
                    <div class="Store-Widget-Notice-Box">
                        <a href="/widget/<?=$profile->peerID?>">
                        <div class="new-tag">NEW</div> <span style="font-weight:bold;color:#000000;margin-right:2px;margin-left:34px">Store Widget Builder</span>  Create an OpenBazaar store widget
                        </a>
                    </div>
		        </div>

                <div class="Store-Share">
                    <span style="font-size: 13px">Share&nbsp;</span>
                    <a href="https://twitter.com/intent/tweet?text=<?=urlencode($profile->name)?> on @OpenBazaar <?=base_url()?>store/<?=$profile->peerID?>" target="_blank" title="Share on Twitter"><img src="<?=asset_url()?>img/icon-twitter.png" height=12.5 style="margin-right: 5px" /></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url()?>/store/<?=$profile->peerID?>" target="_blank"><img src="<?=asset_url()?>img/icon-facebook.png" height=12.5 style="margin-right: 5px" target="_blank" title="Share on Facebook"/></a>
                    <a href="http://pinterest.com/pin/create/button/?url=<?=base_url()?>store/<?=$profile->peerID?>&media=https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large. "?usecache=true" : ''; ?>&description=<?=urlencode($profile->shortDescription)?>" target="_blank"  title="Share on Pinterest"><img src="<?=asset_url()?>img/icon-pinterest.png" height=12.5 target="_blank"/></a>
                </div>

        	</div>
		
            <div class="listings-container">

                <?php
                $i = 0;

                if($listings) {
                    foreach($listings as $listing) {
                        if(isset($listing) && $listing->contractType == "CRYPTOCURRENCY") {
                            $coinType = $listing->coinType;
                            $price = pretty_price(get_coin_amount($coinType), $coinType, 8);
                        } else {
                            $price = pretty_price($listing->price->amount, $listing->price->currencyCode);
                        }
                ?>

                    <div class="mobile-listing-box">
                    <a href="/store/<?=$profile->peerID?>/<?=$listing->slug?>" title="<?=$listing->title?>">
                    <div rating="<?=$listing->averageRating?>" freeShipping="<?=implode($listing->freeShipping, ",")?>" category="<?=($listing->categories) ?implode(",", $listing->categories): "";?>" class="Store-Body-Listing-Box  <?php if($i%3==2) { echo "Discover-Body-Listing-Box-Last"; } ?>">

                        <a class="Discover-Body-Listing-Link" href="/store/<?=$profile->peerID?>/<?=$listing->slug?>" title="<?=$listing->title?>"></a>
                        <?php if($verified_mod) { ?>
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

                        <div class="Store-Body-Listing-Box-Photo lazy" data-src='https://gateway.ob1.io/ob/images/<?=$listing->thumbnail->small. "?usecache=true"?>');" style="background-image: url('<?=asset_url()?>img/defaultItem.png');">
                            <?php if(count($listing->freeShipping) > 0) { ?>
                            <div class="phraseBox" style="margin:8px 8px 0 0;">FREE SHIPPING</div>
                            <?php } ?>
                        </div>
                        <div class="Discover-Body-Listing-Box-Desc">
                            <div class="Discover-Body-Listing-Box-Title">
                                <?php
                                if($listing->contractType == "CRYPTOCURRENCY") {
	                                
	                                $modifier = $listing->price->modifier;
									switch(true) {
										case $modifier == 0: 
											$price_class = "cryptolisting-marketprice";
											$modifier_caption = "market price";
											$price_symbol = "checkmark";
											break;
										case $modifier > 0:
											$price_class = "cryptolisting-above";
											$modifier_caption = $modifier . "% above";
											$price_symbol = "arrow-round-up";
											break;
										case $modifier < 0:
											$price_class = "cryptolisting-below";
											$modifier_caption = abs($modifier) . "% below";
											$price_symbol = "arrow-round-down";
											break;
									}
									$price = pretty_price(get_coin_amount($listing->coinType)*(1+($modifier/100)), $listing->coinType, 8);	                                
                                ?>
                                <div style="font-size:13.5px;align-items: center;display: flex;">									
                                    <img src="<?=asset_url()?>img/cryptoIcons/<?=$profile->currencies[0]?>-icon.png" width=16 height=16 style="margin-right:4px;"/> <?=$profile->currencies[0]?>
                                    <img src="<?=asset_url()?>img/icon-arrow.png" width=12 height=12 style="margin:0 12px;" />
                                    <img src="<?=asset_url()?>img/cryptoIcons/<?=$listing->coinType?>-icon.png" width=16 height=16 style="margin-right:4px;"/> <?=$listing->coinType;?>
                                </div>
                                <?php
                                } else { ?>
                                    <a href="/store/<?=$profile->peerID?>/<?=$listing->slug?>"><?=$listing->title?></a>
                                <?php } ?>


                            </div>
                        </div>
                        <div class="Listing-Details">
                            <div class="Listing-Star">⭐</div>
                            <div class="Listing-Rating">&nbsp;<?=number_format($listing->averageRating, 1)?> (<span class="underline"><?=$listing->ratingCount?></span>)</div>
                            <div class="Listing-Price <?php if($listing->contractType == "CRYPTOCURRENCY") { print $price_class; }?>" style="font-size:12px"><?=$price;?> <?php if($listing->contractType == "CRYPTOCURRENCY") { ?>(<ion-icon name="<?=$price_symbol?>"></ion-icon>)<?php }?></div>
                        </div>
                    </div>
                    </a>
                    </div>

                <?php }
                $i++; } else { echo '<div class="box" style="text-align:center;"><p>This store has no listings</p></div>'; } ?>
                <br clear="both"/>
            </div>
        </div>
	</div>
			
</div>
		

