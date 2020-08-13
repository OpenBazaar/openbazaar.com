<?php if(empty($reviews)) { ?>
    <div class="v2-noReviews">No reviews found</div>
<?php } ?>

<?php foreach($reviews as $review) { ?>
    <div class="review-row">
        <div class="review-col1">
            <?php $review_tstamp = DateTime::createFromFormat('Y-m-d\TH:i:s+', $review->ratingData->timestamp)?>
            <div style="font-weight: bolder;margin-bottom:10px;"><?=$review_tstamp->format('Y-m-d H:i:s');?> GMT by <?=(isset($review->ratingData->buyerName)) ? $review->ratingData->buyerName : "Anonymous"?></div>
            <?php if(isset($review->ratingData->review)) { ?><div class="review-text"><?=(trim($review->ratingData->review)!="")?$review->ratingData->review:"No review left."?></div><?php } ?>
        </div>
        <div class="full-rating-box" style="font-size:14px;">
            <div class="full-rating-box-cats">
                <div class="rating-category"><span style="font-weight:bold">Overall</span></div>
                <div class="rating-category">Quality</div>
                <div class="rating-category">Delivery Speed</div>
                <div class="rating-category">Matched Description</div>
                <div class="rating-category">Customer Support</div>
            </div>
            <div style="display: table-cell">
                <div class="overall-rating">
                    <?php for($i=1; $i<=5; $i++) {
                        if($i <= $review->ratingData->overall) {
                            echo "⭐";
                        } else {
                            echo "<span style=\"opacity:0.35\">⭐</span>";
                        }
                    } ?>
                </div>
                <div>
                    <?php for($i=1; $i<=5; $i++) {
                        if($i <= $review->ratingData->quality) {
                            echo "⭐";
                        } else {
                            echo "<span style=\"opacity:0.35\">⭐</span>";
                        }
                    } ?>
                </div>
                <div>
                    <?php for($i=1; $i<=5; $i++) {
                        if($i <= $review->ratingData->deliverySpeed) {
                            echo "⭐";
                        } else {
                            echo "<span style=\"opacity:0.35\">⭐</span>";
                        }
                    } ?>
                </div>
                <div>
                    <?php for($i=1; $i<=5; $i++) {
                        if($i <= $review->ratingData->description) {
                            echo "⭐";
                        } else {
                            echo "<span style=\"opacity:0.35\">⭐</span>";
                        }
                    } ?>
                </div>
                <div>
                    <?php for($i=1; $i<=5; $i++) {
                        if($i <= $review->ratingData->customerService) {
                            echo "⭐";
                        } else {
                            echo "<span style=\"opacity:0.35\">⭐</span>";
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
