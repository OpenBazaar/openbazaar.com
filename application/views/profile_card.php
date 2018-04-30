<div class="Profile-Card">
	<a href="/store/<?=(isset($profile->peerID))?$profile->peerID:""?>"><div class="Profile-Card-Hero" style="background-image: url('<?=(isset($profile->headerHashes))?"https://gateway.ob1.io/ob/images/".$profile->headerHashes->small:$asset_url()."img/defaultHeader.png"?>');">
		<div class="Profile-Card-Avatar" style="background-image: url('<?=((isset($profile->avatarHashes)) && ($profile->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->small : asset_url()."img/defaultAvatar.png"?>');" title="<?=$profile->name?>" onclick="location.href='/store/<?=$profile->peerID?>'"></div>
	</div></a>
	<div class="Profile-Card-Caption">
		<div class="Profile-Card-Name"><a href="/store/<?=(isset($profile->peerID))?$profile->peerID:""?>"><?=(isset($profile->name))?$profile->name:"Unknown"?></a></div>
		<div class="Profile-Card-ShortDesc"><?=(isset($profile->shortDescription))?$profile->shortDescription:"No description"?></div>
		<div class="Profile-Card-MetaBar">
			<div class="Profile-Card-Location">📍 <?=$profile->location?> </div>
			<div class="Profile-Card-Rating">⭐ <?=number_format($profile->stats->averageRating, 1)?> (<a href="#"><?=$profile->stats->ratingCount?></a>)</div>
		</div>
	</div>
</div>