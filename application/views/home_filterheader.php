<div id="v2-filterHeader">
    <div id="v2-filterAccepts">Accepts
        <select id="v2-acceptedCurrency">
            <option value="ANY">Any</option>
            <option value="BTC" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "BTC") { echo 'selected="selected"'; } ?>>Bitcoin</option>
            <option value="BCH" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "BCH") { echo 'selected="selected"'; } ?>>Bitcoin Cash</option>
            <option value="LTC" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "LTC") { echo 'selected="selected"'; } ?>>Litecoin</option>
            <option value="ZEC" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "ZEC") { echo 'selected="selected"'; } ?>>Zcash</option>
            <option value="ETH" <?php if(isset($_SESSION['listing_currency']) && $_SESSION["listing_currency"] == "ETH") { echo 'selected="selected"'; } ?>>Ether</option>
        </select>
    </div>
    <div id="v2-filterShipsTo">Ships to
        <select id="v2-country">
            <?php foreach($countries as $country) { ?>
                <option value="<?=$country['dataName']?>" <?php if($country['dataName'] == $user_country) { echo 'selected="selected"'; } ?>><?=$country['name']?></option>
            <?php } ?>
        </select>
    </div>

    <?php if(isset($time_period)) { ?>
        <div id="v2-filterTimePeriod">Range
                <select id="v2-timePeriod">
                    <option value="past_week" <?php if($time_period == "past_week") { ?>selected="selected"<?php } ?>>Past week</option>
                    <option value="past_month" <?php if($time_period == "past_month") { ?>selected="selected"<?php } ?>>Past month</option>
            </select>
        </div>
    <?php } ?>



    <div id="v2-filterCurrency">Currency
        <select id="v2-currency">
            <option value="BTC" <?php if($user_currency == "BTC") { ?>selected="selected"<?php } ?>>Bitcoin</option>
            <?php foreach($currencies as $currency) { ?>
                <option value="<?=$currency['code']?>" <?php if($currency['code'] == $user_currency) { echo 'selected="selected"'; } ?>><?=$currency['name']?></option>
            <?php } ?>
        </select>
    </div>
</div>