<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );?>

<div id="tilesgallery<?php echo $module->id; ?>" data-mode="carousel" data-start-now="true" class="live-tile" data-direction="<?php echo $params->get("carouselimagedirection") ?>" data-delay="<?php echo $params->get("carouselimagedelay") ?>">        
        <?php if ($params->get("carouselimage1")!="") : ?>
        	<div><a href="<?php echo $params->get("carouselimagelink1") ?>"><img class="full" src="<?php echo $params->get("carouselimage1") ?>" alt="1" /></a></div>
        <?php endif; ?>
		<?php if ($params->get("carouselimage2")!="") : ?>
			<div><a href="<?php echo $params->get("carouselimagelink2") ?>"><img class="full" src="<?php echo $params->get("carouselimage2") ?>" alt="1" /></a></div>
		<?php endif; ?>
		<?php if ($params->get("carouselimage3")!="") : ?>
			<div><a href="<?php echo $params->get("carouselimagelink3") ?>"><img class="full" src="<?php echo $params->get("carouselimage3") ?>" alt="1" /></a></div>
		<?php endif; ?>
		<?php if ($params->get("carouselimage4")!="") : ?>
			<div><a href="<?php echo $params->get("carouselimagelink4") ?>"><img class="full" src="<?php echo $params->get("carouselimage4") ?>" alt="1" /></a></div>
		<?php endif; ?>
    </div>
    <script type="text/javascript">
    jQuery("#tilesgallery<?php echo $module->id; ?>").liveTile({
        delay: <?php echo $params->get("carouselimagedelay") ?>,
        startNow: true,
        direction: '<?php echo $params->get("carouselimagedirection") ?>'    
    });    
    </script>