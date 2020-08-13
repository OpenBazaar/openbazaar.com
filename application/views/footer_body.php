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
        <?php if(isset($_COOKIE['currency']) && $_COOKIE['currency'] != "BTC") { ?>
        <div class="btc-price ticker-text" style="box-sizing: border-box;padding:8px;padding-left:17px;margin-right:2px;font-size:13px;">
            <div style="margin-right:10px;font-weight: bold;color: #7A7A7A;">Ticker</div>
            <img src="<?=asset_url()?>img/btcIcon128.png" /> <?=pretty_price(100000000, "BTC")?>
            <img src="<?=asset_url()?>img/bchIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "BCH")?>
            <img src="<?=asset_url()?>img/ltcIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "LTC")?>
            <img src="<?=asset_url()?>img/zecIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(100000000, "ZEC")?>
            <img src="<?=asset_url()?>img/ethIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "ETH")?>
        </div>
        <?php } else { ?>
        <div class="btc-price ticker-text" style="box-sizing: border-box;padding:8px;padding-left:17px;margin-right:2px;font-size:13px;">
            <div style="margin-right:10px;font-weight: bold;color: #7A7A7A;">Ticker</div>
            <img src="<?=asset_url()?>img/btcIcon128.png" /> <?=pretty_price(1, "BTC")?>
            <img src="<?=asset_url()?>img/bchIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "BCH")?>
            <img src="<?=asset_url()?>img/ltcIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "LTC")?>
            <img src="<?=asset_url()?>img/zecIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "ZEC")?>
            <img src="<?=asset_url()?>img/ethIcon128.png" style="margin-left: 15px;" /> <?=pretty_price(1, "ETH")?>
        </div>
        <?php } ?>

    </div>

</div>