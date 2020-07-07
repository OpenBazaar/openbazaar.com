<div id="v2-bodyContainer">
    <div class="Search-Results-Container">
        <input type="hidden" id="v2-page" value="search"/>
        <div class="Search-Results-Filter-Container">

            <div class="modal-close-button-container" style="width:100%;justify-content: flex-end;display:flex;padding-right:10px;box-sizing: border-box">
				<div class="modal-close-button-mobile" onclick="$('.Search-Results-Filter-Container').toggleClass('flex-visible');$('.Search-Results-Listings-Container').toggle();"><img src="<?=asset_url()?>img/ios7-close-empty.png"/>
                </div>
            </div>
            <form method="get" id="search-form">
                <input type=hidden name="q" value="<?=$q?>"/>
                <?php foreach($search_options as $option=>$value) {
                    $option_name = $option;
                ?>
                    <div class="Search-Filter-Box-Mobile">
                        <div class="Search-Filter-Box" style="margin-right:10px;">
                            <div class="filter-box-header">
                                <label for="<?=$option_name?>"><?=$value->label?></label>
                            </div>

                            <?php if($value->type == "radio") {
                                $has_checked = false;	// Keep track if an option has been selected or not
                                foreach($value->options as $suboption) {
                                    if($suboption->checked) {
                                        $has_checked = true;
                                    }
                            ?>
                            <p><input type=radio id="<?=$option_name."-".$suboption->value?>" name="<?=$option_name?>" value="<?=$suboption->value?>" <?php if(($suboption->checked == 1) || ((!$has_checked || $suboption->checked) && $suboption->default) || ($option_name == "acceptedCurrencies" && $suboption->value == "BTC") ) { echo 'checked'; } ?> onclick="this.form.submit();"/> <label for="<?=$option_name."-".$suboption->value?>"><?=$suboption->label?></label></p>
                                <?php } ?>
                            <?php } ?>

					        <?php if($value->type == "checkbox") {
						        foreach($value->options as $suboption) {
        					?>
					            <p><input type=checkbox id="<?=$option_name."-".$suboption->value?>" name="<?=$option_name?>" value="<?=$suboption->value?>" <?php if(($suboption->checked == 1)) { echo 'checked'; } ?> onclick="this.form.submit();"/> <label for="<?=$option_name."-".$suboption->value?>"><?=$suboption->label?></label></p>
					        <?php } } ?>

                            <?php if($value->type == "dropdown") { ?>
                            <select name="<?=$option_name?>" onchange="this.form.submit()" style="width:200px;">
                            <?php foreach($value->options as $suboption) { ?>
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
                    Sort by
                    <select class="noborder-dropdown" name="sortBy" onchange="this.form.submit();">
                        <?php foreach($search_sorts as $key=>$sort) { ?>
                            <option value="<?=$key?>" <?php if($sort->selected) { ?>selected<?php } ?>><?=$sort->label?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="filters-toggle"><a href="javascript:undefined" onclick="$('.Search-Results-Filter-Container').toggleClass('flex-visible');$('.Search-Results-Listings-Container').toggle();">Filters</a></div>
            </div>
            </form>

		    <div class="Discover-Body">

                <?php if($total == 0) { ?>
                <div class="box">
                    <p style="font-size: 14px;">No listings match your search criteria</p>
                    <a href="/discover/results" style="text-decoration: none"><button class="user-btn button" style="float: none">Reset Search</button></a>
                </div>
                <?php } ?>

                <!-- Cryptocurrency type results have a different table style -->
                <?php if($total > 0 && isset($query_string['type']) && $query_string['type'] == "cryptocurrency") { ?>
                <div class="list-view-header" style="width:100%;">
                    <div class="header-row row" style="display: flex;width:100%;background: #f8f8f8">
                        <div class="column column-sm" style="width:72px;">TRADE</div>
                        <div class="column column-sm" style="width:52px;"></div>
                        <div class="column column-sm  column-for-header-mobile" style="width:134px;">FOR</div>
                        <div class="column column-sm" style="flex:1;">TRADER</div>
                        <div class="column column-sm" style="width:114px;text-align: right;">PRICE <span style="color:#777777;font-weight:normal;">(market price)</span></div>
                        <div class="column column-sm" style="width:114px;text-align: right;">INVENTORY</div>
                    </div>
                </div>
                <?php } ?>

                <input type="hidden" id="search_results_page" value="0"/>
                <input type="hidden" id="search_query" value="<?=$query_string?>"/>
                <div class="v2-listingContainer"></div>

		    </div>

            <div id="v2-loader"><img src="<?=base_url()?>/assets/img/spinner.gif"/></div>


        </div>



	</div>


</div>
		

		
	
