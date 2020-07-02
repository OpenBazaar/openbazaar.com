<div class="Rectangle-10 clearfix">
	
	<br clear="both"/>
	
	
	<div class="modal-main">
		<div class="modal-close-button" onclick="window.history.back();"><img src="<?=asset_url()?>img/ios7-close-empty.png"/></div>
	</div>
	
	<div class="Purchasing-Modal">
		
		<div class="" style="text-align: center">
			<span class="Modal-Header">Messaging isn't supported on the web yet</span>
		</div>

        <div style="text-align: center;">

        <p>Download OpenBazaar for Desktop</p>

        <div style="margin-bottom: 5px">
            <a href="https://github.com/OpenBazaar/openbazaar-desktop/releases/download/v2.4.5/OpenBazaar2-2.4.5-Setup-64.exe">Windows</a> | <a href="https://github.com/OpenBazaar/openbazaar-desktop/releases/download/v2.4.5/OpenBazaar2-2.4.5.dmg">MacOS</a> | <a href="https://github.com/OpenBazaar/openbazaar-desktop/releases/download/v2.4.5/openbazaar2_2.4.5_amd64.deb">Linux</a> | <a href="https://openbazaar.org/download">Other</a>
        </div>

        <p>Or you can download Haven on iOS and Android for your mobile device.</p>

        <p>Download Haven</p>

        <div style="margin-bottom: 5px">
            <a href="https://itunes.apple.com/us/app/haven-private-shopping/id1318395690">iOS</a> | <a href="https://play.google.com/store/apps/details?id=io.ob1.nativeandroid&hl=en_US">Google Play</a>
        </div>

        </div>

		<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
			
		<div style="margin-top:30px">
			<div style="font-size:14px;margin-bottom:13px">Already have OpenBazaar installed?</div>
			<div style="display: table-row; vertical-align: middle;">
				<div class="modal-button button" onclick="location.href='ob://<?=$peerID?>/store';">Message this user in OpenBazaar</div>
				<span class="" style="font-size:13px;display: table-cell;vertical-align: middle;padding-left: 10px;color:#797979">Message this user in OpenBazaar</span>
			</div>
			<div style="margin-top:12px;">
			<div style="display: table-row; vertical-align: middle;">
				<div class="modal-button button copy-btn" data-type="attribute" data-attr-name="data-clipboard-text" data-model="obLink" style="width:62px;height:38px;">Copy URL</div>
				<div class="" style="font-size:13px;max-width:50%;display: table-cell;overflow: hidden; text-overflow: ellipsis;vertical-align: middle;padding-left: 10px;color:#797979">Profile URL: <a id="obLink" style="text-decoration: none;" href="ob://<?=$peerID?>/store">ob://<?=$peerID?>/store</a></div>
			</div>
			</div>
			
			
			
		</div>
			

					
			
	</div>
	
</div>