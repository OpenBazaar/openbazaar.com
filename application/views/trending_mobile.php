<div id="v2-bodyContainer-mobile">
    <input type="hidden" id="v2-page" value="home"/>
    <?php $this->load->view('home_filterheader_mobile'); ?>
    <div class="v2-listingContainer"></div>
    <div id="v2-loader"><img src="<?=base_url()?>/assets/img/spinner.gif"/></div>
    <div id="v2-slider-home">
        <div class="v2-slider-title">Filters</div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Ships to</div>
            <select name="v2-filter-option-mobile-shipsto" id="v2-filter-option-mobile-shipsto">
                <?php foreach($countries as $country) { ?>
                    <option value="<?=$country['dataName']?>" <?php if($country['dataName'] == $user_country) { echo 'selected="selected"'; } ?>><?=$country['name']?></option>
                <?php } ?>
            </select>

        </div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Accepts</div>
            <select id="v2-filter-option-mobile-accepts" name="v2-filter-option-mobile-accepts" class="v2-chosenSelect">
                <option value="ANY">Any</option>
                <option value="BTC" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "BTC") { echo 'selected="selected"'; } ?>>Bitcoin</option>
                <option value="BCH" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "BCH") { echo 'selected="selected"'; } ?>>Bitcoin Cash</option>
                <option value="LTC" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "LTC") { echo 'selected="selected"'; } ?>>Litecoin</option>
                <option value="ZEC" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "ZEC") { echo 'selected="selected"'; } ?>>Zcash</option>
                <option value="ETH" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "ETH") { echo 'selected="selected"'; } ?>>Ether</option>
            </select>
        </div>

        <?php if(isset($time_period)) { ?>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Range</div>
            <select id="v2-filter-option-mobile-timePeriod" class="v2-chosenSelect">
                <option value="past_day" <?php if($time_period == "past_day") { ?>selected="selected"<?php } ?>>Past day</option>
                <option value="past_week" <?php if($time_period == "past_week") { ?>selected="selected"<?php } ?>>Past week</option>
                <option value="past_month" <?php if($time_period == "past_month") { ?>selected="selected"<?php } ?>>Past month</option>
            </select>
        </div>
        <?php } ?>

        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Currency</div>
            <select id="v2-filter-option-mobile-currency" name="v2-filter-option-mobile-currency" class="v2-chosenSelect">
                <option value="BTC" <?php if($user_currency == "BTC") { ?>selected="selected"<?php } ?>>Bitcoin</option>
                <?php foreach($currencies as $currency) { ?>
                    <option value="<?=$currency['code']?>" <?php if($currency['code'] == $user_currency) { echo 'selected="selected"'; } ?>><?=$currency['name']?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>