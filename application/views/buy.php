<div class="Rectangle-10 clearfix">
	
	<br clear="both"/>
	
	
	<div class="Purchasing-Modal-Mobile">
	<div class="Purchasing-Modal">
		
		<div class="Purchasing-Modal-Desc" style="text-align: center">
			<span class="Modal-Header">Purchasing isn't supported on the web yet</span>
			<p>Purchase this listing from within the OpenBazaar app. It's available for: Windows, Mac and Linux. Mobile coming soon.</p>
			
			<button class="download-button" onclick="window.open('https://openbazaar.org/download')">Download OpenBazaar</button>
			<div class="listing-back" style="margin: 12px; font-size: 13px; cursor: pointer;">
				<a onclick="window.history.back();">< Back to listing</a>
			</div>
		</div>
		
		<div class="Download-OpenBazaar-Mobile">
		
			<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
				
			<div style="margin-top:30px">
				<div style="font-size:14px;margin-bottom:13px">Already have OpenBazaar installed?</div>
				<div style="display: table-row; vertical-align: middle;">
					<div class="modal-button button" onclick="location.href='ob://<?=$peerID?>/store/<?=$slug?>';">Open Listing in OpenBazaar</div>
					<span class="" style="font-size:13px;display: table-cell;vertical-align: middle;padding-left: 10px;color:#797979">View this listing in OpenBazaar</span>
				</div>
				<div style="margin-top:12px;">
				<div style="display: table-row; vertical-align: middle;">
					<div class="modal-button button copy-btn" data-type="attribute" data-attr-name="data-clipboard-text" data-model="obLink" style="width:60px;height:38px;">Copy URL</div>
					<div class="" style="font-size:13px;max-width:50%;display: table-cell;overflow: hidden; text-overflow: ellipsis;vertical-align: middle;padding-left: 10px;color:#797979">Listing URL: <a id="obLink" href="ob://<?=$peerID?>/store/<?=$slug?>">ob://<?=$peerID?>/store/<?=$slug?></a></div>
				</div>
				</div>
				
				
				
			</div>
		
		</div>
		
	</div>
	</div>
	
</div>