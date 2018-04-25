<div class="mobile-carousel" data-flickity='{ "cellAlign": "left", "contain": "true", "wrapAround": "true", "prevNextButtons": "false"}'>
	
	<?php foreach($listing->item->images as $image) { ?>
	<div class="carousel-cell" style="min-width:100%;display: flex; justify-content: center; align-items: center; overflow: hidden">
		<img style="object-fit: cover; min-width: 100%; max-height:376px" src="https://gateway.ob1.io/ob/images/<?php echo $image->medium ?>"/>
	</div>
	<?php } ?>
	
</div>

