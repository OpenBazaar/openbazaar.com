<div class="Profile-Card">
	<a href="/store/<?=(isset($profile->peerID))?$profile->peerID:""?>"><div class="Profile-Card-Hero" style="background-image: url('<?=(isset($profile->headerHashes))?"https://gateway.ob1.io/ob/images/".$profile->headerHashes->small."?usecache=true" : asset_url()."img/defaultHeader.png"?>');">
		<div class="Profile-Card-Avatar" style="background-image: url('<?=((isset($profile->avatarHashes)) && ($profile->avatarHashes->small!="")) ? "https://gateway.ob1.io/ob/images/".$profile->avatarHashes->small."?usecache=true" : asset_url()."img/defaultAvatar.png"?>');" title="<?=(isset($profile->name))?$profile->name:"Unknown"?>" onclick="location.href='/store/<?=(isset($profile->peerID))?$profile->peerID:"";?>'"></div>
	</div></a>
	<div class="Profile-Card-Caption">
		<div class="Profile-Card-Name"><a href="/store/<?=(isset($profile->peerID))?$profile->peerID:""?>"><?=(isset($profile->name))?$profile->name:"Unknown"?></a></div>
		<div class="Profile-Card-ShortDesc"><?=(isset($profile->shortDescription))?$profile->shortDescription:"No description"?></div>
		<div class="Profile-Card-MetaBar">
			<div class="Profile-Card-Location">📍 <?=(isset($profile->location) && $profile->location != '')?$profile->location:"<span class='inactive-text'>Unknown</span>";?> </div>
			<div class="Profile-Card-Rating">⭐ <?=isset($profile->stats)?number_format($profile->stats->averageRating, 1):"0.00"?> (<a href="#"><?=(isset($profile->stats))?$profile->stats->ratingCount:"0";?></a>)</div>
		</div>
	</div>
</div>