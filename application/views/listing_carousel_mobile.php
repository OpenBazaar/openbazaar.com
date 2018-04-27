<div class="mobile-carousel" data-flickity='{ "cellAlign": "left", "contain": "true", "wrapAround": "true", "prevNextButtons": "false"}'>
	<?php foreach($listing->item->images as $image) { ?>
	<div class="carousel-cell carousel-cell-mobile">
		<img src="https://gateway.ob1.io/ob/images/<?php echo $image->medium ?>"/>
	</div>
	<?php } ?>
</div>

