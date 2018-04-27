<script type="text/javascript">
function process(frm) {
	var peerID = frm.peerID.value;
	var slug = frm.slug.value;
	
	var selected_reason = $(frm).find("input[name=reason]:checked").val();
	var reason = (selected_reason == "Other") ? frm.other.value : frm.reason.value;
	
    $.ajax({
	    type: "POST",
	    url: "https://search.ob1.io/reports",
	    data: JSON.stringify({
		    peerID: peerID,
		    reason: reason,
		    slug: slug
		}),
		contentType: "application/json; charset=utf-8",
		dataType: "json",
	    success: function() {
			$('#Config-Modal').hide();
	    }
	  });

    
    return false;
};
</script>

<div class=overlay>	
</div>

	<div class="modal-main">
		<div class="modal-close-button" onclick="$('.General-Modal, .overlay, .modal-main').toggle();"><img src="<?=asset_url()?>img/ios7-close-empty.png"/></div>
	</div>

<div class="General-Modal Purchasing-Modal" style="margin-top:0;">	
	
	<div class="Modal-Header">Report Listing</div>
	
	<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
	
	<form id="Config-Form" method="post" onsubmit="return process(this)">
		
		<input type=hidden name="peerID" value=""/>
		<input type=hidden name="slug" value=""/>
	
	<div class="report-inputs">
		<div><input type=radio name="reason" value="Offensive" checked="checked"/> Offensive Content</div>
		<div><input type=radio name="reason" value="Fraudulent"/> Fraudulent or Inaccurate</div>
		<div><input type=radio name="reason" value="Illegal"/> Illegal in my Area</div>
		<div><input type=radio name="reason" value="Other"/> Other <input type=text name="other" class="normal-text-input" size="60" value=""/></div>
	</div>
	
	<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
	
	<div style="margin-top:20px;text-align:right;width:100%">
	<button type="submit" class="download-button" style="width:auto;padding-right:20px; padding-left:20px;" >Submit</button>
	</div>
	
	</form>
</div>