<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@openbazaar" />
<meta name="twitter:title" content="OpenBazaar: <?=$listing->item->title?>" />
<?php if($description!="") { ?>
    <meta name="twitter:description" content="<?=$description?>" />
<?php } ?>
<meta name="twitter:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium. "?usecache=true" : ''; ?>" />

<meta property="og:title" content="OpenBazaar: <?=$listing->item->title?>">
<meta property="og:description" content="<?=$description?>">
<meta property="og:image" content="https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->medium . "?usecache=true": ''; ?>">
<meta property="og:url" content="https://openbazaar.com/<?=$profile->peerID?>/store/<?=$listing->slug?>">