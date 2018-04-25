<script type="text/javascript">
function processConfig(frm) {
    var formData = $(frm).serializeArray();
    $.ajax({
	    type: "POST",
	    url: "/config/save_settings",
	    data: formData,
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
	
	<div class="Modal-Header">Settings</div>
	
	<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
	
	<form id="Config-Form" method="post" onsubmit="return processConfig(this)">
	
	<div class="Settings-Row">
		<div>Language</div>
		<div>
		<div class="Settings-Select">

		<select name="language">
			<?php foreach($languages as $language) { ?>
            <option value="<?=$language['code']?>" <?php if($language['code'] == $user_language) { echo 'selected="selected"'; } ?> ><?=$language['name']?></option>
            <?php } ?>
		</select>	</div>
		</div>
	</div>
	
	<div class="Settings-Row">
		<div>Country</div>
		<div>
		<div class="Settings-Select">
		<select id="settingsCountrySelect" name="country" class="clrSh2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
            
            <?php foreach($countries as $country) { ?>
            <option value="<?=$country['dataName']?>" <?php if($country['dataName'] == $user_country) { echo 'selected="selected"'; } ?>><?=$country['name']?></option>
            <?php } ?>
            
                        
          </select>
          	</div>
		</div>
	</div>
	
	
	<div class="Settings-Row">
		<div>Currency</div>
		<div>
		<div class="Settings-Select">
		<select name="currency">
			<option value="BTC" <?php if($user_currency == "BTC") { ?>selected="selected"<?php } ?>>Bitcoin</option>
							<?php foreach($currencies as $currency) { ?>
            <option value="<?=$currency['code']?>" <?php if($currency['code'] == $user_currency) { echo 'selected="selected"'; } ?>><?=$currency['name']?></option>
            <?php } ?>
		</select>
			</div>
		</div>
	</div>
	
	<div class="Settings-Row">
		<div>NSFW Content</div>
		<div>
			<input name="nsfw" type="radio" <?php if($user_nsfw == "on") { echo 'checked="checked"'; } ?>/> Visible <input name="nsfw" type="radio" <?php if($user_nsfw != "on") { echo 'checked="checked"'; } ?>/> Hidden 
		</div>
	</div>
	
	<div class="Settings-Row">
		<div>Gateway</div>
		<div>
			<input name="gateway" class="Settings-Text" type="text" style="width:300px;" placeholder="https://gateway.ob1.io" value="<?=$user_gateway?>"/>
		</div>
	</div>
	
	
	
	<div style="margin-top:20px;height:1px; background-color:#d2d3d9;"></div>
	
	<div style="margin-top:20px;text-align:right;width:100%">
	<button type="submit" class="download-button" style="width:auto;padding-right:20px; padding-left:20px;" >Save</button>
	</div>
	
	</form>
</div>