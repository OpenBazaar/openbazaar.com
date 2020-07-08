<div id="v2-bodyContainer-mobile">
    <input type="hidden" id="v2-page" value="home"/>
    <?php $this->load->view('home_filterheader_mobile'); ?>
    <div class="v2-listingContainer"></div>
    <div id="v2-loader"><img src="<?=base_url()?>/assets/img/spinner.gif"/></div>
    <div id="v2-slider-home" class="v2-slider" style="display: none">
        <div class="v2-slider-title">Filters</div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Ships to</div>
            <select name="v2-filter-option-mobile-shipsto">
                <option value="UNITED_STATES">United States</option>
            </select>
        </div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Accepts</div>
            <select name="v2-filter-option-mobile-accepts">
                <option value="UNITED_STATES">United States</option>
            </select>
        </div>
        <div class="v2-slider-filter-option">
            <div class="v2-slider-filter-option-label">Currency</div>
            <select name="v2-filter-option-mobile-currency">
                <option value="UNITED_STATES">United States</option>
            </select>
        </div>
    </div>
</div>