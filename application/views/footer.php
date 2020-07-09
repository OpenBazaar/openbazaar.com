<?php if(!isset($_COOKIE['survey']) || !$_COOKIE['survey']) { ?>
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

<?php
if(!$this->agent->is_mobile()) {
    $this->load->view('footer_body');
} else {
    $this->load->view('footer_body_mobile', array('tab'=>$tab));
}
?>

<div id="v2-cover-mobile"></div>
<div id="Config-Modal" style="display: none;"></div>
<div id="Messaging-Modal" style="display: none;"></div>
<div id="Following-Modal" style="display: none;"></div>

</body>
	
</html>