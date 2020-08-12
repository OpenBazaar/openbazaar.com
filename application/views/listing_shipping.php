<?php if($profile->location != "") { ?>
    <div style="font-size:14px;">Ships from: <span style="font-weight:bolder;"><?=$profile->location?></span></div>
<?php }?>

<?php
if(isset($listing->shippingOptions)) {

foreach($listing->shippingOptions as $shipping_option) {
    if($shipping_option->type == "LOCAL_PICKUP") {

    } else {
        ?>
        <div style="margin:14px 0;height:1px;background-color:#d2d3d9"></div>

        <div class="shipping-header-row" style="border-bottom:1px solid #d2d3d9;display: table-row">
            <div style="display: table-cell;width:40%;"><?=$shipping_option->name?></div>
            <div style="display: table-cell;width:20%;">Delivery Time</div>
            <div style="display: table-cell;width:20%;">Price (first item)</div>
            <div style="display: table-cell;width:20%;" class="mobile-hidden">Price (additional item)</div>
        </div>

        <?php foreach($shipping_option->services as $service) { ?>
            <div class="shipping-body-row" style="border-bottom:1px solid #d2d3d9;display: table-row">
                <div style="display: table-cell;width:40%;"><?=$service->name?></div>
                <div style="display: table-cell;width:20%"><?=$service->estimatedDelivery?></div>
                <div style="display: table-cell;width:20%"><?=(isset($service->price))?pretty_price($service->price,$listing->metadata->pricingCurrency):"FREE"?></div>
                <div style="display: table-cell;width:20%" class="mobile-hidden"><?=(isset($service->additionalItemPrice))?pretty_price($service->additionalItemPrice,$listing->metadata->pricingCurrency):"FREE"?></div>
            </div>
        <?php  }?>

    <?php } } }?>