<div class="carousel">
<!--    <div class="carousel-thumb-bar"></div>-->
    <div class="carousel-thumbs">
        <?php foreach($listing->item->images as $image) {  ?>
            <div class="carousel-thumb" data-hash="<?=$image->large?>" style="background-image: url('https://gateway.ob1.io/ob/images/<?=$image->tiny?>?usecache=true');"></div>
        <?php } ?>
    </div>
    <div style="width:70px;display: flex;align-content: center;align-items: center;justify-content: center">
        <div class="carousel-back-btn">
            <img src="<?=base_url()?>/assets/img/thumb_back.png"/>
        </div>
    </div>
    <div class="carousel-photo-stage" style="background-image: url('https://gateway.ob1.io/ob/images/<?php echo (isset($listing->item->images)) ? $listing->item->images[0]->large . "?usecache=true" : ''; ?>');">
	</div>
    <div style="width:70px;display: flex;align-content: center;align-items: center;justify-content: center">
        <div class="carousel-next-btn">
            <img src="<?=base_url()?>/assets/img/thumb_next.png"/>
        </div>
    </div>


</div>

