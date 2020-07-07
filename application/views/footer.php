<?php if(!$_COOKIE['survey']) { ?>
<div id="surveywidget-container">
    <div id="surveywidget-rectangle">
        <div style="float:right;margin-top:20px;margin-right:20px;cursor:pointer;" onclick="hideSurvey();">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M1 1L13 13" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div id="widget-header">
            How would you improve OpenBazaar?
        </div>
        <form id="surveywidget-form" method="post" onsubmit="submitSurvey(this);return false;">
            <div class="surveywidget-form-container">
                <div class="surveywidget-formfield">
                    <label for = "accept_credit">
                        <input type="checkbox"
                               id="accept_credit"
                               name = "openbazaarImprovements[]"
                               value = "accept_credit"
                        /> Accept credit cards for payment</label>
                </div>
                <div class="surveywidget-formfield">
                    <label for = "more_currencies">
                        <input type="checkbox"
                               name = "openbazaarImprovements[]"
                               id="more_currencies"
                               value = "more_currencies"
                        /> Accept more digital currencies</label>
                </div>
                <div class="surveywidget-formfield">
                    <label for = "web_purchase">
                        <input type="checkbox"
                               name = "openbazaarImprovements[]"
                               id="web_purchase"
                               value = "web_purchase"
                        /> Purchase from the web</label>
                </div>
                <div class="surveywidget-formfield">
                    <label for = "better_discounts">
                        <input type="checkbox"
                               name = "openbazaarImprovements[]"
                               id="better_discounts"
                               value = "better_discounts"
                        /> Offer discounts on products</label>
                </div>
                <div class="surveywidget-formfield">
                    <label for = "more_items_to_purchase">
                        <input type="checkbox"
                               name = "openbazaarImprovements[]"
                               id="more_items_to_purchase"
                               value = "more_items_to_purchase"
                        /> Offer more items to purchase</label>
                </div>
                <div class="surveywidget-formfield">
                    <label for="sizeSmall">
                        <input type="text" name="otherImprovements" placeholder="Other" style="width:250px;"/></label>
                </div>
                <div><input type="submit" value="Submit"/> </div>

            </div>
        </form>
    </div>
</div>
<?php } ?>

<div class="footer" style="z-index: 1;">

    <div class="footer-linkbar-container">
        <div class="footer-icon">
            <div class="Icon-Frame clickable"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div> <div class="OpenBazaar" style="float:left"><a href="/" title="OpenBazaar"><img src="<?=asset_url()?>img/icon-openbazaar-text.png" style="margin-top:22px; width: 100px;" /></a></div>
        </div>

        <div class="footer-linkbar">
            <a href="https://openbazaar.org/about">About</a>
            <a href="https://openbazaar.org/blog">Blog</a>
            <a href="https://openbazaar.org/developers">Developers</a>
            <a href="https://openbazaar.org/download">Download</a>
            <a href="https://openbazaar.org/">Privacy</a>
        </div>
    </div>

    <div class="footer-ticker">
<!--        --><?php //if(isset($_COOKIE['currency']) && $_COOKIE['currency'] != "BTC") { ?>
            <div class="btc-price ticker-text" style="box-sizing: border-box;padding:8px;padding-left:17px;margin-right:2px;font-size:13px;">
                <div style="margin-right:10px;font-weight: bold;color: #7A7A7A;">Ticker</div>
                <img src="<?=asset_url()?>img/btcIcon128.png" /> <?=pretty_price(100000000, "BTC")?>
                <img src="<?=asset_url()?>img/bchIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "BCH")?>
                <img src="<?=asset_url()?>img/ltcIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "LTC")?>
                <img src="<?=asset_url()?>img/zecIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "ZEC")?>
                <img src="<?=asset_url()?>img/ethIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "ETH")?>
            </div>
<!--        --><?php //} ?>

    </div>

</div>


<div id="Config-Modal" style="display: none;"></div>
<div id="Messaging-Modal" style="display: none;"></div>
<div id="Following-Modal" style="display: none;"></div>

</body>
	
</html>