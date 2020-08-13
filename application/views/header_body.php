<div id="v2-header">
    <div id="v2-downloadBar">
        <span>Download OpenBazaar (Haven) on Android or iOS</span> <input type="button" value="Download" onclick="window.location.href='https://gethaven.app';">
    </div>
    <div id="v2-headerBar">
        <div class="logo-title" style="width: 220px;">
            <div class="Icon-Frame clickable"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div>
            <div class="OpenBazaar" style="float:left;margin-left: -20px;"><a href="/" title="OpenBazaar"><img src="<?=asset_url()?>img/icon-openbazaar-text.png" style="margin-top:22px; width: 100px;" /></a></div>
        </div>
        <div class="v2-navigationButton <?php if($tab == "home") { ?>v2-active<?php } ?>" onclick="clickTab('');">Home</div>
        <div class="v2-navigationButton <?php if($tab == "trending") { ?>v2-active<?php } ?>" onclick="clickTab('trending');">Trending</div>
        <div class="v2-navigationButton <?php if($tab == "new") { ?>v2-active<?php } ?>" onclick="clickTab('new');">New</div>

        <div class="v2-headerSearch">
            <div style="background-image: url('<?=asset_url()?>img/magnifying.png'); height: 14px; width: 14px;background-size: contain; position: absolute;margin-top: 12px;margin-left: 12px;"></div>
            <div style="width:100%">
                <form action="/discover/results" method="get" style="display: flex">
                    <input id="frm-search-input" name="q" type="text" class="Search-OB1" placeholder="Search" value="<?=(isset($q))? $q :"";?>" />
                </form>
            </div>
        </div>
        <a href="https://openbazaar.org">Become a seller</a>
    </div>

</div>