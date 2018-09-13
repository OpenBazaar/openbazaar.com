<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@openbazaar" />
<meta name="twitter:title" content="OpenBazaar - <?=$profile->name?>" />
<meta name="twitter:description" content="<?=htmlentities(addslashes($profile->shortDescription))?>" />
<meta name="twitter:image" content="<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>" />
<meta property="og:title" content="OpenBazaar - <?=$profile->name?>">
<meta property="og:description" content="<?=htmlentities(addslashes($profile->shortDescription))?>">
<meta property="og:image" content="<?php if($header_image) { ?>https://gateway.ob1.io/ob/images/<?php echo (isset($profile->headerHashes)) ? $profile->headerHashes->large : ''; ?><?php } else { ?><?=asset_url()?>img/defaultHeader.png<?php } ?>">
<meta property="og:url" content="https://openbazaar.com/store/<?=$profile->peerID?>">