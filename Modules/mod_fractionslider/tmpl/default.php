<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php ?>

<div class="slider"><!-- your slider container -->
<?php foreach ($list as $key => $value) : ?>

<div class="slide">
	<img src="<?php echo $value->image;?>">
	<h2 class="fs_obj" data-position="100,200" data-step="1" data-in="top"  data-out="top"><a href="<?php echo $value->link;?>" class="Title"><?php echo $value->title;?></a></h2>	
	
	<p class="fs_obj" data-position="200,200" data-in="right" data-step="2" data-out="left"><a href="<?php echo $value->link;?>" style="background-color: <?php echo $value->bgfl;?>;color:<?php echo $value->fontfl;?>;" class="Lines"><?php echo $value->line1;?></a></p>
	
	<p class="fs_obj" data-position="230,240" data-in="left" data-out="right" data-step="3" data-delay="100"><a href="<?php echo $value->link;?>" style="background-color: <?php echo $value->bgsl;?>;color:<?php echo $value->fontsl;?>;" class="Lines"><?php echo $value->line2;?></a></p>
</div>
<?php endforeach; ?> 
 <div class="fs_loader"><!-- shows a loading .gif while the slider is getting ready --></div>
</div>
<script type="text/javascript">
jQuery(window).load(function(){
	jQuery('.slider').fractionSlider({
		'fullWidth': 			false,
		'controls': 			true, 
		'pager': 				true,
		'responsive': 			true,
		'dimensions': 			"1170,400",
	    'increase': 			false,
		'pauseOnHover': 		false,
		'slideEndAnimation': 	true
	});

});
</script>