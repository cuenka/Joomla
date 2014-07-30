<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php $IsFirst=1;$GALoad ="";$GAClick=""; ?>

<?php foreach ($banners as $banner) : ?>

<?php
if ((int) $params->get('gaevent', 0)){
$GALoad = "onload=\"ga('send','event', 'Banner','Impression', '".$banner->name."',{'nonInteraction': 1});\"";
$GAClick = "onclick=\"ga('send','event', 'Banner','Click', '".$banner->name."',{'nonInteraction': 1});\"";
}
$category = (int) $params->get('gaevent', 0);
?>

<div class="fadeBanner" <?php if (!$IsFirst) echo 'style="display:none;"'; ?>>
	<a href="<?php echo $banner->clickurl; ?>" target="_blank"
	<?php echo $GAClick; ?>
	>
	<img src="<?php echo $banner->imgpath; ?>" alt="<?php echo $banner->description; ?>" 
	width="<?php echo $banner->clickurl; ?>" height="<?php echo $banner->clickurl; ?>"
	<?php echo $GALoad; ?>
	/>
	</a>
</div>
<?php $IsFirst=0; ?>
<?php endforeach; ?>


<script type="text/javascript">
  jQuery.noConflict();
  jQuery( document ).ready(function( $ ) {
	var delay = <?php echo (int) $params->get('delay', 0); ?>000, fade = <?php echo (int) $params->get('transition', 0); ?>; 
    var banners = $('.fadeBanner');
    var len = banners.length;
    var i = 0;

    setTimeout(cycle, delay); 

    function cycle() {
        $(banners[i%len]).fadeOut(fade, function() {
            $(banners[++i%len]).fadeIn(fade, function() { 
                setTimeout(cycle, delay);
            });
        });
    }

});
</script>