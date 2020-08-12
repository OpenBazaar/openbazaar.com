<?php
if(!isset($tab)) { $tab = ""; }

if(!$this->agent->is_mobile()) {
    $this->load->view('footer_body');
} else {
    if($tab != "") {
        $this->load->view('footer_body_mobile', array('tab'=>$tab));
    }

}
?>

<div id="v2-buynowModal" class="mobile-hidden">
    <div class="v2-modal-header-text">Download Haven to complete your purchase.</div>
    <div class="v2-modal-description">Purchasing is not yet supported on the web. Download Haven.</div>
    <div class="v2-modal-icon"><img src="<?=asset_url()?>/img/haven-modal-icon.png"/></div>
    <div class="v2-download"><a href="https://gethaven.app"><div class="v2-messageButton v2-downloadButton">Download Haven</div></a></div>
    <div class="v2-downloadOS">Android, iOS</div>
</div>
<div id="v2-messageMeModal" class="mobile-hidden">
    <div class="v2-modal-header-text">Download Haven to send a message.</div>
    <div class="v2-modal-description">Messaging is not yet supported on the web. Download Haven.</div>
    <div class="v2-modal-icon"><img src="<?=asset_url()?>/img/haven-modal-icon.png"/></div>
    <div class="v2-download"><a href="https://gethaven.app"><div class="v2-messageButton v2-downloadButton">Download Haven</div></a></div>
    <div class="v2-downloadOS">Android, iOS</div>
</div>

<div id="v2-messageMeDesktopModal" class="mobile-hidden">
    <div class="v2-modal-header-text-desktop">Download OpenBazaar or Haven to send a message.</div>
    <div class="v2-modal-description-desktop">Messaging is not yet supported on the web. Please download one of the apps below to complete your purchase.</div>
    <div class="v2-modal-software-options">
        <div>
            <div class="v2-modal-icon"><img src="<?=asset_url()?>/img/openbazaar-modal-icon.png" width="91" height="91"/></div>
            <div class="v2-download"><a href="https://openbazaar.org/download"><div class="v2-messageButton v2-downloadButton">Download OpenBazaar</div></a></div>
            <div class="v2-downloadOS">Windows, Mac, and Linux</div>
        </div>
        <div class="v2-modal-splitter"></div>
        <div>
            <div class="v2-modal-icon"><img src="<?=asset_url()?>/img/haven-modal-icon.png" width="91" height="91"/></div>
            <div class="v2-download"><a href="https://gethaven.app"><div class="v2-messageButton v2-downloadButton">Download Haven</div></a></div>
            <div class="v2-downloadOS">Android, iOS</div>
        </div>
    </div>
</div>
<div id="v2-buynowDesktopModal" class="mobile-hidden">
    <div class="v2-modal-header-text-desktop">Download OpenBazaar or Haven to complete your purchase.</div>
    <div class="v2-modal-description-desktop">Purchasing is not yet supported on the web. Please download one of the apps below to complete your purchase.</div>
    <div class="v2-modal-software-options">
        <div>
            <div class="v2-modal-icon"><img src="<?=asset_url()?>/img/openbazaar-modal-icon.png" width="91" height="91"/></div>
            <div class="v2-download"><a href="https://openbazaar.org/download"><div class="v2-messageButton v2-downloadButton">Download OpenBazaar</div></a></div>
            <div class="v2-downloadOS">Windows, Mac, and Linux</div>
        </div>
        <div class="v2-modal-splitter"></div>
        <div>
            <div class="v2-modal-icon"><img src="<?=asset_url()?>/img/haven-modal-icon.png" width="91" height="91"/></div>
            <div class="v2-download"><a href="https://gethaven.app"><div class="v2-messageButton v2-downloadButton">Download Haven</div></a></div>
            <div class="v2-downloadOS">Android, iOS</div>
        </div>
    </div>
</div>


<div id="v2-cover-mobile"></div>
<div id="Config-Modal" style="display: none;"></div>
<div id="Messaging-Modal" style="display: none;"></div>
<div id="Following-Modal" style="display: none;"></div>

</body>
	
</html>