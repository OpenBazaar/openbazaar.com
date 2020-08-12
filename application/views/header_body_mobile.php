<div id="v2-header">
    <div id="v2-downloadBar-mobile">
        <span>Get the mobile app</span> <input type="button" value="Download" onclick="window.location.href='https://gethaven.app';">
    </div>
    <div id="v2-headerBar-mobile">
        <div class="logo-title">
            <div class="Icon-Frame clickable"><img src="<?=asset_url()?>img/base-rounded.png" srcset="<?=asset_url()?>img/base-rounded@2x.png 2x, <?=asset_url()?>img/base-rounded@3x.png 3x" class="Base-Rounded" onclick="location.href='/';"></div>
        </div>

        <div class="v2-headerSearch-mobile">
            <div class="v2-searchcontainer">
                <div style="background-image: url('<?=asset_url()?>img/magnifying.png'); height: 14px; width: 14px;background-size: contain; position: absolute;margin-top: 0px;margin-left: 12px;"></div>
                <div>
                    <form action="/discover/results" method="get">
                        <input id="frm-search-input" name="q" type="text" class="Search-OB1" placeholder="Search" value="<?=(isset($q))? $q :"";?>" />
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>