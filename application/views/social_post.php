<div style="width:947px;    
	margin: 0 auto;    
    display: flex;
    flex-wrap: wrap;
    position: relative;padding:10px;border:1px solid black;margin-top:10px;">

<?php print_r($data)?>


<div style="font-weight:bold;">
	<?=$data->vendorID->handle != "" ? $data->vendorID->handle :"Anonymous"?>
	</div>
<div style="margin:5px 0;"><?=$data->status?></div>
<div><?=date( "m/d/Y", strtotime($data->timestamp))?> <?=$data->timestamp?></div>

<?php if(count($data->images) > 0) { ?>

<div style="clear:both">
<?php
	foreach($data->images as $image) { 
?>

<div style="float:left;padding:5px;">	
	<img src="https://gateway.ob1.io/ob/images/<?=$image->small."?usecache=true";?>"/>
</div>


<?php } ?>
<br clear="both"/>
</div>
<?php } ?>
</div>